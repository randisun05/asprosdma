<?php

namespace App\Http\Controllers\Admin;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\RegistrationGroup;
use App\Imports\RegistrationImport;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailAprrove;
use App\Mail\SendEmailConfirm;
use App\Mail\SendEmailReject;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = Registration::when(request()->q, function($registers) {
            $registers = $registers->where('name', 'like', '%'. request()->q . '%');
        })->latest()->paginate(10);

        //append query string to pagination links
        $registers->appends(['q' => request()->q]);
    
        //render with inertia
        return inertia('Admin/Registration/Index', [
            'registers' => $registers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Admin/Registration/Create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request including file validation
      $validatedData = $request->validate([
        'nip' => 'required|string',
        'name' => 'required|string',
        'email' => 'required|string',
        'contact' => 'required|string',
        'agency' => 'required|string',
        'position' => 'required|string',
        'level' => 'required|string',
        'document_jab' => 'required|file|mimes:pdf|max:2048', // Ensure 'document_jab' is a valid file
        'paid' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    // Store the file using Laravel's file storage system
    $document_jab = $request->file('document_jab')->storePublicly('/documents');
       // Store the file using Laravel's file storage system
       $paid = $request->file('paid')->storePublicly('/images');

    // Create registration
    $registration = Registration::create(array_merge($validatedData, ['document_jab' => $document_jab, 'paid' => $paid]));
    $token = $registration->id;

     //redirect
     return redirect()->route('admin.registration.index');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $register = Registration::findOrFail($id);

        //render with inertia
       return inertia('Admin/Registration/Show', [
        'register' => $register,
    ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'contact' => 'required|string',
            'agency' => 'required|string',
            'position' => 'required|string',
            'level' => 'required|string',
            'document_jab' => 'required|string',
            'paid' => 'required|string',
       ]);

       //update
       Registration::where('id', $id)->update([
        'name' => $request->nip,
        'name' => $request->name,
        'email' => $request->email,
        'contact' => $request->contact,
        'agency' => $request->agency,
        'position' => $request->position,
        'level' => $request->level,
        'document_jab' => $request->document_jab,
       ]);

       //redirect
       return redirect()->route('admin.registration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get 
        $register = Registration::findOrFail($id);

        //delete 
        $register->delete();

        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function paid($id)
    {
        //get 
        Registration::where('id', $id)->update([
            'status' => "paid"
        ]);
        
        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function approve($id)
    {
        //get register
        $register = Registration::findOrFail($id);
        
         //email
         Mail::to($register['email'])->send(new SendEmailAprrove($register));

        Registration::where('id', $id)->update([
            'status' => "approved"
        ]);

       
        
        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function reject($id)
    {

        $register = Registration::findOrFail($id);

        Mail::to($register['email'])->send(new SendEmailReject($register));

        Registration::where('id', $id)->update([
            'status' => "rejected"
        ]);

            //email
            // Mail::to($data['email'])->send(new SendEmailReject($data));
        
        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function confirm($id)
    {

        $register = Registration::findOrFail($id);

        Mail::to($register['email'])->send(new SendEmailConfirm($register));


        Registration::where('id', $id)->update([
            'status' => "confirm"
        ]);

        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function import()
    {
        return inertia('Admin/Registration/Import');
     
    }

    public function importStore(Request $request)
    {

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        //import data
        Excel::import(new RegistrationImport(), $request->file('file'));
        
        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function group()
    {

        $registers = RegistrationGroup::when(request()->q, function($registers) {
            $registers = $registers->where('agency', 'like', '%'. request()->q . '%');
        })->latest()->paginate(10);

        //append query string to pagination links
        $registers->appends(['q' => request()->q]);
    
        //render with inertia
        return inertia('Admin/Registration/Group', [
            'registers' => $registers,
        ]);
     
    }

    public function doneGroup($id)
    {
        //get participant
        // $register = Registration::findOrFail($id);
        // return $register;   
   
        RegistrationGroup::where('id', $id)->update([
            'status' => "Done"
        ]);
        
        //redirect
        return redirect()->route('admin.registration.group');
    }

    public function rejectGroup($id)
    {
        RegistrationGroup::where('id', $id)->update([
            'status' => "rejected"
        ]);
        
        //redirect
        return redirect()->route('admin.registration.group');
    }

    public function confirmGroup($id)
    {
        RegistrationGroup::where('id', $id)->update([
            'status' => "confirm"
        ]);
        
        //redirect
        return redirect()->route('admin.registration.group');
    }

}
