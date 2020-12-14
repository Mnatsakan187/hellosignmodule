<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $data = [
            'category_name' => 'user-management',
            'page_name' => 'basic',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'users' => $users
        ];

        return view('pages.user_management.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'user-management',
            'page_name' => 'user_management',
            'has_scrollspy' => 0,
            'scrollspy_offset' => ''
        ];

        return view('pages.user_management.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email']
        ]);

        return redirect()->route('user-management.index')
            ->with('success', 'User created successfully.');
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
        $user = User::findOrFail($id);

        $data = [
            'category_name' => 'user-management',
            'page_name' => 'user_management',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'user' => $user
        ];

        return view('pages.user_management.edit')->with($data);
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
        $data = $request->all();

        $user =  User::findOrFail($id);

        $user->update([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email']
        ]);

        return redirect()->route('user-management.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::findOrFail($id);
        $user->delete();
        return redirect()->route('user-management.index')
            ->with('success', 'User deleted successfully.');
    }
}
