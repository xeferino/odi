<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;
use App\Brand;
use App\ProductImage;
use Illuminate\Http\Request;

use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\File;
use Validator;
use \Spatie\Tags\Tag;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    private $attributes = [
        'sku', 'model', 'description', 'size', 'quantity', 'unit_price', 'gender'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('quantity', '>', 0)->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $tags = Tag::all();
        return view('admin.products.create',compact('brands', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($this->attributes as $attribute) {
            $data[$attribute] = $request[$attribute];
        }
        $brand = Brand::find($request['brand_id']);
        $product = new Product($data);
        $product->brand()->associate($brand);
        $product->save();
        if(is_array($request->tags))
            foreach($request->tags as $tag) {
                $product->attachTag(Tag::find($tag));
            }
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $tags = Tag::all();
        return view('admin.products.edit',compact('product', 'brands', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        unset($this->attributes['quantity']);
        foreach($this->attributes as $attribute) {
            $data[$attribute] = $request[$attribute];
        }
        $brand = Brand::find($request['brand_id']);
        $product->fill($data);
        $product->brand()->associate($brand);
        $product->tags()->detach();
        $product->save();
        if(is_array($request->tags))
            foreach($request->tags as $tag) {
                $product->attachTag(Tag::find($tag));
            }
        return redirect()->route('admin.products.index');
    }

    /**
     * Soft delete and hard delete
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function stock(Request $request){
        $actuales = Excel::toArray(new ProductsImport, request()->file('xls'));
        $actuales = $actuales[0];
        array_shift($actuales);
        $faltantes = [];
        DB::beginTransaction();
        try {
            foreach ($actuales as $actual) {
                $format = str_replace("/", "-", $actual[4]);
                $fechaExcel = Carbon::parse($format);
                $now = Carbon::now();
                $diff = $fechaExcel->diffInDays($now);
                if($diff<=7000){
                    $resp = Product::where('sku', $actual[0])->first();
                    if($resp){
                        if($request->tipo=='interno'){
                            $resp->quantity = $resp->cantidad_fiscal+$actual[2];
                            $resp->cantidad_interno = $actual[2];
                            $resp->unit_price = ($resp->precio_fiscal<$actual[3])?$actual[3]:$resp->precio_fiscal;
                            $resp->precio_interno = $actual[3];
                            $resp->save();
                        }
                        else if($request->tipo=='fiscal'){
                            $resp->quantity = $resp->cantidad_interno+$actual[2];
                            $resp->cantidad_fiscal = $actual[2];
                            $resp->unit_price = ($resp->precio_interno<$actual[3])?$actual[3]:$resp->precio_interno;
                            $resp->precio_fiscal = $actual[3];
                            $resp->save();
                        }
                    }
                    else{
                        array_push($faltantes, $actual);
                    }
                }
            }
            DB::commit();
            return view('admin.products.stock', ['products' => $faltantes]);
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function upload(Request $request) {
        $path = $request->csv->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $results = $csv->getRecords();
        $products = [];
        $products_with_errors = [];
        $count = 0;
        $count_with_errors = 0;
        foreach($csv->getRecords() as $record) {
            $details_str = $record[2];
            $details = [];
            preg_match('/([\w\d\-\_\s]+)\s([\d]+)\s(.*)\s([\d]+\/[\d]+)-?[\s]*$/i', $details_str, $details);
            if(count($details) <= 0) {
                $products_with_errors[$count_with_errors]['sku'] = substr($record[1], 2);
                $products_with_errors[$count_with_errors]['details'] = $details_str;
                $count_with_errors++;
                continue;
            }
            $products[$count]['count'] = $count;
            $products[$count]['brand'] = $details[1];
            $products[$count]['model'] = $details[2];
            $products[$count]['description'] = $details[3];
            $products[$count]['size'] = $details[4];
            $products[$count]['quantity'] = $record[3];
            $products[$count]['unit_price'] = $record[4];
            $products[$count]['total'] = $record[5];
            $products[$count]['sku'] = substr($record[1], 2);
            $products[$count]['gender'] = 'UNISEX';
            $count++;
        }
        foreach($products as $product_data) {
            $brand = Brand::where('name', $product_data['brand'])->first();
            if(!$brand) {
                $brand = new Brand;
                $brand->name = $product_data['brand'];
                $brand->save();
            }
            $product = Product::where('sku', $product_data['sku'])->first();
            if($product) {
                //$product->quantity = $product_data['quantity'];
                //$product->model = $product_data['model'];
                //$product->description = $product_data['description'];
                //$product->size = $product_data['size'];
                $product->quantity = $product_data['quantity'];
                $product->unit_price = $product_data['unit_price'];                 
                //$product->brand()->associate($brand);               
                //$product->gender = $product_data['gender'];
            } else {
                $product = new Product;
                $product->sku = $product_data['sku'];
                $product->model = $product_data['model'];
                $product->description = $product_data['description'];
                $product->size = $product_data['size'];
                $product->quantity = $product_data['quantity'];
                $product->unit_price = $product_data['unit_price'];
                $product->brand()->associate($brand);
                $product->gender = $product_data['gender'];
            }
            $product->save();
        }
        return view('admin.products.upload', ['products' => $products, 'products_with_errors' => $products_with_errors]);
    }

    public function data(Request $request) {
        $columns = ['id', 'sku', 'brand_id', 'model', 'description', 'size', 'quantity', 'unit_price'];
        $recordsTotal = Product::count();
        $product_query = Product::query();
        switch($request['image_filter']) {
            case 'no-filter':
            break;
            case 'with-images':
                $product_query->has('images');
            break;
            case 'without-images':
                $product_query->doesnthave('images');
            break;
        }
        if($request['search']['value'] != "") {
            $search = '%' . $request['search']['value'] . '%';
            $brands = Brand::where('name', 'LIKE', $search)->get();
            $product_query->whereIn('brand_id', $brands->pluck('id'))
                ->orWhere('sku', 'LIKE', $search)
                ->orWhere('model', 'LIKE', $search)
                ->orWhere('description', 'LIKE', $search)
                ->where('quantity', '>', 0);
            $recordsFiltered = $product_query->count();
            $products = $product_query->orderBy($columns[$request['order'][0]['column']], $request['order'][0]['dir'])->skip($request['start'])->take($request['length'])->get();
        } else {
            $products = $product_query->where('quantity', '>', 0)->orderBy($columns[$request['order'][0]['column']], $request['order'][0]['dir'])->skip($request['start'])->take($request['length'])->get();
            $recordsFiltered = $recordsTotal;
        }
        $draw = $request['draw'];
        $dataTable = [
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => []
        ];
        foreach($products as $product) {
            $product_data = [];
            $product_data[] = $product->id;            
            $product_data[] = $product->sku;
            $product_data[] = $product->brand->name;
            $product_data[] = $product->model;
            $product_data[] = $product->description;
            $product_data[] = $product->size;
            $product_data[] = $product->quantity;
            $product_data[] = $product->unit_price;
            $product_data[] = $product->show_in_catalogue;
            $dataTable['data'][] = $product_data;
        }
        echo json_encode($dataTable);
    }

    public function addImage(Request $request, Product $product) {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()) {
            return response($validator->errors()->first(), 400);
        }
        $fileName = uniqid() . '.' . $request->file->getClientOriginalExtension();        
        $request->file->move(public_path('images/product'), $fileName);
        $productImage = new ProductImage(['file_name' => $fileName]);
        $productImage->product()->associate($product);
        $productImage->save();
        return response('', 200);
    }

    public function getImages(Product $product) {
        $images = [];
        foreach($product->images as $image) {
            $image_data = [];
            $image_data['id'] = $image->id;
            $image_data['url'] = $image->url;
            $image_data['created_at'] = $image->created_at->toDateTimeString();
            $images[] = $image_data;
        }
        return response(json_encode($images), 200);
    }

    public function removeImage(Request $request, ProductImage $productImage) {
        File::delete(public_path('images/product/') . $productImage->file_name);
        $productImage->delete();
        return response('', 200);
    }

    public function showInCatalogueProduct(Product $product) {
        if($product->show_in_catalogue)
            $product->show_in_catalogue = false;
        else
            $product->show_in_catalogue = true;
        $product->save();
        return response()->json('success');
    }
}
