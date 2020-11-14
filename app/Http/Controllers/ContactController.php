<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Contact;
use Carbon\Carbon;
// use Storage;

class ContactController extends Controller
{
    public function contact()
    {
      return view('contact');
    }

     function contactinfo(Request $request)
    {

      if ($request->hasFile('uplode_file')) {
        $list_id = Contact::insertGetId($request->except('_token') +[
          'created_at' => Carbon::now()
        ]);
        $uplode_file = $request->file('uplode_file');
        $path = $request->file('uplode_file')->storeAs(
      'contact_uplode', $list_id.'.'.$uplode_file->getClientOriginalExtension()
      );
        Contact::find($list_id)-> update([
          'uplode_file' => $list_id.'.'.$uplode_file->getClientOriginalExtension()
        ]);
      }
      else {
        Contact::insertGetId($request->except('_token') +[
          'uplode_file' => "No File",
          'created_at' => Carbon::now()
        ]);
      }
      return back()->with('status', 'Send Email  successfully!');
    }

     function contactmessages()
    {
      $contacts = Contact::all();
      return view('contact.index', [
        'contacts' => $contacts,
      ]);
    }
     function contactdownload($file_name)
      {
        echo $file_name;
        return Storage::download("contact_uplode/".$file_name);
      }
}
