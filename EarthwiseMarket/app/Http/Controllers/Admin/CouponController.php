<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $result['data'] = Coupon::all();
        return view('admin/coupon', $result);
    }

    public function manage_coupon(Request $request)
    {
        return view('Admin.ManageCoupon');
    }

    public function manage_coupon_process() {}

    public function delete() {}
    public function status() {}
}
