<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
        return view('admin.contacts.index', compact('contacts'));
    }


    public function store(Request $request)
    {
        // dd('here');
        $request->validate([
            'name'=>'required|string|min:5|max:100',
            'email'=>'required|email',
            'message'=> 'required|string|min:5|max:100'
        ]);
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ]);
         session()->flash('success', 'Message Has Been Sent Successfully');
         return redirect(route('welcome'));
    }

}
