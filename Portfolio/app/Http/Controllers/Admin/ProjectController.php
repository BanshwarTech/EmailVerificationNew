<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $result['project'] = Project::paginate(10);
        return view('admin.project', $result);
    }

    public function manage_project(Request $request, $id = null)
    {
        $arr = Project::where('id', $id)->first();

        if ($arr) {
            $result['title'] = $arr->title;
            $result['description'] = $arr->description;
            $result['image'] = $arr->image;
            $result['link'] = $arr->link;
            $result['github_link'] = $arr->github_link;
            $result['completion_date'] = $arr->completion_date;
            $result['id'] = $arr->id;
        } else {
            $result['title'] = '';
            $result['description'] = '';
            $result['image'] = '';
            $result['link'] = '';
            $result['github_link'] = '';
            $result['completion_date'] = '';
            $result['id'] = 0;
        }
        return view('admin.manage_project', $result);
    }

    public function process_manage_projects(Request $request)
    {
        try {
            // Image validation rule (optional for update)
            $image_validation = "nullable|mimes:jpeg,jpg,png,svg,gif|max:2048";
            // Validation rules
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'image' =>    $image_validation
            ];

            // Custom error messages
            $messages = [
                'title.required' => 'Please enter title!',
                'description.required' => 'Please enter description!',
                'image.mimes' => 'Only JPEG, JPG, PNG, SVG, and GIF formats are allowed!',
                'image.max' => 'The image size should not exceed 2MB!',
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->post('id') > 0) {
                $project = Project::find($request->post('id'));
                $msg = "Record Updated successfully....";
            } else {
                $project = new Project();
                $msg = 'Record added successfully....';
            }


            $project->title = $request->post('title');
            $project->description = $request->post('description');
            // Handle profile image upload
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($project->image && Storage::exists('public/uploads/project$project/' . $project->image)) {
                    Storage::delete('public/uploads/project$project/' . $project->image);
                }

                // Upload new image
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('uploads/project/', $image, $image_name);

                // Save new file name
                $project->image = $image_name;
            }

            $project->link = $request->post('link');
            $project->github_link = $request->post('github_link');
            $project->completion_date = $request->post('completion_date');
            $project->save();

            return redirect()->route('admin.project.index')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.project.manage')->with('error', $e->getMessage());
        }
    }

    public function delProject($id)
    {
        $account = Project::findOrFail($id);
        $account->delete();
        return redirect()->route('admin.project.index')->with('success', 'deleted successfully.....');
    }
}
