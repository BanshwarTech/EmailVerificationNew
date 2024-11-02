<?php

use Illuminate\Support\Facades\DB;

function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}

function getTopNavCat()
{
    $result = DB::table('categories')
        ->where(['status' => 1])
        ->get();
    $arr = [];
    foreach ($result as $row) {
        $arr[$row->id]['category_name'] = $row->category_name;
        $arr[$row->id]['parent_id'] = $row->parent_category_id;
        $arr[$row->id]['category_slug'] = $row->category_slug;
    }
    $str = buildTreeView($arr, 0);
    return $str;
}
$html = '';

function buildTreeView($arr, $parent, $level = 0, $prelevel = -1)
{
    global $html;

    foreach ($arr as $id => $data) {
        if ($parent == $data['parent_id']) {
            if ($level > $prelevel) {
                // Start top-level container
                if ($html == '') {
                    $html .= '<ul class="mega-menu-inner">';
                } else {
                    // Start a new sub-menu level
                    $html .= '<ul class="mega-menu-sub">';
                }
            }

            if ($level == $prelevel) {
                $html .= '</li>';
            }

            $url = url("/category/" . $data['category_slug']);
            if ($level == 0) {
                // Parent category with "mega-menu-item-title" class
                $html .= '<li class="mega-menu-item"><a href="' . $url . '" class="mega-menu-item-title">' . $data['category_name'] . '</a>';
            } else {
                // Child category
                $html .= '<li><a href="' . $url . '">' . $data['category_name'] . '</a>';
            }

            if ($level > $prelevel) {
                $prelevel = $level;
            }

            $level++;
            buildTreeView($arr, $id, $level, $prelevel);
            $level--;
        }
    }

    if ($level == $prelevel) {
        // Close the last opened list
        $html .= '</li></ul>';
    }

    return $html;
}
function getTopNavigationMobileCategories()
{
    $categories = DB::table('categories')
        ->where(['status' => 1])
        ->get();
    $categoryArray = [];

    foreach ($categories as $category) {
        $categoryArray[$category->id]['name'] = $category->category_name;
        $categoryArray[$category->id]['parentId'] = $category->parent_category_id;
        $categoryArray[$category->id]['slug'] = $category->category_slug;
    }

    $navigationHtml = buildMobileCategoryTree($categoryArray, 0);
    return $navigationHtml;
}

$htmlOutput = '';

function buildMobileCategoryTree($categoryArray, $parentId, $currentLevel = 0)
{
    global $htmlOutput;

    foreach ($categoryArray as $categoryId => $categoryData) {
        if ($parentId == $categoryData['parentId']) {
            // Create a list item for this category
            $categoryUrl = url("/category/" . $categoryData['slug']);
            $htmlOutput .= '<li><a href="' . $categoryUrl . '">' . $categoryData['name'] . '</a>';

            // Check if the current category has children
            $hasChildren = false;
            foreach ($categoryArray as $childId => $childData) {
                if ($childData['parentId'] == $categoryId) {
                    $hasChildren = true;
                    break;
                }
            }

            // If there are child categories, open a new <ul>
            if ($hasChildren) {
                $htmlOutput .= '<ul class="mobile-sub-menu">'; // Sub-menu for child categories

                // Recursive call to build child categories
                buildMobileCategoryTree($categoryArray, $categoryId, $currentLevel + 1);

                $htmlOutput .= '</ul>'; // Close the <ul> for child categories
            }

            $htmlOutput .= '</li>'; // Close the list item
        }
    }

    return $htmlOutput; // Return the built HTML
}



function getUserTempId()
{
    if (!session()->has('USER_TEMP_ID')) {
        $rand = rand(111111111, 999999999);
        session()->put('USER_TEMP_ID', $rand);
        return $rand;
    } else {
        return session()->get('USER_TEMP_ID');
    }
}

