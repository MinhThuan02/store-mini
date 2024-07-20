<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productid = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('products')->where('id', $productid)->first();

        $data = [
            'id' => $product_info->id,
            'name' => $product_info->name,
            'price' => $product_info->price,
            'quantity' => $quantity,
            'attributes' => [
                'img' => $product_info->img,
            ]
        ];

        Cart::add($data);

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->route('cart')->with('success', 'Product removed from cart!');
    }

    public function cart()
    {
        $cartCollection = Cart::getContent();
        return view('cart', compact('cartCollection'));
    }

    public function update_cart(Request $request)
    {
        $itemId = $request->input('id');
        $quantity = $request->input('quantity');

        Cart::update($itemId, [
            'quantity' => [
                'relative' => false,
                'value' => $quantity
            ],
        ]);

        $cartSubtotal = Cart::getSubTotal();
        $cartTotal = Cart::getTotal();
        $item = Cart::get($itemId);
        $itemSubtotal = $item->price * $item->quantity;

        return response()->json([
            'success' => true,
            'cartSubtotal' => number_format($cartSubtotal, 0, ',', '.') . ' VND',
            'cartTotal' => number_format($cartTotal, 0, ',', '.') . ' VND',
            'itemSubtotal' => number_format($itemSubtotal, 0, ',', '.') . ' VND'
        ]);
    }
}
