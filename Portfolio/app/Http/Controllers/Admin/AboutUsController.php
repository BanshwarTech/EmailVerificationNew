<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutUs;
use App\Models\Admin\Education;
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

    public function experience(Request $request, $id = null)
    {
        $arr = Experience::where('id', $id)->first();

        if ($arr) {
            $result['job_title'] = $arr->job_title;
            $result['company_name'] = $arr->company_name;
            $result['location'] = $arr->location;
            $result['start_date'] = $arr->start_date;
            $result['end_date'] = $arr->end_date;
            $result['description'] = $arr->description;
            $result['id'] = $arr->id;
        } else {
            $result['job_title'] = '';
            $result['company_name'] = '';
            $result['location'] = '';
            $result['start_date'] = '';
            $result['end_date'] = '';
            $result['description'] = '';
            $result['id'] = 0;
        }

        $result['experiences'] = Experience::paginate(10);
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

            if ($request->post('id') > 0) {
                $experience = experience::find($request->post('id'));
                $msg = "Record updated successfully.";
            } else {
                $experience = new experience();
                $msg = "Record added successfully.";
            }

            $experience->job_title = $request->post('job_title');
            $experience->company_name = $request->post('company_name');
            $experience->location = $request->post('location');
            $experience->start_date = $request->post('start_date');
            $experience->end_date = $request->post('end_date');
            $experience->description = $request->post('description');
            $experience->save();
            return redirect()->route('admin.about.experience')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.about.experience')->with('error', $e->getMessage());
        }
    }

    public function delExp($id)
    {
        $exp = experience::findOrFail($id);
        $exp->delete(); // Soft delete (moves to trash)

        return redirect()->route('admin.about.experience')->with('success', 'deleted successfully...');
    }
    public function tech_skill(Request $request, $id = null)
    {
        $arr = technical_skill::where('id', $id)->first();

        if ($arr) {
            $result['skill_name'] = $arr->skill_name;
            $result['proficiency'] = $arr->proficiency;
            $result['experience_years'] = $arr->experience_years;
            $result['category'] = $arr->category;
            $result['id'] = $arr->id;
        } else {
            $result['skill_name'] = '';
            $result['proficiency'] = '';
            $result['experience_years'] = '';
            $result['category'] = '';
            $result['id'] = 0;
        }

        $result['tech_skill'] = technical_skill::paginate(10);
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


            if ($request->post('id') > 0) {
                $tech_skill = technical_skill::find($request->post('id'));
                $msg = 'Record updated successfully.';
            } else {
                $tech_skill = new technical_skill();
                $msg = 'Record added successfully.';
            }

            $tech_skill->skill_name = $request->post('skill_name');
            $tech_skill->proficiency = $request->post('proficiency');
            $tech_skill->experience_years = $request->post('experience_years');
            $tech_skill->category = $request->post('category');
            $tech_skill->save();
            return redirect()->route('admin.about.tech.skill')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.about.tech.skill')->with('error', $e->getMessage());
        }
    }

    public function delTechSkill($id)
    {
        $skill = technical_skill::findOrFail($id);
        $skill->delete(); // Soft delete (moves to trash)

        return redirect()->route('admin.about.tech.skill')->with('success', 'deleted successfully...');
    }
    public function offer(Request $request, $id = null)
    {
        $arr = service::where('id', $id)->first();

        if ($arr) {
            $result['title'] = $arr->title;
            $result['description'] = $arr->description;
            $result['price'] = $arr->price;
            $result['status'] = $arr->status;
            $result['id'] = $arr->id;
        } else {
            $result['title'] = '';
            $result['description'] = '';
            $result['price'] = '';
            $result['status'] = '';
            $result['id'] = 0;
        }
        $result['offer'] = service::paginate(10);
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
            if ($request->post('id') > 0) {
                $service = service::find($request->post('id'));
                $msg = "Record updated successfully.";
            } else {
                $service = new service();
                $msg = "Record added successfully.";
            }


            $service->title = $request->post('title');
            $service->description = $request->post('description');
            $service->price = $request->post('price');
            $service->status = $request->post('status');
            $service->save();
            return redirect()->route('admin.about.offer')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.about.offer')->with('error', $e->getMessage());
        }
    }

    public function delOffer($id)
    {
        $offer = service::findOrFail($id);
        $offer->delete(); // Soft delete (moves to trash)

        return redirect()->route('admin.about.offer')->with('success', 'deleted successfully...');
    }
    public function interests(Request $request, $id = null)
    {


        $arr = PersonalInterest::where('id', $id)->first();

        if ($arr) {
            $result['interest_name'] = $arr->interest_name;
            $result['description'] = $arr->description;
            $result['id'] = $arr->id;
        } else {
            $result['interest_name'] = '';
            $result['description'] = '';
            $result['id'] = 0;
        }
        $result['hobbies'] = PersonalInterest::paginate(10);

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

            if ($request->post('id') > 0) {
            } else {
                $perIn = new PersonalInterest();
                $msg = 'Record added successfully.';
            }
            $perIn->interest_name = $request->post('interest_name');
            $perIn->description = $request->post('description');
            $perIn->save();
            return redirect()->route('admin.about.interests')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.about.interests')->with('error', $e->getMessage());
        }
    }

    public function delInterests($id)
    {
        $intrest = PersonalInterest::findOrFail($id);
        $intrest->delete(); // Soft delete (moves to trash)

        return redirect()->route('admin.about.interests')->with('success', 'deleted successfully...');
    }

    public function education(Request $request, $id = null)
    {
        $arr = Education::where('id', $id)->first();

        if ($arr) {
            $result['degree'] = $arr->degree;
            $result['institution'] = $arr->institution;
            $result['location'] = $arr->location;
            $result['duration'] = $arr->duration;
            $result['details'] = $arr->details;
            $result['division'] = $arr->division;
            $result['id'] = $arr->id;
        } else {
            $result['degree'] = '';
            $result['institution'] = '';
            $result['location'] = '';
            $result['duration'] = '';
            $result['details'] = '';
            $result['division'] = '';
            $result['id'] = 0;
        }

        $result['education'] = Education::paginate(10);
        return view('admin.education', $result);
    }

    public function manage_education(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'degree' => 'required',
                'institution' => 'required',
                'location' => 'required',
                'duration' => 'required',
                'division' => 'required',
            ];

            // Custom error messages
            $messages = [
                'degree.required' => 'Please enter degree!',
                'institution.required' => 'Please enter institution!',
                'location.required' => 'Please enter location!',
                'duration.required' => 'Please enter duration!',
                'division.required' => "Please enter division!"
            ];

            // Validate request
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->post('id') > 0) {
                $education = Education::find($request->post('id'));
                $msg = "Record Updated successfully....";
            } else {
                $education = new Education();
                $msg = 'Record added successfully....';
            }


            $education->degree = $request->post('degree');
            $education->institution = $request->post('institution');
            $education->location = $request->post('location');
            $education->duration = $request->post('duration');
            $education->details = $request->post('details');
            $education->division = $request->post('division');
            $education->save();

            return redirect()->route('admin.about.education')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->route('admin.about.education')->with('error', $e->getMessage());
        }
    }
}
