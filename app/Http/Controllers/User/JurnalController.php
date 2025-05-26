<?php

namespace App\Http\Controllers\User;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurnalController extends Controller
{
    public function index()
    {

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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
{
    // Ambil semua jurnal, urutkan berdasarkan tanggal
    $jurnals = Jurnal::when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->orderBy('date', 'asc')
        ->get();

    $saldo_akhir = 0;

    // Group berdasarkan bulan dan hitung total pemasukan, pengeluaran, saldo akhir
    $grouped = $jurnals->groupBy(function($item) {
        return \Carbon\Carbon::parse($item->date)->format('Y-m');
    })->map(function($items, $month) use (&$saldo_akhir) {
        $total_pemasukan = $items->where('type', 'debit')->sum('nominal');
        $total_pengeluaran = $items->where('type', 'kredit')->sum('nominal');

        // Hitung saldo akhir bulan ini
        $saldo_akhir += $total_pemasukan - $total_pengeluaran;

        return [
            'month' => $month,
            'total_pemasukan' => $total_pemasukan,
            'total_pengeluaran' => $total_pengeluaran,
            'saldo_akhir' => $saldo_akhir,
            'items' => $items->values(),
        ];
    })->values();

    return inertia('User/Jurnal/Show', [
        'jurnals' => $grouped,
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



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function exportReport()
    {

    }
}
