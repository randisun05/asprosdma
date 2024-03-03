<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function about()
    {
        return inertia('Public/Website/About/About', [
            'title' => "Siapa Kita?",
        ]);
    }

    public function ketuaUmum()
    {
        return inertia('Public/Website/About/KetuaUmum', [
            'title' => "Ketua Umum",
        ]);
    }

    public function visiMisi()
    {
        return inertia('Public/Website/About/VisiMisi', [
            'title' => "Visi Misi",
        ]);
    }

    public function strukturOrganisasi()
    {
        return inertia('Public/Website/About/StrukturOrganisasi', [
            'title' => "Struktur Organisasi",
        ]);
    }

    public function sejarah()
    {
        return inertia('Public/Website/About/Sejarah', [
            'title' => "Sejarah",
        ]);
    }

    public function peraturanOrganisasi()
    {
        return inertia('Public/Website/About/PeraturanOrganisasi', [
            'title' => "Peraturan Organisasi",
        ]);
    }

    public function hubunganMasyarakat()
    {
        return inertia('Public/Website/Program/HubunganMasyarakat', [
            'title' => "Bidang Hubungan Masyarakat dan Kerja Sama",
        ]);
    }

    public function hukumAdvokasi()
    {
        return inertia('Public/Website/Program/HukumAdvokasi', [
            'title' => "Bidang Hukum dan Advokasi",
        ]);
    }

    public function keanggotaan()
    {
        return inertia('Public/Website/Program/Keanggotaan', [
            'title' => "Bidang Keanggotaan dan Organisasi",
        ]);
    }

    public function pengembangan()
    {
        return inertia('Public/Website/Program/Pengembangan', [
            'title' => "Bidang Pengembangan Kapasitas Insani",
        ]);
    }

    public function sumberPendanaan()
    {
        return inertia('Public/Website/Program/SumberPendanaan', [
            'title' => "Bidang Sumber Pendanaan Organisasi",
        ]);
    }

    public function cerita()
    {
        return inertia('Public/Website/Maintenance/Index', [
            'title' => "Maintenance",
        ]);
    }

    public function berita()
    {
        return inertia('Public/Website/Maintenance/Index', [
            'title' => "Maintenance",
        ]);
    }

    public function artikel()
    {
        return inertia('Public/Website/Maintenance/Index', [
            'title' => "Maintenance",
        ]);
    }
}
