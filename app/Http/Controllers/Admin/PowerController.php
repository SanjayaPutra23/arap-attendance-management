<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PowerController extends Controller
{
    public function index($id)
    {
        $user= User::find($id);
        if($user){
            session()->put('power',$user->id);
        }
        return redirect('/home');
   }

    public function destroy()
    {
            session()->forget('power');
        return redirect(route('admin.users.index'));
   }
}
