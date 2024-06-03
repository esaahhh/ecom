<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;


use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    public function index()
    {
     return view('admin.index');

    }

    public function home()
    {
        $product =Product::all();

        if(Auth::id())
        {
            $user = Auth::user(); // Get the authenticated user
            $userid = $user->id; // Get the user ID
            $count = Cart::where('user_id', $userid)->count(); // Count the number of items in the cart for the user
        }
        else
        {
            $count='';

        }
       
     return view('home.index', compact('product','count'));
   }

    
    
    public function login_home()
    {
    $product = Product::all(); // Retrieve all products
    $user = Auth::user(); // Get the authenticated user
    $userid = $user->id; // Get the user ID
    $count = Cart::where('user_id', $userid)->count(); // Count the number of items in the cart for the user

    return view('home.index', compact('product', 'count')); // Pass the products, count to the view
}



     
     
      
      public function product_details($id)
     {
        $data = Product::find($id);
        $user = Auth::user(); // Get the authenticated user
    $userid = $user->id; // Get the user ID
    $count = Cart::where('user_id', $userid)->count(); // Count the number of items in the cart for the user
        
         return view('home.product_details',compact('data','count'));
      }

      
      public function add_cart($id)
     {
        $product_id = $id;
        $user =Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
$data->save();
toastr()->timeOut(90000)->closebutton()->success('Product added successfully!');

         return redirect()->back();
      }



      
      
      public function mycart()
    {
        if(Auth::id())
        {
            $user =Auth::user();

            $userid=$user->id;
            $count =Cart::where('user_id',$userid)->count();
            $cart=Cart::where('user_id',$userid)->get();




        }
    

    return view('home.mycart',compact('count','cart')); // Pass the products, count to the view
}


public function delete_cart($id)
{
    $data = cart::find($id);

    $data->delete();

   return redirect()->back();
}

public function confirm_order(Request $request)
{
    $name = $request->name;
    $address = $request->address;
    $phone = $request->phone;

    $userid = Auth::user()->id;
    $cart = Cart::where('user_id', $userid)->get();
    
    foreach ($cart as $carts) {
        $order = new Order;
        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;
        $order->user_id = $userid;
        $order->product_id = $carts->product_id;
        $order->save();
    }
    $cart_remove=Cart::where('user_id',$userid)->get();
    foreach($cart_remove as $remove)
    {
        $data=Cart::find($remove->id);
        $data->delete();
    }
    
    // Move the redirect outside the foreach loop
    toastr()->timeOut(90000)->closebutton()->success('Order placed successfully!');

    return redirect()->back();

}

    public function wishlist_details($id)
    {
        return view('home.wishlist_details');
    }










}












