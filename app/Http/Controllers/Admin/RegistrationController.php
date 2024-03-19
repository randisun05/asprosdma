<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Mail\SendEmailReject;
use GuzzleHttp\Handler\Proxy;
use App\Mail\SendEmailAprrove;
use App\Mail\SendEmailConfirm;
use App\Models\ProfileDataMain;
use Illuminate\Validation\Rule;
use App\Models\RegistrationGroup;
use App\Imports\RegistrationImport;
use App\Mail\SendEmailRegistration;
use App\Models\ProfileDataPosition;
use App\Http\Controllers\Controller;
use App\Models\instansi;
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
        $instansis = instansi::get();
        return inertia('Admin/Registration/Create', [
            'instansis' => $instansis,
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
        'nip' => ['required', 'string', 'regex:/^\d{18}$/', 'unique:registrations,nip'],
        'name' => 'required|string',
        'email' => 'required|email|unique:registrations,email',
        'contact' => 'required|string|unique:registrations,contact',
        'agency' => 'required|string',
        'position' => 'required|string',
        'level' => 'required|string',
        'document_jab' => 'required|file|mimes:pdf|max:2048', // Ensure 'document_jab' is a valid file
        
    ],
    [
        'nip.regex' => 'NIP harus terdiri dari 18 angka.',
        'nip.unique' => 'Data NIP sudah digunakan.',
        'email.unique' => 'Data email sudah digunakan.',
        'contact.unique' => 'Data kontak sudah digunakan.',
        'nip.required' => 'NIP harus diisi.',
        'name.required' => 'Nama harus diisi.',
        'email.required' => 'Email harus diisi.',
        'contact.required' => 'Kontak harus diisi.',
        'agency.required' => 'Instansi harus diisi.',
        'position.required' => 'Jabatan harus diisi.',
        'level.required' => 'Jenjang harus diisi.',
        'document_jab.required' => 'SK jabatan harus diisi.',
    ]);
    
     // Store the file using Laravel's file storage system
     $document_jab = $request->file('document_jab');
     $paid = $request->file('paid');
     $document_jab = $document_jab->storePublicly('/document');
 
    if ($paid) {
         $paid = $paid->storePublicly('/images');
         // Jika hanya paid diisi, update semua kecuali document_jab
         $registration = Registration::create(array_merge($validatedData, [ 'status' => 'paid', 
         'document_jab' => $document_jab, 'paid' => $paid,         
         ]));  
     } else { // Create registration
        $registration = Registration::create(array_merge($validatedData, ['document_jab' => $document_jab,]));
    }

    Mail::to($registration['email'])->send(new SendEmailRegistration($registration));

     //redirect
     return redirect()->route('admin.registration.index')>with([
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
        $register = Registration::findOrFail($id);
        //render with inertia
       return inertia('Admin/Registration/Show', [
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
        // Validate request including file validation
       $validatedData = $request->validate([
        'nip' => [
            'required',
            'string',
            'regex:/^\d{18}$/',
            Rule::unique('registrations')->ignore($id), // Mengabaikan ID saat validasi unik
        ],
        'name' => 'required|string',
        'email' => [
            'required',
            'email',
            Rule::unique('registrations')->ignore($id),
        ],
        'contact' => [
            'required',
            'string',
            Rule::unique('registrations')->ignore($id),
        ],
        'agency' => 'required|string',
        'position' => 'required|string',
        'level' => 'required|string',
    ], [
        'nip.regex' => 'NIP harus terdiri dari 18 angka.',
    ]);
    
            // Store the file using Laravel's file storage system
            $document_jab = $request->file('document_jab');
            $paid = $request->file('paid');
        
            if ($document_jab && $paid) {
                // Jika keduanya diisi, update semua
                $document_jab = $document_jab->storePublicly('/document');
                $paid = $paid->storePublicly('/images');
                Registration::where('id',$id)->update(array_merge($validatedData, [
                    'document_jab' => $document_jab,
                    'paid' => $paid,
                    'status' => "paid"
                ]));    
            } elseif ($document_jab) {
                $document_jab = $document_jab->storePublicly('/images');
                // Jika hanya document_jab diisi, update semua kecuali paid
                Registration::where('id',$id)->update(array_merge($validatedData, [
                    'document_jab' => $document_jab,
                ]));
            } elseif ($paid) {
                $paid = $paid->storePublicly('/images');
                // Jika hanya paid diisi, update semua kecuali document_jab
                Registration::where('id',$id)->update(array_merge($validatedData, [
                    'paid' => $paid,
                    'status' => "paid"
                ]));  
            }

            // Buat registration
            Registration::where('id',$id)->update(array_merge($validatedData, [ 
            ]));

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

        
        $password = $this->generatePassword();
        //get register
        $register = Registration::findOrFail($id);
        // return $register;
            
        Member::create([
            'nip'            => $register->nip,
            'name'           => $register->name,
            'email'          => $register->email,
            'password'       => $password,
        ]);

          //create data profile
        ProfileDataMain::create([
            'nip'             => $register->nip,
            'name'            => $register->name,
            'email'           => $register->email,
            'contact'        => $register->contact,
        ]);

         //get id relation
        $data = ProfileDataMain::where('nip',$register->nip)->first();
       
         //create data positiono
        ProfileDataPosition::create([
            'main_id'           => $data->id,
            'agency'           => $register->agency,
            'position'         => $register->position ." ". $register->level,
        ]);

        $email = Member::where('nip',$register->nip)->first();
        
        //email
        Mail::to($register['email'])->send(new SendEmailAprrove($email));

        Registration::where('id', $id)->update([
            'status'        => "approved",
            'emailstatus'      => 1,
        ]);

       
        
        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function reject($id)
    {

        $register = Registration::findOrFail($id);

        Mail::to($register['email'])->send(new SendEmailReject($register));

        Registration::where('id', $id)->update([
            'status' => "rejected",
            'emailstatus'      => 1,
        ]);
        
        //redirect
        return redirect()->route('admin.registration.index');
    }

    public function confirm($id, Request $request)
    {
       
        $register = Registration::findOrFail($id);

        Mail::to($register['email'])->send(new SendEmailConfirm($register));

        Registration::where('id', $id)->update([
            'status' => "confirm",
            'info' => $request->info,
            'emailstatus'      => 1,
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

        $registrations = Registration::where('emailstatus', 0)
        ->latest()
        ->get();

             
         // Kirim email setelah import selesai
         foreach ($registrations as $registration) {

            // Kirim email kepada setiap member
            Mail::to($registration['email'])->send(new SendEmailRegistration($registration));

            // Update status_email untuk setiap peserta
            $registration->emailstatus = 1;
            $registration->save();
        }
        
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

        public function generatePassword($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
            }


}
