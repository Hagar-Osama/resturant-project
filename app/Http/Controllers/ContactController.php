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
        $contact = Contact::get();
        return view('admin.contacts.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:5|max:100',
            'email'=>'required|email',
            'message'=> 'required|string|min:5|max:100'
        ]);
        Contact::create($request->except('_token'));
        return redirect()->route('admin.contacts.index')->with('success', 'Message Has Been Stored Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findorfail($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($contact = Contact::find($id)) {
            $request->validate([
                'name'=>'required|string|min:5|max:100',
                'email'=>'required|email',
                'message'=> 'required|string|min:5|max:100'
            ]);
            $contact->update($request->except(['_token']));
            return redirect()->route('admin.contacts.index')->with('success', 'Message Has Been Updated Successfully');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($contact = Contact::find($id)) {
            $contact->delete();
            return redirect()->route('admin.contacts.index')->with('success', 'Message Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
