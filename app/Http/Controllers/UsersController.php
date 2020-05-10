<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;

class UsersController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->auth = $request->input('auth');
        $user->save();
        return redirect('/dashboard');
    }

    public function destroy(User $user){
        //$cart = $user->carts();

        $cart = Cart::where('user_id', $user);
        $cart->delete();
        $user->delete();

        return redirect('dashboard');
    }
}
