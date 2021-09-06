<?php

namespace App\Http\Controllers\Website\Api;

use App\Http\Controllers\Controller;
use App\Models\Website\Cart;
use App\Models\Website\Customer;
use App\Models\Website\Order;
use App\Models\Website\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class CheckoutController extends Controller
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
     * @throws ValidationException
     */
    public function store()
    {
        $this->validate(request(),[
            'customer.first_name' => 'required|min:2',
            'customer.last_name' => 'required|min:2',
            'customer.email' => 'required|email',
            'customer.street' => 'required|min:2',
            'customer.city' => 'required|min:2',
            'customer.state' => 'required|min:2',
            'customer.country' => 'required|min:2',
            'customer.zip' => 'required|min:2',
        ]);

        if(empty(request()->user)) {
            $customer = new Customer();
            $customer->first_name = request()->customer['first_name'];
            $customer->last_name = request()->customer['last_name'];
            $customer->email = request()->customer['email'];
            $customer->street = request()->customer['street'];
            $customer->city = request()->customer['city'];
            $customer->state = request()->customer['state'];
            $customer->country = request()->customer['country'];
            $customer->zip = request()->customer['zip'];
            $customer->save();
        }

        $order = new Order();
        $order->customer_id = isset(request()->user['id']) && !empty(request()->user['id']) ? request()->user['id'] : $customer->id;
        $order->save();

        $order_product = [];
        if(count(request()->products) > 0) {
            foreach (request()->products as $product) {
                    $rec = [
                        'order_id' => $order->id,
                        'product_id' => $product['id'],
                        'created_at' => Carbon::now()
                    ];
                array_push($order_product, $rec);
            }
            $result = OrderProduct::insert($order_product);
        }

        if(isset(request()->user) && !empty(request()->user)) {
            Cart::where('user_id', request()->user['id'])
                ->delete();
        }
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
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
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
