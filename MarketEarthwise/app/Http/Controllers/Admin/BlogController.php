<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BlogController extends Controller
{
    public function index()
    {
        $result['data'] = Blog::all();
        return view('Admin.Blog', $result);
    }
    public function manage_blog(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Blog::where(['id' => $id])->get();

            $result['title'] = $arr['0']->title;
            $result['image'] = $arr['0']->image;
            $result['content_before_blockquote'] = $arr['0']->content_before_blockquote;
            $result['blockquote'] = $arr['0']->blockquote;
            $result['content_after_blockquote'] = $arr['0']->content_after_blockquote;
            $result['id'] = $arr['0']->id;
        } else {
            $result['title'] = '';
            $result['image'] = '';
            $result['content_before_blockquote'] = '';
            $result['blockquote'] = "";
            $result['content_after_blockquote'] = '';
            $result['id'] = 0;
        }
        return view('Admin.ManageBlog', $result);
    }

    public function manage_blog_process(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $request->post('id'),
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($request->post('id') > 0) {
            $model = Blog::find($request->post('id'));
            $msg = "Blog updated";
        } else {
            $model = new Blog();
            $msg = "Blog inserted";
        }

        if ($request->hasfile('image')) {

            if ($request->post('id') > 0) {
                $arrImage = DB::table('blogs')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/public/media/blog/' . $arrImage[0]->image)) {
                    Storage::delete('/public/media/blog/' . $arrImage[0]->image);
                }
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('media/blog', $image, $image_name);
            $model->image = $image_name;
        }
        $model->title  = $request->post('title');
        $model->content_before_blockquote = $request->post('content_before_blockquote');
        $model->blockquote = $request->post('blockquote');
        $model->content_after_blockquote = $request->post('content_after_blockquote');
        $model->postedBy = "ADMIN";
        $model->addedOn = date('Y-m-d');
        $model->status = 1;
        $model->save();


        $request->session()->flash('successMessage', $msg);
        return redirect('admin/blog');
    }

    public function delete(Request $request, $id)
    {
        $model = Blog::find($id);
        $model->delete();
        $request->session()->flash('successMessage', 'Blog deleted');
        return redirect('admin/blog');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Blog::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('successMessage', 'Blog status updated');
        return redirect('admin/blog');
    }
}
