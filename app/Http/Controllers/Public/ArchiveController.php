<?php

namespace App\Http\Controllers\Public;

use App\Models\instansi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Archive;
use Carbon\Carbon;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansis = instansi::get();
        return inertia('Public/Archives/Index', [
               'instansis' => $instansis
         ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'nip' => ['required', 'string', 'regex:/^\d{18}$/'],
        'name' => 'required|string',
        'email' => 'required|email',
        'contact' => 'required|string',
        'agency' => 'required|string',
        'position' => 'required|string',
        'category' => 'required|string',
        'title' => 'required|string',
        'detail' => 'required|string',
    ],
    [
        'nip.regex' => 'NIP harus terdiri dari 18 angka.',
        'nip.required' => 'NIP harus diisi.',
        'name.required' => 'Nama harus diisi.',
        'email.required' => 'Email harus diisi.',
        'contact.required' => 'Kontak harus diisi.',
        'agency.required' => 'Instansi harus diisi.',
        'position.required' => 'Jabatan harus diisi.',
        'title.required' => 'Topik pertanyaan harus diisi.',
        'detail.required' => 'Detail pertanyaan harus diisi.',

    ]);

    $request->validate([
        'code' => 'required|string',
        'captcha' => 'required|same:code',
        'term' => 'in:1',
    ], [
        'captcha.required' => 'Captcha harus diisi.',
        'captcha.same' => 'Captcha Salah.',
        'term.in' => 'Checklist jika bersedia.',
    ]);


 // Store the file using Laravel's file storage system
     if ($request->hasFile('document')) {
        $document = $request->file('document')->storePublicly('/documents');
        } else {
        $document = null;
        }

    $lastMonth = Carbon::now()->format('ymd');
    do {
        $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $tiket = $lastMonth . $randomNumber;
        $existingTicket = Archive::where('noticket', $tiket)->first();
    } while ($existingTicket);

    // Create registration
    $archive = Archive::create(array_merge($validatedData, ['status' => '1', 'noticket' => $tiket, 'document' => $document]));

     //redirect
     return redirect()->route('hubungi-aspro.show')->with([
        'tiket' => $tiket,
        'archive' => $archive
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $tiket = $request->session()->get('tiket');
        $archive = $request->session()->get('archive');

        return inertia('Public/Archives/Show', [
            'tiket' => $tiket,
            'archive' => $archive
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
        //
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
}
