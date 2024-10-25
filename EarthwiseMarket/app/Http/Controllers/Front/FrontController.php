<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Mail;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['category'] = DB::table('categories')->where(['status' => 1])->where(['is_home' => 1])->limit(4)->get();

        $result['home_categories'] = DB::table('categories')
            ->where(['status' => 1])
            ->get();

        // select product all


        $result['product'] = DB::table('products')
            ->leftJoin('product_attrs', 'product_attrs.id', '=', 'products.id')
            ->where(['products.status' => 1])->distinct()->get();

        foreach ($result['home_categories'] as $list) {
            $result['home_categories_product'][$list->id] =
                DB::table('products')
                ->where(['status' => 1])
                ->where(['category_id' => $list->id])
                ->get();


            foreach ($result['home_categories_product'][$list->id] as $list1) {
                $result['home_product_attr'][$list1->id] =
                    DB::table('product_attrs')
                    ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
                    ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
                    ->where(['product_attrs.products_id' => $list1->id])
                    ->get();
            }
        }


        $result['home_brand'] = DB::table('brands')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->get();


        $result['home_featured_product'][$list->id] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['is_featured' => 1])
            ->get();

        foreach ($result['home_featured_product'][$list->id] as $list1) {
            $result['home_featured_product_attr'][$list1->id] =
                DB::table('product_attrs')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
                ->where(['product_attrs.products_id' => $list1->id])
                ->get();
        }

        $result['home_tranding_product'][$list->id] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['is_tranding' => 1])
            ->get();

        foreach ($result['home_tranding_product'][$list->id] as $list1) {
            $result['home_tranding_product_attr'][$list1->id] =
                DB::table('product_attrs')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
                ->where(['product_attrs.products_id' => $list1->id])
                ->get();
        }

        $result['home_discounted_product'][$list->id] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['is_discounted' => 1])
            ->get();

        foreach ($result['home_discounted_product'][$list->id] as $list1) {
            $result['home_discounted_product_attr'][$list1->id] =
                DB::table('product_attrs')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
                ->where(['product_attrs.products_id' => $list1->id])
                ->get();
        }

        $result['home_brand'] = DB::table('brands')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->get();

        $result['home_banner'] = DB::table('home_banners')
            ->where(['status' => 1])
            ->get();

        return view('Front.Index', $result);
    }

    public function productdetails(Request $request, $slug)
    {
        $result['product'] =
            DB::table('products')
            ->where(['products.status' => 1])
            ->where(['products.slug' => $slug])
            ->get();

        foreach ($result['product'] as $list1) {
            $result['product_attr'][$list1->id] =
                DB::table('product_attrs')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
                ->where(['product_attrs.products_id' => $list1->id])
                ->get();
        }

        foreach ($result['product'] as $list1) {
            $result['product_images'][$list1->id] =
                DB::table('product_images')
                ->where(['product_images.products_id' => $list1->id])
                ->get();
        }

        $result['related_product'] =
            DB::table('products')
            ->where(['status' => 1])
            ->where('slug', '!=', $slug)
            ->where(['category_id' => $result['product'][0]->category_id])
            ->get();
        foreach ($result['related_product'] as $list1) {
            $result['related_product_attr'][$list1->id] =
                DB::table('product_attrs')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
                ->where(['product_attrs.products_id' => $list1->id])
                ->get();
        }
        return view('Front.ProductDetails', $result);
    }
    public function add_to_cart(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_ID');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $size_id = $request->post('size_id');
        $color_id = $request->post('color_id');
        $pqty = $request->post('pqty');
        $product_id = $request->post('product_id');



        $result = DB::table('product_attrs')
            ->select('product_attrs.id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
            ->where(['products_id' => $product_id])
            ->where(['sizes.size' => $size_id])
            ->where(['colors.color' => $color_id])
            ->get();

        $product_attr_id = $result[0]->id;

        $check = DB::table('carts')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->where(['product_id' => $product_id])
            ->where(['product_attr_id' => $product_attr_id])
            ->get();

        if (isset($check[0])) {
            $update_id = $check[0]->id;

            if ($pqty == 0) {
                DB::table('carts')
                    ->where(['id' => $update_id])
                    ->delete();
                $msg = "removed";
            } else {
                DB::table('carts')
                    ->where(['id' => $update_id])
                    ->update(['qty' => $pqty]);
                $msg = "updated";
            }
        } else {
            $id = DB::table('carts')->insertGetId([
                'user_id' => $uid,
                'user_type' => $user_type,
                'product_id' => $product_id,
                'product_attr_id' => $product_attr_id,
                'qty' => $pqty,
                'added_on' => date('Y-m-d h:i:s')
            ]);
            $msg = "added";
        }

        $result = DB::table('carts')
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->leftJoin('product_attrs', 'product_attrs.id', '=', 'carts.product_attr_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('carts.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'product_attrs.price', 'products.slug', 'products.id as pid', 'product_attrs.id as attr_id')
            ->get();

        return response()->json(['msg' => $msg, 'data' => $result, 'totalItem' => count($result)]);
    }

    public function cart(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_ID');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }

        $result['list'] = DB::table('carts')
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->leftJoin('product_attrs', 'product_attrs.id', '=', 'carts.product_attr_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('carts.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'product_attrs.price', 'products.slug', 'products.id as pid', 'product_attrs.id as attr_id')
            ->get();
        return view('front.cart', $result);
    }

    public function checkout(Request $request)
    {
        $result['cart_data'] = getAddToCartTotalItem();

        if (isset($result['cart_data'][0])) {

            if ($request->session()->has('FRONT_USER_LOGIN')) {
                $uid = $request->session()->get('FRONT_USER_ID');
                $customer_info = DB::table('users')
                    ->where(['id' => $uid])
                    ->get();
                $result['users']['name'] = $customer_info[0]->name;
                $result['users']['email'] = $customer_info[0]->email;
                $result['users']['mobile'] = $customer_info[0]->mobile;
                $result['users']['address'] = $customer_info[0]->address;
                $result['users']['city'] = $customer_info[0]->city;
                $result['users']['state'] = $customer_info[0]->state;
                $result['users']['zip'] = $customer_info[0]->zip;
                $result['users']['company'] = $customer_info[0]->company;
            } else {
                $result['users']['name'] = '';
                $result['users']['email'] = '';
                $result['users']['mobile'] = '';
                $result['users']['address'] = '';
                $result['users']['city'] = '';
                $result['users']['state'] = '';
                $result['users']['zip'] = '';
                $result['users']['company'] = '';
            }

            return view('front.checkout', $result);
        } else {
            return redirect('/');
        }
    }

    public function apply_coupon_code(Request $request)
    {
        $arr = apply_coupon_code($request->coupon_code);
        $arr = json_decode($arr, true);

        return response()->json(['status' => $arr['status'], 'msg' => $arr['msg'], 'totalPrice' => $arr['totalPrice']]);
    }

    public function remove_coupon_code(Request $request)
    {
        $totalPrice = 0;
        $result = DB::table('coupons')
            ->where(['code' => $request->coupon_code])
            ->get();
        $getAddToCartTotalItem = getAddToCartTotalItem();
        $totalPrice = 0;
        foreach ($getAddToCartTotalItem as $list) {
            $totalPrice = $totalPrice + ($list->qty * $list->price);
        }

        return response()->json(['status' => 'success', 'msg' => 'Coupon code removed', 'totalPrice' => $totalPrice]);
    }
    public function placeOrder(Request $request)
    {


        $payment_url = '';
        $rand_id = rand(111111111, 999999999);

        if ($request->session()->has('FRONT_USER_LOGIN')) {
        } else {
            $valid = Validator::make($request->all(), [
                "email" => 'required|email|unique:users,email'
            ]);

            if (!$valid->passes()) {
                return response()->json(['status' => 'error', 'msg' => "The email has already been taken"]);
            } else {
                $arr = [
                    "name" => $request->name,
                    "email" => $request->email,
                    "address" => $request->address,
                    "city" => $request->city,
                    "state" => $request->state,
                    "zip" => $request->zip,
                    "password" => Hash::make($rand_id),
                    "mobile" => $request->mobile,
                    "company" => $request->company,
                    "status" => 1,
                    "is_verify" => 1,
                    "rand_id" => $rand_id,
                    "created_at" => date('Y-m-d h:i:s'),
                    "updated_at" => date('Y-m-d h:i:s'),
                    "is_forgot_password" => 0
                ];

                $user_id = DB::table('users')->insertGetId($arr);
                $request->session()->put('FRONT_USER_LOGIN', true);
                $request->session()->put('FRONT_USER_ID', $user_id);
                $request->session()->put('FRONT_USER_NAME', $request->name);

                $data = ['name' => $request->name, 'password' => $rand_id];
                $user['to'] = $request->email;
                Mail::send('front/password_send', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('New Password');
                });

                $getUserTempId = getUserTempId();
                DB::table('carts')
                    ->where(['user_id' => $getUserTempId, 'user_type' => 'Not-Reg'])
                    ->update(['user_id' => $user_id, 'user_type' => 'Reg']);
            }
        }
        $coupon_value = 0;
        $coupon_code = $request->coupon_code;
        if ($coupon_code != '') {
            $arr = apply_coupon_code($request->coupon_code);
            $arr = json_decode($arr, true);
            if ($arr['status'] == 'success') {
                $coupon_value = $arr['coupon_code_value'];
            } else {
                return response()->json(['status' => 'false', 'msg' => $arr['msg']]);
            }
        }



        $uid = $request->session()->get('FRONT_USER_ID');
        $totalPrice = 0;
        $getAddToCartTotalItem = getAddToCartTotalItem();
        foreach ($getAddToCartTotalItem as $list) {
            $totalPrice = $totalPrice + ($list->qty * $list->price);
        }
        $arr = [
            "user_id" => $uid,
            "name" => $request->name,
            "email" => $request->email,
            "mobile" => $request->mobile,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "pincode" => $request->zip,
            "coupon_code" => $coupon_code,
            "coupon_value" => $coupon_value,
            "payment_type" => $request->payment_type,
            "payment_status" => "Pending",
            "total_amt" => $totalPrice,
            "order_status" => 1,
            "added_on" => date('Y-m-d h:i:s')
        ];
        $order_id = DB::table('orders')->insertGetId($arr);

        if ($order_id > 0) {
            foreach ($getAddToCartTotalItem as $list) {
                $prductDetailArr['product_id'] = $list->pid;
                $prductDetailArr['products_attr_id'] = $list->attr_id;
                $prductDetailArr['price'] = $list->price;
                $prductDetailArr['qty'] = $list->qty;
                $prductDetailArr['orders_id'] = $order_id;
                DB::table('order_details')->insert($prductDetailArr);
            }

            if ($request->payment_type == 'Gateway') {
                $final_amt = $totalPrice - $coupon_value;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        "X-Api-Key:KEY",
                        "X-Auth-Token:TOKEN"
                    )
                );
                $payload = array(
                    'purpose' => 'Buy Product',
                    'amount' => $final_amt,
                    'phone' => $request->mobile,
                    'buyer_name' => $request->name,
                    'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                    'send_email' => true,
                    'send_sms' => true,
                    'email' => $request->email,
                    'allow_repeated_payments' => false
                );
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                $response = curl_exec($ch);
                curl_close($ch);
                $response = json_decode($response);
                if (isset($response->payment_request->id)) {
                    $txn_id = $response->payment_request->id;
                    DB::table('orders')
                        ->where(['id' => $order_id])
                        ->update(['txn_id' => $txn_id]);
                    $payment_url = $response->payment_request->longurl;
                } else {
                    $msg = "";
                    foreach ($response->message as $key => $val) {
                        $msg .= strtoupper($key) . ": " . $val[0] . '<br/>';
                    }
                    return response()->json(['status' => 'error', 'msg' => $msg, 'payment_url' => '']);
                }
            }
            DB::table('carts')->where(['user_id' => $uid, 'user_type' => 'Reg'])->delete();
            $request->session()->put('ORDER_ID', $order_id);

            $status = "success";
            $msg = "Order placed";
        } else {
            $status = "false";
            $msg = "Please try after sometime";
        }
        return response()->json(['status' => $status, 'msg' => $msg, 'payment_url' => $payment_url]);
    }

    public function orderPlaced(Request $request)
    {
        if ($request->session()->has('ORDER_ID')) {
            return view('front.OrderPlaced');
        } else {
            return redirect('/');
        }
    }

    public function order_fail(Request $request)
    {
        if ($request->session()->has('ORDER_ID')) {
            return view('front.order_fail');
        } else {
            return redirect('/');
        }
    }
    public function myAccount()
    {
        if (session()->has('FRONT_USER_LOGIN') && session()->get('FRONT_USER_LOGIN') === true) {

            return view('Front.myaccount');
        }
        return redirect('/login');
    }
}
