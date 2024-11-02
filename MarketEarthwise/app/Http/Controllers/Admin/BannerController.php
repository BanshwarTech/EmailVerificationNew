<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BannerController extends Controller
{
    public function Index()
    {
        $result['data'] = Banner::all();
        return view('Admin.Banner', $result);
    }
    public function manage_banner(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Banner::where(['id' => $id])->get();

            $result['banner_title'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_selected'] = "";
            if ($arr['0']->is_home == 1) {
                $result['is_home_selected'] = "checked";
            }
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;
        } else {
            $result['banner_title'] = '';
            $result['image'] = '';
            $result['is_home'] = "";
            $result['is_home_selected'] = "";
            $result['status'] = '';
            $result['id'] = 0;
        }
        return view('Admin.ManageBanner', $result);
    }

    public function manage_banner_process(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:banners,banner_title,' . $request->post('id'),
            'image' => 'mimes:jpeg,jpg,png,gif,svg'
        ]);

        if ($request->post('id') > 0) {
            $model = Banner::find($request->post('id'));
            $msg = "Brand updated";
        } else {
            $model = new Banner();
            $msg = "Brand inserted";
        }

        if ($request->hasfile('image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('brands')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/public/media/banner/' . $arrImage[0]->image)) {
                    Storage::delete('/public/media/banner/' . $arrImage[0]->image);
                }
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('media/banner', $image, $image_name);
            $model->image = $image_name;
        }
        $model->is_home = 0;
        if ($request->post('is_home') !== null) {
            $model->is_home = 1;
        }
        $model->banner_title = $request->post('name');
        $model->status = 1;
        $model->save();


        $request->session()->flash('successMessage', $msg);
        return redirect('admin/banner');
    }

    public function delete(Request $request, $id)
    {
        $model = Banner::find($id);
        $model->delete();
        $request->session()->flash('successMessage', 'Brand deleted');
        return redirect('admin/banner');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Banner::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('successMessage', 'Brand status updated');
        return redirect('admin/banner');
    }
}
