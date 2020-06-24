<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewClient;
use Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'username' => 'required|alpha_dash|unique:users|max:16',
            'password' => 'required|confirmed|max:255',
            'email' => 'required|email|unique:users|max:128',
            'company' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:25',
            'mobile_phone' => 'required|string|max:25',
        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $client = new Client($validatedData);
        $client->user()->associate($user);
        $client->save();
        Mail::to("pedidospargi@hotmail.com")->send(new NewClient($client));
        $credentials = $request->only('username', 'password');
        Auth::attempt($credentials);
        if(isset($request->returnUrl) && isset(parse_url($request->returnUrl)["host"]) && parse_url($request->returnUrl)["host"] == $request->getHttpHost())
            return redirect()->to($request->returnUrl);
        return redirect()->route('store.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
