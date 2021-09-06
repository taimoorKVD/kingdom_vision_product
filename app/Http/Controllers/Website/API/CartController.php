<?php

namespace App\Http\Controllers\Website\Api;

use App\Http\Controllers\Controller;
use App\Models\Website\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return false|string
     */
    public function store()
    {
        if(isset(request()->user) && !empty(request()->user)) {
            $cart = new Cart();
            $cart->user_id = request()->user['id'];
            $cart->product_id = request()->product['id'];
            try {
                $cart->save();
                return json_encode($cart);
            } catch (\Exception $e) {
                return json_encode($e);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function show($id)
    {
        if(isset($id) && !empty($id)) {
            return Cart::with('product')->where('user_id', $id)->get()->pluck('product');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Support\Collection
     */
    public function destroy()
    {
        $productId = request()->product['id'] ?? request()->product;
        if(isset(request()->user) && !empty(request()->user)) {
            return Cart::where('user_id', request()->user['id'])
                ->where('product_id', $productId)
                ->delete();
        }
    }
}
