<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                $result['customers']['name'] = $customer_info[0]->name;
                $result['customers']['email'] = $customer_info[0]->email;
                $result['customers']['mobile'] = $customer_info[0]->mobile;
                $result['customers']['address'] = $customer_info[0]->address;
                $result['customers']['city'] = $customer_info[0]->city;
                $result['customers']['state'] = $customer_info[0]->state;
                $result['customers']['zip'] = $customer_info[0]->zip;
                $result['customers']['company'] = $customer_info[0]->company;
            } else {
                $result['customers']['name'] = '';
                $result['customers']['email'] = '';
                $result['customers']['mobile'] = '';
                $result['customers']['address'] = '';
                $result['customers']['city'] = '';
                $result['customers']['state'] = '';
                $result['customers']['zip'] = '';
                $result['customers']['company'] = '';
            }

            return view('front.checkout', $result);
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
