<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactDetails;
use App\Models\Admin\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $result['contact'] = DB::table('contact_details')->get();
        return view('admin.contact_details', $result);
    }
    public function updateContactDetails(Request $request, $id)
    {

        $contact = ContactDetails::find($id);
        if (!$contact) {
            return redirect()->back()->with('error', 'Record not found!');
        }
        // Image validation rule (optional for update)
        $image_validation = "nullable|mimes:jpeg,jpg,png,svg,gif|max:2048";

        // Validation rules
        $rules = [
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];

        // Custom error messages
        $messages = [
            'name.required' => 'Please enter your email!',
            'role.required' => 'Please enter your phone number!',
            'address.required' => 'Please enter your address!'
        ];

        // Validate request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact->email = $request->post('email');
        $contact->phone = $request->post('phone');
        $contact->address = $request->post('address');
        $contact->save();
        return redirect()->route('admin.contact.index')->with('success', 'Record Updated successfully.');
    }


    public function message()
    {
        $result['contact_messsage'] = DB::table('contact_messages')
            ->select(
                'id',
                'name',
                'email',
                'subject',
                'message',
                'created_at',
                DB::raw('TIMESTAMPDIFF(MINUTE, created_at, NOW()) AS minutes_ago')
            )->get();

        return view('admin.contact_message', $result);
    }

    public function readMessage($id)
    {
        $message = ContactMessage::find($id);

        if (!$message) {
            return redirect()->route('admin.contact.index')->with('error', 'Message not found.');
        }

        return view('admin.read-message', compact('message'));
    }
}
