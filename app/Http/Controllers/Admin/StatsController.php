<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

use App\Order;
use App\OrderProduct;
use App\Seller;
use App\Client;

class StatsController extends Controller
{
    public function salesman() {
        $sellers = Seller::all();
        return view('admin.stats.salesman', compact('sellers'));
    }

    public function salesman_data(DataTables $dataTables, Request $request) {
        $validatedData = $request->validate([
            'seller' => 'required|integer',
        ]);
        $model = Order::query();
        $model->where('confirmed', true);
        $model->where('seller_id', $request->seller);
        $model->orderBy('updated_at', 'DESC');
        return $dataTables->eloquent($model)->removeColumn('order_products')->toJson();
    }

    public function clients() {
        $clients = Client::all();
        return view('admin.stats.clients', compact('clients'));
    }

    public function clients_data(DataTables $dataTables, Request $request) {
        $validatedData = $request->validate([
            'client' => 'required|integer',
        ]);
        $model = Order::query();
        $model->where('confirmed', true);
        $model->where('user_id', $request->client);
        $model->orderBy('updated_at', 'DESC');
        return $dataTables->eloquent($model)->removeColumn('order_products')->toJson();
    }

    public function products() {
        $sellers = Seller::all();
        return view('admin.stats.products', compact('sellers'));
    }

    public function products_data(DataTables $dataTables) {
        $data = DB::table('order_products')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('orders', 'order_products.order_id', '=', 'orders.id')
            ->select('products.sku', 'products.model', 'products.description', 'products.size', 'brands.name', DB::raw('SUM(`order_products`.`quantity`) as total_items'))
            ->where('orders.confirmed', true)
            ->groupBy('product_id')->get();
        return $dataTables->collection($data)->toJson();
    }
}
