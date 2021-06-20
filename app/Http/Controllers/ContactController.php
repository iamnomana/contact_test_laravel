<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {

        // dd("j");
        $contacts = DB::table('contacts')->get();

        return view('contact', compact('contacts'));
    }

    public function edit_page($id = null)
    {
        if ($id) {
            $data = DB::table('contacts')
                ->where('id', $id)
                ->first();
        }
        return view('edit')->with('contact', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:6',
            'phone' => 'required|min:9'
        ]);


        DB::beginTransaction();

        $contact = new Contact();
        $contact->fullname = $request->fullname;
        $contact->phone = $request->phone;
        $contact->save();

        DB::commit();

        return redirect()->route('contacts')->with('success', 'Contact created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required'
        ]);


        DB::beginTransaction();

        $con = Contact::find($id);
        $con->fullname = $request->fullname;
        $con->phone = $request->phone;
        $con->save();

        DB::commit();

        return redirect()->route('contacts')->with('success', 'Contact updated successfully.');
    }


    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('contacts')->with('success', 'Contact deleted successfully.');
    }
}
