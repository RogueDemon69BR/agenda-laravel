<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        /** @var \App\Models\User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        $contacts = $user->contacts()
            ->when($query, function ($qbuilder) use ($query) {
                $qbuilder->where('name', 'like', "%$query%")
                         ->orWhere('email', 'like', "%$query%");
            })
            ->get();

        return view('contacts.index', compact('contacts', 'query'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   => ['required', 'regex:/^\(\d{2}\) \d{5}-\d{4}$/'],
        'address' => 'nullable',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    
    $exists = $user->contacts()
        ->where('email', $request->email)
        ->orWhere('phone', $request->phone)
        ->exists();

    if ($exists) {
        return back()->withInput()
                     ->withErrors(['email' => 'Contato com este e-mail ou telefone já existe.']);
    }

    $user->contacts()->create($request->all());

    return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
}

    public function show(Contact $contact)
    {
        $this->authorizeContact($contact);

        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $this->authorizeContact($contact);

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
{
    $this->authorizeContact($contact);

    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   => ['required', 'regex:/^\(\d{2}\) \d{5}-\d{4}$/'],
        'address' => 'nullable',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $contact->update($request->all());

    return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
}

public function destroy(Contact $contact)
{
    $this->authorizeContact($contact);

        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato removido com sucesso!');
    }

    private function authorizeContact(Contact $contact)
    {
        if ($contact->user_id !== Auth::user()->id) {
            abort(403, 'Acesso negado.');
        }
    }
}
