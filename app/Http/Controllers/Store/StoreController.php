<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderProduct;
use App\Brand;
use App\Seller;
use App\SelfAdministered;
use \Spatie\Tags\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\Contacted;
use App\Mail\OrderReceived;
use Mail;
use App\NewsletterSubscriber;

class StoreController extends Controller
{
    public function home() {
        $sliderImages = SelfAdministered::where('type', 'slider-image')->get();
        $partners = SelfAdministered::where('type', 'partners')->get();
        $salesPhrase = SelfAdministered::where('type', 'sales-phrase')->first();
        $salesPhraseImage = SelfAdministered::where('type', 'sales-phrase-image')->first();
        $bestSellersSkus = SelfAdministered::where('type', 'best-sellers')->get();
        $bestSellers = [];
        foreach($bestSellersSkus as $sku) {
            $product = Product::where('sku', $sku->content)->first();
            if($product)
                $bestSellers[] = $product;
        }
        $offersSkus = SelfAdministered::where('type', 'offers')->get();
        $offers = [];
        foreach($offersSkus as $sku) {
            $product = Product::where('sku', $sku->content)->first();
            if($product)
                $offers[] = $product;
        }
        $recommendationsSkus = SelfAdministered::where('type', 'recommendations')->get();
        $recommendations = [];
        foreach($recommendationsSkus as $sku) {
            $product = Product::where('sku', $sku->content)->first();
            if($product)
                $recommendations[] = $product;
        }
        $purchaseDetailsImage = SelfAdministered::where('type', 'purchase-details-image')->first();
        $offerImages = SelfAdministered::where('type', 'offer-images')->get();
        $testimonials = SelfAdministered::where('type', 'testimony')->get();
        return view('store.home', compact('sliderImages', 'partners', 'salesPhrase', 'salesPhraseImage', 'bestSellers', 'offers', 'purchaseDetailsImage', 'offerImages', 'recommendations', 'testimonials'));
    }
    public function catalogue(Request $request)
    {
		$tags = Tag::ordered()->get();
        $tagsSelected = $request['tags'] != '' ? explode(',', $request['tags']) : [];
        $genders = $request['genders'] != '' ? explode(',', $request['genders']) : [];        
        $brands = $request['brands'] != '' ? explode(',', $request['brands']) : [];        
        $sizes = $request['sizes'] != '' ? explode(',', $request['sizes']) : [];
        $search_description = $request['search_description'];
        $product_query = Product::select(DB::raw('ANY_VALUE(`id`) `id`, `brand_id`, `model`, `description`, MAX(`unit_price`) `unit_price`, MAX(`updated_at`) `updated_at`'));
        if($search_description != '') {
            $search = '%' . $search_description . '%';
            $product_query = $product_query->where(function ($query) use ($search) {                
                $brands = Brand::where('name', 'LIKE', $search)->get();
                $brands_id = [];
                foreach($brands as $brand) {
                    $brands_id[] = $brand->id;
                }
                $query
                    ->whereIn('brand_id', $brands_id)
                    ->orWhere('model', 'LIKE', $search)
                    ->orWhere('description', 'LIKE', $search);
            });
        }
        if(count($genders) > 0)
            $product_query->whereIn('gender', $genders);
        if(count($brands) > 0) {
            $product_query->where(function($query) use ($brands) {
                $brands_filtered = Brand::where(function ($query) use ($brands) {
                    if(in_array('A-E', $brands))
                        $query->orWhereRaw('name RLIKE \'^[a-eA-E]\'');
                    if(in_array('F-J', $brands))
                        $query->orWhereRaw('name RLIKE \'^[f-jF-J]\'');
                    if(in_array('K-O', $brands))
                        $query->orWhereRaw('name RLIKE \'^[k-oK-O]\'');
                    if(in_array('P-T', $brands))
                        $query->orWhereRaw('name RLIKE \'^[p-tP-T]\'');
                    if(in_array('U-Z', $brands))
                        $query->orWhereRaw('name RLIKE \'^[u-zU-Z]\'');
                    if(in_array('0-9', $brands))
                        $query->orWhereRaw('name RLIKE \'^[0-9]\'');
                })->get();
                $brands_id = [];
                foreach($brands_filtered as $brand_filtered) {
                    $brands_id[] = $brand_filtered->id;
                }
                $query->whereIn('brand_id', $brands_id);
            });
        }
        if(count($sizes) > 0) {
            $product_query->where(function($query) use ($sizes) {
                if(in_array('12-14', $sizes))
                    $query->orWhere('size', '12/14');
                if(in_array('15-17', $sizes))
                    $query->orWhere('size', '15/17');
                if(in_array('18-21', $sizes))
                    $query->orWhere('size', '18/21');
                if(in_array('22-25', $sizes))
                    $query->orWhere('size', '22/25');
                if(in_array('26-28', $sizes))
                    $query->orWhere('size', '26/28');
            });
        }
        $product_query->where('quantity', '>', 0);
        if(count($tagsSelected) > 0)
            $products = $product_query->where('show_in_catalogue', true)->withAnyTags($tagsSelected)->groupBy('brand_id', 'model', 'description')->orderBy('updated_at', 'DESC')->paginate(15);
        else
            $products = $product_query->where('show_in_catalogue', true)->groupBy('brand_id', 'model', 'description')->orderBy('updated_at', 'DESC')->paginate(15); 
		$filters = [
			'search_description' => $request['search_description'],
			'tags' => $request['tags'],
        ];
		if(count($products) > 0){
			return view('store.catalogue', compact('products', 'tags', 'filters'));
    	} else {
            return view('store.catalogue', compact('products', 'tags', 'filters'))->withErrors('No hay alguna coinicidencia');
        }
    }

