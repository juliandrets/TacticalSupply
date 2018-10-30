<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
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

    public function countusers() {
        $users = User::all();
        $countusers = count($users);
        return $countusers;
    }

    public function validarUserBD() {
        $users = User::all();
        $emails = [];
        
        foreach($users as $user) {
            array_push($emails, $user->email);
        }

        return $emails;
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $editMode = false;
        return view('profile', ['editMode' => $editMode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $editMode = true;

        return view('profile', ['user' => $user, 'editMode' => $editMode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id; 
        $editMode = false;

        if ($request->hasFile('picture')) {
            
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avatars/');
            $image->move($destinationPath, $name);

            User::find($id)->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'avatar' => $name
            ]);

            //return view('profile', ['editMode' => $editMode]);
            return redirect('profile');
        }

        User::find($id)->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ]);

        //return view('profile', ['editMode' => $editMode]);
        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
