<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::paginate(10);
        $posts = Post::paginate(10);
        $comments = Comment::latest()->paginate(3);
        return view('front.home', compact('categories','posts','comments'));
    }

    public function products()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('front.products', compact('products', 'categories'));
    }

    public function singleProduct($id)
    {
        $products = Product::where('category_id', $id)->paginate(10);
        $categories = Category::all();
        return view('front.products', compact('products', 'categories'));
    }

    public function productDetails($id)
    {
        $product = Product::where('id', $id)->first();
        $related = $product->category->products()->whereNot('id', $id)->get();
        $cart = Cart::where('product_id', $id)->first();
        return view('front.product_details', compact('product', 'related','cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cartItem = Cart::where('product_id',$id)->first();
        $clientIid = auth()->user()->id;

        if($cartItem){
            $cartItem->update([
                'quantity'=>$cartItem->quantity,
            ]);
        }
        else{
            $carts = Cart::create([
                'client_id' => $clientIid,
                'product_id' => $id,
                'price' => $product->price,
                'quantity' => 1,
                'total_price' => $product->price ,
            ]);
        }

        $items = Cart::where('client_id', $clientIid)->get();
        $total = Cart::where('client_id', $clientIid)->sum('total_price');
        flash('Item added successfully')->success();
        return view('front.cart', compact('items','total'));
    }

    public function carts(Request $request)
    {
        $clientIid = auth()->user()->id;
        $items = Cart::where('client_id', $clientIid)->get();
        $total = Cart::where('client_id', $clientIid)->sum('total_price');

        return view('front.cart', compact('items','total'));
    }
    public function updateCart($id, Request $request)
    {
        $cart = Cart::findorfail($id);
        $cart->update([
            'quantity' => $request->quantity,
            'total_price' => $cart->price * $request->quantity
        ]);
        flash('Cart Updated successfully')->success();
        return redirect()->back();

    }
    public function removeCart($id)
    {
        Cart::findorfail($id)->delete();
        flash('item remove successfully')->success();
        return redirect()->back();
    }
    public function checkout(Request $request){
        $clientIid = auth()->user()->id;
        $items = Cart::where('client_id', $clientIid)->get();
        $total = Cart::where('client_id', $clientIid)->sum('total_price');
        return view('front.checkout', compact('items','total'));
    }
    public function createOrder(Request $request){
        $clientId = auth()->user()->id;
        $total = Cart::where('client_id', $clientId)->sum('total_price');
        $client = Client::findorfail($clientId);
        $request->validate([
            'note' => 'required',
            'address' => 'required',
        ]);
        $order = $client->orders()->create([
            'client_id' => $clientId,
            'note'=> $request->get('note'),
            'address' => $request->get('address'),
            'total_price' => $total,
            'payment_method' => $request->get('payment_method'),
            'status' => 'pending',
        ]);

        foreach($client->carts as $item){
            $product = Product::find($item->product_id);
            $order->products()->attach([
                $product->id =>[
                'quantity' => $item->quantity,
                'price' => $item->price,
                'special_note' => $order->note,
            ]]);

        }
        Cart::where('client_id', $clientId)->delete();
        return redirect('/my-orders');
    }
    public function myOrders()
    {
        $client = auth()->user();
        $carts = Cart::where('client_id',$client->id)->get();
        $orders = Order::where('client_id',$client->id)->get();
        return view('front.orders', compact('orders','carts'));
    }
    public function posts()
    {
        $posts = Post::paginate(8);
        return view('front.posts',compact('posts'));
    }
    public function postDetails($id)
    {
        $post = Post::findorfail($id);
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('front.post_details',compact('post','recentPosts'));
    }
    public function addComment(Request $request )
    {
        $post = Post::findorfail($request->get('post_id'));
        auth()->user()->comments()->create([
            'post_id' => $request->get('post_id'),
            'body' => $request->get('comment'),
        ]);
        flash('Comment added successfully')->success();
        return redirect()->back();
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('front.contact', compact('setting'));
    }
    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'phone' => 'required',
        ]);
        $contact = Contact::create($request->all());
        flash('Your message has been sent.')->success();
        return redirect()->back();
    }
    public function about()
    {
        return view('front.about');
    }
}
