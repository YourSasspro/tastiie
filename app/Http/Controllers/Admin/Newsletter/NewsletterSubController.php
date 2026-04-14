<?php

namespace App\Http\Controllers\Admin\Newsletter;

use App\Http\Controllers\Controller;
use App\Mail\SendNewsletter;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterSubController extends Controller
{

    public function index()
    {
        $subscribedEmails = NewsletterSubscription::where('is_subscribed', true)->pluck('email', 'name');
        return view('admin.newsletter.index', compact('subscribedEmails'));
    }

    public function viewEmail()
    {
        $emails = NewsletterSubscription::all();
        return view('admin.newsletter.view', compact('emails'));
    }

    public function destroy($id)
    {
        $email = NewsletterSubscription::find($id);
        $email->delete();
        return redirect()->route('view.email')
            ->with([
                'message' => trans('gen.deleted_successfully', ['attribute' => trans('gen.email')]),
                'type' => 'success'
            ]);
    }

    public function subscribe(Request $request)
    {
        // Validate email with custom error message for unique rule
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string'
        ], [
            'email.unique' => 'The email address is already subscribed.',
            'name.required' => 'Name is required.'
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the email is already exist and its is_subscribed is false
        $alreadySub = NewsletterSubscription::where('email', $request->email)
            ->where('is_subscribed', false)
            ->first();

        if ($alreadySub) {
            $alreadySub->update([
                'is_subscribed' => true,
            ]);
        } else {
            NewsletterSubscription::create([
                'email' => $request->email,
                'is_subscribed' => true,
                'name' => $request->name
            ]);
        }

        return back()->with([
            'message' => trans('gen.subscribe_success_message'),
            'type' => 'success'
        ]);
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required'
        ]);
        $emailArray = explode(',', $request->email);
        foreach ($emailArray as $email) {
            $email = trim($email);
            // Send email to the subscriber
            Mail::to($email)->queue(new SendNewsletter($request->subject, $request->content, $email));
        }

        return back()->with([
            'message' => trans('gen.newsletter_email_send_successfully'),
            'type' => 'success'
        ]);
    }

    public function unsubscribeEmail($email)
    {
        $email = NewsletterSubscription::where('email', $email)->first();
        if ($email) {
            $email->update([
                'is_subscribed' => false
            ]);
            return view('admin.newsletter.unsub');
        }
        return redirect()->route('home')
            ->with('error', 'Email not found.');
    }
}
