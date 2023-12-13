<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitForm(Request $request)
{
      $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Save the form data using the Contact model
    $contact = Contact::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
    ]);

    // Optionally, you can redirect the user to a thank you page
    return redirect()->back()->with('message', 'Thanks for your message! We will get back to you soon!');
}

public function showForm()
{
    return view('customer.contact');
}


}