    public function contact() {
        return view('store.contact');
    }

    public function faq() {
        return view('store.faq');
    }

    public function shipping() {
        return view('store.shipping');
    }

    public function privacy() {
        return view('store.privacy');
    }

    public function terms() {
        return view('store.terms');
    }

    public function about() {
        return view('store.about');
    }

    public function subscribe(Request $request) {
        $validatedData = $request->validate([
            'email' => 'email|max:128|unique:newsletter_subscribers,email',
        ]);
        NewsletterSubscriber::create($validatedData);
        return redirect()->route('store.home');
    }

    public function register(Request $request) {
        $returnUrl = "";
        if(isset($request->returnUrl) && isset(parse_url($request->returnUrl)["host"]) && parse_url($request->returnUrl)["host"] == $request->getHttpHost())
            $returnUrl = $request->returnUrl;
        return view('store.register', compact('returnUrl'));
    }

    public function login(Request $request) {
        $returnUrl = "";
        if(isset($request->returnUrl) && isset(parse_url($request->returnUrl)["host"]) && parse_url($request->returnUrl)["host"] == $request->getHttpHost())
            $returnUrl = $request->returnUrl;
        return view('store.login', compact('returnUrl'));
    }

    public function product(Product $product) {
        $products = Product::where('brand_id', $product->brand->id)->where('model', $product->model)->where('description', $product->description)->orderBy('size')->get();
        $more_expensive_product = $product->first();
        foreach($products as $product_variant) {
            if($product_variant->unit_price > $more_expensive_product->unit_price)
                $more_expensive_product = $product_variant;
        }
        $similary_products = $product->brand->products()->where('id', '<>', $product->id)->where('show_in_catalogue', true)->where('quantity', '>', 0)->inRandomOrder()->limit(10)->get();
        return view('store.product', compact('product', 'similary_products', 'products', 'more_expensive_product'));
    }

    public function add(Product $product) {
        if(!Auth::check())
            return redirect()->route('store.register', ['returnUrl' => route('store.cart.add', ['product' => $product])]);
        $user = Auth::user();
        $order = $user->orders()->where('requested', false)->first();
        if(!$order)
            $order = new Order();
        $order->user()->associate($user);
        $order->save();
        $orderProduct = $order->order_products()->where('product_id', $product->id)->first();
        if(!$orderProduct) {
            $orderProduct = new OrderProduct();
            $orderProduct->order()->associate($order);
            $orderProduct->product()->associate($product);
            $orderProduct->quantity = 6;
            $orderProduct->save();
        }
        return redirect()->route('store.cart');
    }

    public function change_size(OrderProduct $orderProduct, Product $product) {
        $orderProduct->product()->associate($product);
        $orderProduct->save();
        return redirect()->route('store.cart');
    }
    
    public function toggle_special(OrderProduct $orderProduct, $size, $quantity) {
        if(!is_numeric($size) || !is_numeric($quantity))
            return redirect()->route('store.cart');
        $orderProduct->is_special_order = true;
        $orderProduct->size = $size;
        $orderProduct->quantity = $quantity;
        $orderProduct->save();
        return redirect()->route('store.cart');
    }

    public function cart() {
        if(!Auth::check())
            return redirect()->route('store.login');
        $user = Auth::user();
        $order = $user->orders()->where('requested', false)->first();
        $sellers = Seller::all();
        return view('store.cart', compact('order', 'sellers'));
    }

    public function quantity(Request $request, OrderProduct $orderProduct) {
        $this->authorize('quantity', $orderProduct->order);
        if(isset($request->action)) {
            if($request->action == 'ADD')
                $orderProduct->quantity += 6;
            if($request->action == 'SUBTRACT') {
                if($orderProduct->quantity >= 6)
                    $orderProduct->quantity -= 6;
            }
            $orderProduct->save();
        }
        return redirect()->route('store.cart');
    }

    public function remove(OrderProduct $orderProduct) {
        $this->authorize('remove', $orderProduct->order);
        $orderProduct->delete();
        return redirect()->route('store.cart');
    }

    public function order(Request $request) {
        $validatedData = $request->validate([
            'notes' => 'nullable|string|max:255',
            'seller' => 'nullable|integer|exists:sellers,id'
        ]);
        $user = Auth::user();
        $order = $user->orders()->where('requested', false)->first();
        if($order && count($order->order_products) > 0) {
            $order->requested = true;
            if($validatedData['notes'] != "")
                $order->notes = $validatedData['notes'];
            if($validatedData['seller'] != "")
                $order->seller()->associate($validatedData['seller']);
            $order->save();
            //Mail::to("pedidospargi@hotmail.com")->send(new OrderReceived($order));
        }
        return redirect()->route('store.cart.success');
    }

    public function successful_order() {
        return view('store.cart.success');
    }

    public function send_contact(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:50',
            'message' => 'required|string'
        ]);
        $contact = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ];
        Mail::to('pedidospargi@hotmail.com')->send(new Contacted($contact));
        return redirect()->route('store.home');
    }

    public function blank() {
        return view('store.blank');
    }

}
