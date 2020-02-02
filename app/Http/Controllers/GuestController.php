<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Inquiry;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class GuestController extends Controller
{
    public function newEnquerySubmit(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $inquiry->id]);
        }
        return redirect()->back()->with('message', 'Your inquiry has been submitted. We will contact you within short time.');
    }
}
