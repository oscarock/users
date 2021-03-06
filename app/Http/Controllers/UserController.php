<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return $users;
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
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'document' => 'required|numeric|unique:users,document',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users,email'
        ]);

        $users = new User;
        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->document = $request->input('document');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->save();

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'document' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email'
        ]);

        $users = User::findOrFail($id);
        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->document = $request->input('document');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->save();

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
