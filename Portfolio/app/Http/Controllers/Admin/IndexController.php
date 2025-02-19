<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Accounts;
use App\Models\Admin\home;
use App\Models\Admin\SocialAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function getHomeData()
    {
        $result['home'] = DB::table('homes')->get();
        $result['accounts'] = DB::table('accounts')->get();
        $result['social'] = DB::table('accounts')->get();
        return view('admin.homedata', $result);
    }

    public function updateHomeData(request $request)
    {
        // Find the existing record in the homes table
        $id = $request->post('id');
        $home = home::find($id);

        if (!$home) {
            return redirect()->back()->with('error', 'Record not found!');
        }

        // Image validation rule (optional for update)
        $image_validation = "nullable|mimes:jpeg,jpg,png,svg,gif,webp|max:2048";

        // Validation rules
        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'profile' => $image_validation
        ];

        // Custom error messages
        $messages = [
            'title.required' => 'Please enter title!',
            'subtitle.required' => 'Please enter subtitle!',
            'description.required' => 'Please enter description!',
            'profile.mimes' => 'Only JPEG, JPG, PNG, SVG, and GIF formats are allowed!',
            'profile.max' => 'The image size should not exceed 2MB!',
        ];

        // Validate request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update fields
        $home->title = $request->post('title');
        $home->subtitle = $request->post('subtitle');
        $home->description = $request->post('description');
        $home->is_del = 0;

        // Handle profile image upload (if provided)
        // Handle profile image upload (if provided)
        if ($request->hasFile('profile')) {
            // Delete old image if it exists
            if ($home->image && Storage::exists('public/uploads/' . $home->image)) {
                Storage::delete('public/uploads/' . $home->image);
            }

            // Upload new image to storage/app/public/uploads

            $image = $request->file('profile');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('uploads/', $image, $image_name);

            // Save new file name
            $home->image = $image_name;
        }


        // Save updated data
        $home->save();

        return redirect()->back()->with('success', 'Record updated successfully!');
    }
    public function getConnection()
    {
        $result['accounts'] = DB::table('accounts')->get();
        return view('admin.connection', $result);
    }

    // define account connection 
    public function account(request $request, $id = null)
    {
        $arr = Accounts::where('id', $id)->first();

        if ($arr) {
            $result['account_related_image'] = $arr->account_related_image;
            $result['account_name'] = $arr->account_name;
            $result['account_id'] = $arr->account_id;
            $result['account_link'] = $arr->account_link;
            $result['account_type'] = $arr->account_type;
            $result['id'] = $arr->id;
        } else {
            $result['account_related_image'] = '';
            $result['account_name'] = '';
            $result['account_id'] = '';
            $result['account_link'] = '';
            $result['account_type'] = '';
            $result['id'] = 0;
        }

        $result['account'] = Accounts::paginate(10);
        return view('admin.accounts', $result);
    }

    public function addAccount(request $request, $id = null)
    {
        try {
            // Image validation rule (optional for update)
            $image_validation = "nullable|mimes:jpeg,jpg,png,svg,gif,webp|max:2048";

            // Validation rules
            $rules = [
                'account_name' => 'required',
                'account_id' => 'required',
                'account_type' => 'required',
                'account_related_image' => $image_validation
            ];

            // Custom error messages
            $messages = [
                'account_name.required' => 'Please enter account name!',
                'account_id.required' => 'Please enter account id!',
                'account_type.required' => 'Please select account type!',
                'account_related_image.mimes' => 'Only JPEG, JPG, PNG, SVG, and GIF formats are allowed!',
                'account_related_image.max' => 'The image size should not exceed 2MB!',
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->post('id') > 0) {
                $account = Accounts::find($request->post('id'));
                $msg = "Record  Updated successfully....";
            } else {
                // Update fields
                $account = Accounts::create();
                $msg = 'Record added  successfully.....';
            }


            $account->account_name = $request->post('account_name');
            $account->account_id = $request->post('account_id');
            $account->account_type = $request->post('account_type');
            $account->account_link = $request->post('account_link');
            $account->is_del = false;
            // Handle profile image upload (if provided)
            // Handle profile image upload (if provided)
            if ($request->hasFile('account_related_image')) {
                // Delete old image if it exists
                if ($account->account_related_image && Storage::exists('public/uploads/account/' . $account->account_related_image)) {
                    Storage::delete('public/uploads/account/' . $account->image);
                }
                // Upload new image to storage/app/public/uploads
                $image = $request->file('account_related_image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('uploads/account/', $image, $image_name);

                // Save new file name
                $account->account_related_image = $image_name;
            }


            // Save updated data
            $account->save();

            return redirect()->route('admin.account')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.account')->with('error', $e->getMessage());
        }
    }

    public function delAccount($id)
    {
        $account = Accounts::findOrFail($id);
        $account->delete();
        return redirect()->route('admin.account')->with('success', 'deleted successfully.....');
    }
}
