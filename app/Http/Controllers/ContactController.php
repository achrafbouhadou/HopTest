<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return Inertia::render('ContactList', [
            'contacts' => $contacts
        ]);
    }
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        $validated['email'] = $validated['email'];
        $validated['first_name'] = $validated['first_name'];
        $validated['last_name'] = $validated['last_name'];
        $validated['company'] = $validated['company'];
        $validated['city'] = $validated['city'];

        $duplicateContact = Contact::where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'])
            ->first();

        if ($duplicateContact) {
            return redirect()->back()->withErrors(['message' => 'Un contact avec le même prénom et nom existe déjà.']);
        }

        $duplicateCompany = Contact::where('company', $validated['company'])->first();

        if ($duplicateCompany) {
            return redirect()->back()->withErrors(['message' => 'Une entreprise avec le même nom existe déjà.']);
        }

        Contact::create($validated);
        return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès.');
    }
    public function update(ContactRequest $request, Contact $contact)
    {
        $validated = $request->validated();
        $validated['email'] = $validated['email'];
        $validated['first_name'] = $validated['first_name'];
        $validated['last_name'] = $validated['last_name'];
        $validated['company'] = $validated['company'];
        $validated['city'] = $validated['city'];

        $duplicateContact = Contact::where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'])
            ->where('id', '!=', $contact->id)
            ->first();

        if ($duplicateContact) {
            return redirect()->back()->withErrors(['message' => 'Un contact avec le même prénom et nom existe déjà.']);
        }

        $duplicateCompany = Contact::where('company', $validated['company'])
            ->where('id', '!=', $contact->id)
            ->first();

        if ($duplicateCompany) {
            return redirect()->back()->withErrors(['message' => 'Une entreprise avec le même nom existe déjà.']);
        }

        $contact->update($validated);
        return redirect()->route('contacts.index')->with('success', 'Contact mis à jour avec succès.');
    }
    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès.');
    }

}
