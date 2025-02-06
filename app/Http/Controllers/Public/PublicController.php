<?php

namespace App\Http\Controllers\Public;

use Log;
use App\Models\Post;
use App\Models\Event;
use App\Models\Member;
use App\Models\Category;
use App\Models\ReactDetail;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\RegistrationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailForgetPassword;
use App\Models\Management;

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

        $showPopup = Management::where('item', 'popup')->sum('status');
        $datas = Management::where('item', 'popup')->where('status','1')->get();

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
            'showPopup' => $showPopup,
            'datas' => $datas
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
        $data = Management::where('item', 'siapakita')->first();
        return inertia('Public/Website/About/About', [
            'title' => "Siapa Kita?",
            'data' => $data
        ]);
    }

    public function ketuaUmum()
    {

        $data = Management::where('item', 'ketuaumum')->first();
        return inertia('Public/Website/About/KetuaUmum', [
            'title' => "Ketua Umum",
            'data' => $data
        ]);
    }

    public function visiMisi()
    {
        $data = Management::where('item', 'visimisi')->first();
        return inertia('Public/Website/About/VisiMisi', [
            'title' => "Visi Misi",
            'data' => $data
        ]);
    }

    public function strukturOrganisasi()
    {
        $data = Management::where('item', 'strukturorganisasi')->get();
        return inertia('Public/Website/About/StrukturOrganisasi', [
            'title' => "Struktur Organisasi",
            'data' => $data
        ]);
    }

    public function sejarah()
    {
        $data = Management::where('item', 'sejarah')->first();
        return inertia('Public/Website/About/Sejarah', [
            'title' => "Sejarah Terbentuknya Aspro SDMA",
            'data' => $data
        ]);
    }

    public function peraturanOrganisasi()
    {
        $datas = Management::when(request()->q, function($query) {
            $query->where('body', 'like', '%' . request()->q . '%');
        })
        ->where('item', 'peraturan')
        ->latest()
        ->paginate(6);

        $datas->appends(['q' => request()->q]);

        return inertia('Public/Website/About/PeraturanOrganisasi', [
            'title' => "Peraturan Organisasi",
            'datas' => $datas
        ]);
    }

    public function hubunganMasyarakat()
    {
        $data = Management::where('item', 'proker')->where('sub','humas')->first();
        return inertia('Public/Website/Program/HubunganMasyarakat', [
            'title' => "Bidang Hubungan Masyarakat dan Kerja Sama",
            'data' => $data
        ]);
    }

    public function hukumAdvokasi()
    {
        $data = Management::where('item', 'proker')->where('sub','hukum')->first();
        return inertia('Public/Website/Program/HukumAdvokasi', [
            'title' => "Bidang Hukum dan Advokasi",
            'data' => $data
        ]);
    }

    public function keanggotaan()
    {
        $data = Management::where('item', 'proker')->where('sub','anggota')->first();
        return inertia('Public/Website/Program/Keanggotaan', [
            'title' => "Bidang Keanggotaan dan Organisasi",
            'data' => $data

        ]);
    }

    public function pengembangan()
    {
        $data = Management::where('item', 'proker')->where('sub','pengembangan')->first();
        return inertia('Public/Website/Program/Pengembangan', [
            'title' => "Bidang Pengembangan Kapasitas Insani",
            'data' => $data
        ]);
    }

    public function sumberPendanaan()
    {
        $data = Management::where('item', 'proker')->where('sub','pendanaan')->first();
        return inertia('Public/Website/Program/SumberPendanaan', [
            'title' => "Bidang Sumber Pendanaan Organisasi",
            'data' => $data
        ]);
    }

    public function beritaView(Post $post)
    {

         // Get the related category of the post
         $user = auth()->guard('member')->user();

         if ($user) {

            $exist = ReactDetail::where('post_id', $post->id)->where('member_id', $user->id)->where('react_id', '3')->first();

            if (!$exist) {
                $react = ReactDetail::create([
                    'post_id' => $post->id,
                    'member_id' => $user->id,
                    'react_id' => '3',
                    'status' => '1',
                    'type' => 'post'
                ]);
            }

         }

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

        $datas = Management::when(request()->q, function($query) {
            $query->where('body', 'like', '%' . request()->q . '%');
        })
        ->where('item', 'dataanggota')
        ->latest()
        ->paginate(6);

        $datas->appends(['q' => request()->q]);

        return inertia('Public/Website/Posts/DataAnggota', [
            'title' => "Data Keanggotaan",
            'datas' => $datas
        ]);
    }

    public function faq()
    {
        $datas = Management::when(request()->q, function($query) {
            $query->where('body', 'like', '%' . request()->q . '%');
        })
        ->where('item', 'faq')
        ->latest()
        ->paginate(6);

        $datas->appends(['q' => request()->q]);
        return inertia('Public/Website/FAQ/faq', [
            'title' => "FAQ",
            'datas' => $datas
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
             // Generate a UUID for the password code
             $passwordCode = \Illuminate\Support\Str::uuid()->toString();
             $data->update([
                 'code-password' => $passwordCode,
             ]);

            Mail::to($data->email)->send(new SendEmailForgetPassword($data));
            return back()->with('success', 'Email telah dikirimkan untuk reset password.');
        }

        // Jika data tidak ditemukan atau email tidak sesuai
        return redirect()->back()->with('error','Data tidak sesuai.');
    }

    public function IndexforgetPassword(Member $member, $id)
    {
        $member = $member->where('code-password', $id)->first();
        if(!$member || $member->{'code-password'} === null)
        // Jika status registrasi bukan 'confirm', arahkan pengguna kembali atau tampilkan pesan kesalahan
        return redirect()->route('user.login')->with('error', 'Link telah ditutup.');


        return inertia('User/Auth/Index', [
            'member' => $member
        ]);
    }

    public function ResetPassword(Request $request, $id)
    {

        $request->validate([
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/',
                'confirmed',
                // At least one lowercase, one uppercase, one number, and one special character
            ],
        ],[
            'password.regex' => 'Password terdiri dari kombinasi huruf kapaital, huruf kecil, angka dan karakter spesial, contoh:A5proSDM@',
            'password.required' => 'Password baru harus diisi',
            'password.confirmed' => 'Konfirmasi password tidak sama',
            'oldpassword.min:8' => 'Password baru minimal 8 karakter'
        ]);

        $member = Member::Where('code-password', $id)->first();

        $member->update([
            'password' => Hash::make($request->password),
            'code-password' => null,
        ]);

        return redirect()->route('user.login')->with('success', 'Password berhasil direset.');
    }

    public function profileView($qr_link)
    {
        $data = Member::where('qr_link', $qr_link)->first();

        return inertia('Public/Profile/Index', [
            'title' => 'Profile Anggota',
            'data' => $data

        ]);
    }

    public function documentVerif($id)
    {
        $documentPath = public_path('/storage/documents/' . $id . ".pdf");
        $document = "documents/" . $id . ".pdf";

        if (!file_exists($documentPath)) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
        }


        return inertia('Public/Website/DocuDigi/Index', [
            'title' => 'Verifikasi Produk Aspro SDMA',
            'document' => $document

        ]);
    }

}
