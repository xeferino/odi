<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Mail\OrderApproved;
use Mail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function datatables(DataTables $dataTables) {
        $model = Order::where('requested', true)->orderBy('updated_at', 'DESC');
        return $dataTables->eloquent($model)->toJson();
    }

    public function modify(Request $request, OrderProduct $orderProduct) {
        $validatedData = $request->validate([
            'quantity' => 'required|integer',
            'size' => 'required|numeric',
            'discount' => 'required|numeric'
        ]);
        $orderProduct->quantity = $validatedData['quantity'];
        $orderProduct->size = $validatedData['size'];
        $orderProduct->discount = $validatedData['discount'];
        $orderProduct->save();
        return redirect()->route('admin.orders.show', ['order' => $orderProduct->order]);
    }

    public function approve(Order $order) {
        $order->confirmed = true;
        $order->save();
        /* Mail::to($order->user->email)->send(new OrderApproved($order));
        Mail::to("pedidospargi@hotmail.com")->send(new OrderApproved($order)); */
        return redirect()->route('admin.orders.index');
    }
}
