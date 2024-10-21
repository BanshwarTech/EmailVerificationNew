<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['product'] = Product::get();
        return view('Admin.Product', $result);
    }

    public function manage_product(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Product::where(['id' => $id])->get();

            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['slug'] = $arr['0']->slug;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;
            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax_id'] = $arr['0']->tax_id;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['is_tranding'] = $arr['0']->is_tranding;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;

            $result['productAttrArr'] = DB::table('products_attr')->where(['products_id' => $id])->get();

            $productImagesArr = DB::table('product_images')->where(['products_id' => $id])->get();

            if (!isset($productImagesArr[0])) {
                $result['productImagesArr']['0']['id'] = '';
                $result['productImagesArr']['0']['images'] = '';
            } else {
                $result['productImagesArr'] = $productImagesArr;
            }
            //$result['productImagesArr']
        } else {
            $result['category_id'] = '';
            $result['name'] = '';
            $result['slug'] = '';
            $result['image'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['lead_time'] = '';
            $result['tax_id'] = '';
            $result['is_promo'] = '';
            $result['is_featured'] = '';
            $result['is_discounted'] = '';
            $result['is_tranding'] = '';
            $result['status'] = '';
            $result['id'] = 0;

            $result['productAttrArr'][0]['id'] = '';
            $result['productAttrArr'][0]['products_id'] = '';
            $result['productAttrArr'][0]['sku'] = '';
            $result['productAttrArr'][0]['attr_image'] = '';
            $result['productAttrArr'][0]['mrp'] = '';
            $result['productAttrArr'][0]['price'] = '';
            $result['productAttrArr'][0]['qty'] = '';
            $result['productAttrArr'][0]['size_id'] = '';
            $result['productAttrArr'][0]['color_id'] = '';

            $result['productImagesArr']['0']['id'] = '';
            $result['productImagesArr']['0']['images'] = '';
            /*echo '<pre>';
            print_r( $result['productAttrArr']);
            die();*/
        }
        /*echo '<pre>';
        print_r( $result);
        die();*/
        $result['category'] = DB::table('categories')->where(['status' => 1])->get();

        $result['sizes'] = DB::table('sizes')->where(['status' => 1])->get();

        $result['colors'] = DB::table('colors')->where(['status' => 1])->get();

        $result['brands'] = DB::table('brands')->where(['status' => 1])->get();

        $result['taxes'] = DB::table('taxes')->where(['status' => 1])->get();
        return view('admin/ManageProduct', $result);
    }
}