function getAddToCartTotalItem()
{
    if (session()->has('FRONT_USER_LOGIN')) {
        $uid = session()->get('FRONT_USER_ID');
        $user_type = "Reg";
    } else {
        $uid = getUserTempId();
        $user_type = "Not-Reg";
    }
    $result = DB::table('carts')
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('product_attrs', 'product_attrs.id', '=', 'carts.product_attr_id')
        ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
        ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
        ->where(['user_id' => $uid])
        ->where(['user_type' => $user_type])
        ->select('carts.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'product_attrs.price', 'products.slug', 'products.id as pid', 'product_attrs.id as attr_id', 'product_attrs.attr_image as attr_image')
        ->get();

    return $result;
}

function getAddToWishlistTotalItem()
{

    if (session()->has('FRONT_USER_LOGIN')) {
        $uid = session()->get('FRONT_USER_ID');
        $user_type = "Reg";
    } else {
        $uid = getUserTempId();
        $user_type = "Not-Reg";
    }

    $result = DB::table('wishlists')
        ->leftJoin('products', 'products.id', '=', 'wishlists.product_id')
        ->leftJoin('product_attrs', 'product_attrs.id', '=', 'wishlists.product_attr_id')
        ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
        ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
        ->where(['user_id' => $uid])
        ->where(['user_type' => $user_type])
        ->select('products.name', 'products.image', 'sizes.size', 'colors.color', 'product_attrs.price',  'product_attrs.mrp', 'products.slug', 'products.id as pid', 'product_attrs.id as attr_id', 'product_attrs.attr_image as attr_image', 'wishlists.id as id')
        ->get();

    return $result;
}


function apply_coupon_code($coupon_code)
{
    $totalPrice = 0;
    $result = DB::table('coupons')
        ->where(['code' => $coupon_code])
        ->get();

    if (isset($result[0])) {
        $value = $result[0]->value;
        $type = $result[0]->type;
        $getAddToCartTotalItem = getAddToCartTotalItem();

        foreach ($getAddToCartTotalItem as $list) {
            $totalPrice = $totalPrice + ($list->qty * $list->price);
        }
        if ($result[0]->status == 1) {
            if ($result[0]->is_one_time == 1) {
                $status = "error";
                $msg = "Coupon code already used";
            } else {
                $min_order_amt = $result[0]->min_order_amt;
                if ($min_order_amt > 0) {

                    if ($min_order_amt < $totalPrice) {
                        $status = "success";
                        $msg = "Coupon code applied";
                    } else {
                        $status = "error";
                        $msg = "Cart amount must be greater then $min_order_amt";
                    }
                } else {
                    $status = "success";
                    $msg = "Coupon code applied";
                }
            }
        } else {
            $status = "error";
            $msg = "Coupon code deactivated";
        }
    } else {
        $status = "error";
        $msg = "Please enter valid coupon code";
    }

    $coupon_code_value = 0;
    if ($status == 'success') {
        if ($type == 'Value') {
            $coupon_code_value = $value;
            $totalPrice = $totalPrice - $value;
        }
        if ($type == 'Per') {
            $newPrice = ($value / 100) * $totalPrice;
            $totalPrice = round($totalPrice - $newPrice);
            $coupon_code_value = $newPrice;
        }
    }

    return json_encode(['status' => $status, 'msg' => $msg, 'totalPrice' => $totalPrice, 'coupon_code_value' => $coupon_code_value]);
}

function getCustomDate($date)
{
    if ($date != '') {
        $date = strtotime($date);
        return date('d-M Y', $date);
    }
}

function getAvaliableQty($product_id, $attr_id)
{
    $result = DB::table('order_details')
        ->leftJoin('orders', 'orders.id', '=', 'order_details.orders_id')
        ->leftJoin('product_attrs', 'product_attrs.id', '=', 'order_details.product_attrs_id')
        ->where(['order_details.product_id' => $product_id])
        ->where(['order_details.product_attrs_id' => $attr_id])
        ->select('order_details.qty', 'product_attrs.qty as pqty')
        ->get();

    return $result;
}
