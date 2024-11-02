<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{

    public function wishlist(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_ID');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }

        $result['list'] = DB::table('wishlists')
            ->leftJoin('products', 'products.id', '=', 'wishlists.product_id')
            ->leftJoin('product_attrs', 'product_attrs.id', '=', 'wishlists.product_attr_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('products.name', 'products.image', 'sizes.size', 'colors.color', 'product_attrs.price', 'product_attrs.mrp', 'products.slug', 'products.id as pid', 'product_attrs.id as attr_id', 'wishlists.id as id', 'product_attrs.attr_image as attr_image')
            ->get();
        return view('Front.Wishlist', $result);
    }

    public function add_to_wishlist(Request $request, $id, $size, $color)
    {
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_ID');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }

        $product_id = $id;
        $size_id = $size;
        $color_id = $color;



        $result = DB::table('product_attrs')
            ->select('product_attrs.id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
            ->where(['products_id' => $product_id])
            ->where(['sizes.size' => $size_id])
            ->where(['colors.color' => $color_id])
            ->get();

        $product_attr_id = $result[0]->id;
        $check = DB::table('wishlists')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->where(['product_id' => $product_id])
            ->where(['product_attr_id' => $product_attr_id])
            ->get();
        if (isset($check[0])) {
            $update_id = $check[0]->id;
            DB::table('wishlists')
                ->where(['id' => $update_id]);
            $msg = "Already available";
        } else {
            $model = new Wishlist();
            $model->user_id = $uid;
            $model->user_type = $user_type;
            $model->product_id = $product_id;
            $model->product_attr_id = $product_attr_id;
            $model->added_on = date('Y-m-d');
            $model->Save();
            $msg = "Item successfully added to the wishlist.";
        }
        $request->session()->flash('successMessage', $msg);
        return redirect('/wishlist');
    }

    public function removeWishlist(Request $request, $id)
    {
        $model = Wishlist::find($id);
        $model->delete();
        $request->session()->flash('successMessage', 'Item removed from wishlist.');
        return redirect('/wishlist');
    }
}
