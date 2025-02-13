<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutUs;
use App\Models\Admin\experience;
use App\Models\Admin\PersonalInterest;
use App\Models\Admin\service;
use App\Models\Admin\technical_skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function about()
    {
        $result['about'] = DB::table('about_us')->get();
        return view('admin.about', $result);
    }

    public function manage_about(Request $request)
    {

        try {
            $id = $request->post('id');
            echo $id;
            $about = AboutUs::find($id);
            if (!$about) {
                return redirect()->back()->with('error', 'Record not found!');
            }
            // Image validation rule (optional for update)
            $image_validation = "nullable|mimes:jpeg,jpg,png,svg,gif|max:2048";

            // Validation rules
            $rules = [
                'name' => 'required',
                'role' => 'required',
                'experience' => 'required',
                'profile' => $image_validation,
                'tagline' => 'required'
            ];

            // Custom error messages
            $messages = [
                'name.required' => 'Please enter your name!',
                'role.required' => 'Please enter your role!',
                'experience.required' => 'Please enter your experience!',
                'profile.mimes' => 'Only JPEG, JPG, PNG, SVG, and GIF formats are allowed!',
                'profile.max' => 'The image size should not exceed 2MB!',
                'tagline.required' => 'Please enter a tagline!'
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Create a new AboutUs entry

            $about->name = $request->post('name');
            $about->role = $request->post('role');
            $about->experience = $request->post('experience');
            $about->tagline = $request->post('tagline');

            // Handle profile image upload
            if ($request->hasFile('profile')) {
                // Delete old image if it exists
                if ($about->profile_image && Storage::exists('public/uploads/about/' . $about->profile_image)) {
                    Storage::delete('public/uploads/about/' . $about->profile_image);
                }

                // Upload new image
                $image = $request->file('profile');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('uploads/about/', $image, $image_name);

                // Save new file name
                $about->profile_image = $image_name;
            }

            // Save the record
            $about->save();

            return redirect()->route('admin.about')->with('success', 'Record Updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about')->with('error', $e->getMessage());
        }
    }

    public function experience()
    {
        $result['experiences'] = DB::table('experiences')->get();
        return view('admin.experiences', $result);
    }

    public function  manage_experience(request $request)
    {
        try {
            // Validation rules
            $rules = [
                'job_title' => 'required',
                'company_name' => 'required',
                'start_date' => 'required'
            ];

            // Custom error messages
            $messages = [
                'job_title.required' => 'Please enter job title!',
                'company_name.required' => 'Please enter company name!',
                'start_date.required' => 'Please enter start date!'
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $experience = new experience();
            $experience->job_title = $request->post('job_title');
            $experience->company_name = $request->post('company_name');
            $experience->location = $request->post('location');
            $experience->start_date = $request->post('start_date');
            $experience->end_date = $request->post('end_date');
            $experience->description = $request->post('description');
            $experience->save();
            return redirect()->route('admin.about')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about.experience')->with('error', $e->getMessage());
        }
    }
    public function tech_skill()
    {
        $result['tech_skill'] = DB::table('technical_skills')->get();
        return view('admin.technicalSkill', $result);
    }

    public function manage_tech_skill(request $request)
    {
        try {
            // Validation rules
            $rules = [
                'skill_name' => 'required',
                'proficiency' => 'required'
            ];

            // Custom error messages
            $messages = [
                'skill_name.required' => 'Please enter skill name!',
                'proficiency.required' => 'Please select proficiency !'
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $tech_skill = new technical_skill();
            $tech_skill->skill_name = $request->post('skill_name');
            $tech_skill->proficiency = $request->post('proficiency');
            $tech_skill->experience_years = $request->post('experience_years');
            $tech_skill->category = $request->post('category');
            $tech_skill->save();
            return redirect()->route('admin.about.tech.skill')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about.tech.skill')->with('error', $e->getMessage());
        }
    }
    public function offer()
    {
        $result['offer'] = DB::table('services')->get();
        return view('admin.offer', $result);
    }

    public function manage_offer(request $request)
    {
        try {
            // Validation rules
            $rules = [
                'title' => 'required'
            ];

            // Custom error messages
            $messages = [
                'title.required' => 'Please enter title!',
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $service = new service();
            $service->title = $request->post('title');
            $service->description = $request->post('description');
            $service->price = $request->post('price');
            $service->status = $request->post('status');
            $service->save();
            return redirect()->route('admin.about.offer')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about.offer')->with('error', $e->getMessage());
        }
    }
    public function interests()
    {
        $result['hobbies'] = DB::table('personal_interests')->get();

        return view('admin.hobbies', $result);
    }
    public function manage_interests(request $request)
    {
        try {
            // Validation rules
            $rules = [
                'interest_name' => 'required'
            ];

            // Custom error messages
            $messages = [
                'interest_name.required' => 'Please enter interest name!',
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $perIn = new PersonalInterest();
            $perIn->interest_name = $request->post('interest_name');
            $perIn->description = $request->post('description');
            $perIn->save();
            return redirect()->route('admin.about.interests')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.about.interests')->with('error', $e->getMessage());
        }
    }
}
