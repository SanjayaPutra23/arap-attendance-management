<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class   ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.dash');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('page.profil',['user'=> User::find(Auth::user()->id)]);
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
        dd($request);
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],

        ]);
        if($validatedData){
        $user = User::find(Auth::user()->id);
        $user->update($request->except(['_token','_method']));
        return redirect( route('profil.edit','1'))
            ->with('msg','success-berhasil merubah profil '.$request->name);
        } else {
            return redirect( route('profil.edit','1'))
                ->with('msg','danger-we got a problem here');
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatar(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if($request->hasFILE('avatar')){
            $user->avatar = $id.'_'.$request->file('avatar')->getClientOriginalName();
            $user->save();
            $request->file('avatar')->move('assets/img/avatars/', $id.'_'.$request->file('avatar')->getClientOriginalName());
            return redirect(route('profil.edit','1'))->with('msg','success-'.$user->name.' avatar has been Updated');
        } else {
            return redirect(route('profil.edit','1'))->with('msg','warning-please choose file');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', "max:255"],
            'c_password' => ['required', 'string', 'min:8',"max:255"],
        ]);
        if($validatedData) {
            $opas = $request->old_password;
            $id = Auth::user()->id;
            $user = User::find($id);

        if (Hash::check($opas, $user->password) && $request->new_password ===  $request->c_password) {

            $request->user()->fill([
                'password' => Hash::make($request->c_password)
            ])->save();
            return redirect( route('profil.edit','1'))->with('msg', 'info-Password '.$user->name.' telah di update.');
        } else {
            return redirect( route('profil.edit','1'))->with('msg', 'danger-Password tidak sesuai.');
        } } else {
            return redirect( route('profil.edit','1'))->with('msg', 'danger-Ingat Kembali Kredensial anda.');
        }
    }

}
