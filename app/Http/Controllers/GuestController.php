<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Employer;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\StoreInquiryRequest;
use App\Inquiry;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Models\Media;

class GuestController extends Controller
{

    public function inquiryForm(Request $request, Agent $agent_id)
    {
        return view('frontend.inquiry',compact('agent_id'));
    }

    public function newEnquerySubmit(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $inquiry->id]);
        }
        return redirect()->back()->with('message', 'Your inquiry has been submitted. We will contact you within short time.');
    }

    public function storeOrganization(Request $request)
    {

        if ($request->input('type') == 'agent') {
            $agent = Agent::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);



            $agent->location()->create([
                'address' => $request->input('address'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
            ]);
            return redirect()->back()->with('message', 'The Sending Organization has been added successfully!');
        }


        if ($request->input('type') == 'employer') {
            $employer = Employer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            $employer->location()->create([
                'address' => $request->input('address'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
            ]);
            return redirect()->back()->with('message', 'The Employer has been added successfully!');
        }
        return redirect()->back()->with('message', 'Sorry! No, Data has been added');
    }
}
