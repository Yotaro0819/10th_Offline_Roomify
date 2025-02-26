<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        $all_contacts = $this->contact->latest()->paginate(5);

        return view('admin.contact.index')
        ->with('all_contacts', $all_contacts);
    }

    public function store(Request $request)
    {
        $request->validate([
        
        'name' => 'required|string|max:50',
        'email' => 'required|string|max:50',
        'message' => 'required|string|max:1000',
        ]);

        $this->contact->name = $request->name;
        $this->contact->email = $request->email;
        $this->contact->message = $request->message;
        $this->contact->is_replied = false;
        $this->contact->is_read = false;
        $this->contact->save();
        session()->flash('success', 'Submission successful!');
        
        return redirect()->back();
    }

        public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if (!$contact->is_read) {
            $contact->is_read = true;
            $contact->save();
        }
        return view('admin.contact.show', compact('contact'));
    }

    public function replied($id) {
        $contact = Contact::findOrFail($id);
        if (!$contact->is_replied) {
            $contact->is_replied = true;
            $contact->save();
        }
        session()->flash('success', 'Submission successful!');
        return redirect()->route('admin.contact.show', $contact->id );
    }

}
