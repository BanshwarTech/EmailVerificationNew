<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class HomeBannerController extends Controller
{
    public function index()
    {
        $result['homebanner'] = HomeBanner::all();
        return view('Admin.HomeBanner', $result);
    }

    public function manage_homebanner(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = HomeBanner::where(['id' => $id])->get();
            $result['image'] = $arr['0']->image;
            $result['title'] = $arr['0']->title;
            $result['subtitle'] = $arr['0']->subtitle;
            $result['btn_txt'] = $arr['0']->btn_txt;
            $result['btn_link'] = $arr['0']->btn_link;
            $result['id'] = $arr['0']->id;
        } else {
            $result['image'] = '';
            $result['title'] = '';
            $result['subtitle'] = '';
            $result['btn_txt'] = '';
            $result['btn_link'] = '';
            $result['id'] = "";
        }

        return view('Admin.ManageHomeBanner', $result);
    }

    public function manage_homebanner_process(Request $request)
    {


        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,svg,gif'
        ]);

        if ($request->post('id') > 0) {
            $model = HomeBanner::find($request->post('id'));
            $msg = "Banner updated";
        } else {
            $model = new HomeBanner();
            $msg = "Banner inserted";
        }

        if ($request->hasfile('image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('home_banners')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/public/media/banner/' . $arrImage[0]->image)) {
                    Storage::delete('/public/media/banner/' . $arrImage[0]->image);
                }
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('media/banner', $image, $image_name);
            $model->image = $image_name;
        }
        $model->title = $request->post('title');
        $model->subtitle = $request->post('subtitle');
        $model->btn_txt = $request->post('btn_txt');
        $model->btn_link = $request->post('btn_link');
        $model->status = 1;
        $model->save();
        $request->session()->flash('successMessage', $msg);
        return redirect('admin/homebanner');
    }

    public function delete(Request $request, $id)
    {
        $model = HomeBanner::find($id);
        $model->delete();
        $request->session()->flash('successMessage', 'Banner deleted');
        return redirect('admin/homebanner');
    }

    public function status(Request $request, $status, $id)
    {
        $model = HomeBanner::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('successMessage', 'Banner status updated');
        return redirect('admin/homebanner');
    }
}
