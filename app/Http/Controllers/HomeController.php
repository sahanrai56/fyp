<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

class HomeController extends Controller
{
    public function index(){
        $product=Product::paginate(3);
        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if ($usertype=='1')
        {
            return view('admin.home');
        }

        else
            {
                return view('admin.home');
            }
    }

    public function product_details($id){

        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }


    public function add_cart(Request $request, $id){
        if(Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->Product_title=$product->title;
            $cart->price=$product->price * $request->quantity;
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
}
