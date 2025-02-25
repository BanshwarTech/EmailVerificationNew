<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $result['orders'] = DB::table('orders')
            ->select('orders.*', 'order_status.orders_status')
            ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_status')
            ->orderBy('orders.added_on', 'desc')
            ->get();
        return view('Admin.Order', $result);
    }

    public function order_details(Request $request, $id)
    {
        $result['orders_details'] =
            DB::table('order_details')
            ->select('orders.*', 'orders.id', 'order_details.price', 'order_details.qty', 'products.name as pname', 'product_attrs.attr_image', 'sizes.size', 'colors.color', 'order_status.orders_status', 'products.tax_id', 'taxes.tax_value', 'taxes.tax_desc', 'coupons.*')
            ->leftJoin('orders', 'orders.id', '=', 'order_details.orders_id')
            ->leftJoin('product_attrs', 'product_attrs.id', '=', 'order_details.products_attr_id')
            ->leftJoin('products', 'products.id', '=', 'product_attrs.products_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_attrs.size_id')
            ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_status')
            ->leftJoin('colors', 'colors.id', '=', 'product_attrs.color_id')
            ->leftJoin('coupons', 'coupons.code', '=', 'orders.coupon_code')
            ->leftJoin('taxes', 'taxes.id', '=', 'products.tax_id')
            ->where(['orders.id' => $id])
            ->paginate();

        $result['order_status'] =
            DB::table('order_status')
            ->get();
        $result['payment_status'] = ['Pending', 'Success', 'Fail'];

        return view('Admin.OrderDetails', $result);
    }

    public function update_payment_status(Request $request, $status, $id)
    {
        DB::table('orders')
            ->where(['id' => $id])
            ->update(['payment_status' => $status]);
        $request->session()->flash('successMessage', 'Payment Status Updated Successfully....');
        return redirect('/admin/order/order_detail/' . $id);
    }

    public function update_order_status(Request $request, $status, $id)
    {
        DB::table('orders')
            ->where(['id' => $id])
            ->update(['order_status' => $status]);
        $request->session()->flash('successMessage', "Order Status Updated Successfully....");
        return redirect('/admin/order/order_detail/' . $id);
    }

    public function update_track_detail(Request $request, $id)
    {
        $track_details = $request->post('track_details');
        DB::table('orders')
            ->where(['id' => $id])
            ->update(['track_details' => $track_details]);
        $request->session()->flash('successMessage', "Tracking Details Updated Successfully....");
        return redirect('/admin/order/order_detail/' . $id);
    }
}
