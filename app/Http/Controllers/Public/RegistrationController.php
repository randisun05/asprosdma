<?php

namespace App\Http\Controllers\Public;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\RegistrationGroup;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailRegistration;
use Illuminate\Support\Facades\Mail;
use PHPUnit\TextUI\XmlConfiguration\Group;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $token = $request->session()->get('token');
        $register = $request->session()->get('registration');

        return inertia('Public/Registration/Success', [
            'token' => $token,
            'register' => $register
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Public/Registration/Registration', [
           
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
    ]);
    
    // Store the file using Laravel's file storage system
    $document_jab = $request->file('document_jab')->storePublicly('/documents');

    // Create registration
    $registration = Registration::create(array_merge($validatedData, ['document_jab' => $document_jab]));
    $token = $registration->id;

    Mail::to($validatedData['email'])->send(new SendEmailRegistration($registration));

     //redirect
     return redirect()->route('registration.success')->with([
        'token' => $token,
        'registration' => $registration
    ]);
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

        return inertia('Public/Registration/Show', [
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
        $register = Registration::findOrFail($id);

        return inertia('Public/Registration/Edit', [
           'register' => $register,
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function paid(Request $request, $id)
    {
        // Validate request including file validation
    $request->validate([
        'paid' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust validation rule for file
    ]);
    
    // Store the file using Laravel's file storage system
    $paid = $request->file('paid')->storePublicly('/images');

    // Create registration
    Registration::where('id', $id)->update(['paid' => $paid, 'status' => "paid"]);

     //redirect
     return redirect()->route('registration');

    }

    public function group()
    {
        return inertia('Public/Registration/Group', [
           
         ]);
    }

    public function groupStore(Request $request)
    {
        // Validate request including file validation
      $validatedData = $request->validate([
        'agency' => 'required|string',
        'name' => 'required|string',
        'email' => 'required|string',
        'contact' => 'required|string',
        'total' => 'required|string',
        'file' => 'required|file|mimes:xls,xlsx|max:2048', // Ensure 'document_jab' is a valid file
    ]);
    
    // Store the file using Laravel's file storage system
    $file = $request->file('file')->storePublicly('/documents');

    // Create registration
    $register = RegistrationGroup::create(array_merge($validatedData, ['file' => $file]));
    $token = $register->id;

     //redirect
     return inertia('Public/Registration/GroupSuccess', [
        'register' => $register,
        'token' => $token,
     ]);

    }

    public function confirm($id)
    {
        return inertia('Public/Registration/Confirm', [
  
        ]);
    }
}
