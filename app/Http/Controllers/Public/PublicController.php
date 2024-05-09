<?php

namespace App\Http\Controllers\Public;

use App\Models\Post;
use App\Models\Event;
use App\Models\Member;
use App\Models\Category;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\RegistrationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailForgetPassword;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $events = Event::whereNot('title','media')->latest()->take(3)->get();
        $analisdone = Registration::where('position','Analis SDM Aparatur')->where('status','approved')->count();
        $analisproses = Registration::where('position','Analis SDM Aparatur')->where('status','submission')->where('emailstatus',0)->count();
        $analispaid = Registration::where('position', 'Analis SDM Aparatur')
        ->where('emailstatus', '>', 0)
        ->whereNotIn('status', ['approved', 'rejected'])
        ->count();
        $pranatadone = Registration::where('position','Pranata SDM Aparatur')->where('status','approved')->count();
        $pranataproses = Registration::where('position','Pranata SDM Aparatur')->where('status','submission')->where('emailstatus','0')->count();
        $pranatapaid = Registration::where('position','Pranata SDM Aparatur')->where('emailstatus', '>', 0)
        ->whereNotIn('status', ['approved', 'rejected'])
        ->count();

        $agencydone = Registration::distinct()->count('agency');

        return view('Index', [
            "events" => $events,
            'analisdone' => $analisdone,
            'analisproses' => $analisproses,
            'pranatadone' => $pranatadone,
            'pranataproses' => $pranataproses,
            'agencydone' => $agencydone,
            'pranatapaid' => $pranatapaid,
            'analispaid' => $analispaid,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'title' => "Sejarah Terbentuknya Aspro SDMA",
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

    public function beritaView(Post $post)
    {

         // Get the related category of the post

        $category = $post->category;
        $member = $post->member;

        return inertia('Public/Website/Posts/Show', [
            'title' => $post->title,
            'post' => $post,
            'category' => $category,
            'member' => $member
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

    public function kontak()
    {
        return inertia('Public/Website/About/Kontak-kami', [
            'title' => "Kontak Kami",
        ]);
    }

    public function dataAnggota()
    {
        return inertia('Public/Website/Posts/DataAnggota', [
            'title' => "Data Keanggotaan",
        ]);
    }

    public function faq()
    {
        return inertia('Public/Website/FAQ/faq', [
            'title' => "FAQ",
        ]);
    }

    public function forgetPassword()
    {
        return inertia('User/Auth/Forget', [

        ]);
    }

    public function emailforgetPassword(Request $request)
    {

        $request->validate([
            'nip' => 'required',
            'email' => 'required|email', // Tambahkan validasi email
        ], [
            'nip.required' => 'Nip harus diisi',
            'email.required' => 'Email terdaftar harus diisi',
            'email.email' => 'Format email tidak valid', // Pesan untuk validasi email
        ]);

        $data = Member::where('nip', $request->nip)->first();

        // Periksa apakah data ditemukan dan email sesuai dengan yang dimasukkan pengguna
        if ($data && $data->email === $request->email) {
            Mail::to($data->email)->send(new SendEmailForgetPassword($data));
            return back()->with('success', 'Email telah dikirimkan untuk reset password.');
        }

        // Jika data tidak ditemukan atau email tidak sesuai
        return redirect()->back()->with('error','Data tidak sesuai.');


    }

}
