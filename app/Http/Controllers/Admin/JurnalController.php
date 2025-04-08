<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use App\Exports\KeuanganReport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnals = Jurnal::
        when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->orderBy('nomor', 'asc')
        ->paginate(10);

        $jurnals->appends(['q' => request()->q]);

        return inertia('Admin/Jurnal/Index', [
            'jurnals' => $jurnals,
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

        // Check if the user is an administrator
        if (auth()->check() && auth()->user()->role === 'administrator' || auth()->user()->role === 'bendahara') {
                // Validate request including file validation
      $request->validate([
        'title' => 'required|string',
        'nominal' => 'required|numeric',
        'type' => 'required',
        'date' => 'required|date',
        'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

        $saldo = Jurnal::latest()->first()->saldo ?? 0;
        $lastJurnal = Jurnal::latest()->first();
        $nomor = $lastJurnal ? $lastJurnal->nomor + 1 : 1;

        if ($request->hasFile('bukti')) {
            $bukti = $request->file('bukti')->storePublicly('/documents');
            } else {
            $bukti = null;
            }


        Jurnal::create([
            'title' => $request->title,
            'nominal' => $request->nominal,
            'type' => $request->type,
            'saldo' => $request->type === 'kredit' ? $saldo - $request->nominal : $saldo + $request->nominal,
            'nomor' => $nomor,
            'coa' => $request->coa,
            'keterangan' => $request->keterangan,
            'kategori' => 'pusat',
            'date' => $request->date,
            'bukti' => $bukti,
        ]);

     //redirect
     return redirect()->route('admin.jurnals.index');
        } else {
            return redirect()->route('admin.jurnals.index')->with('error', 'anda tidak memiliki akses ke halaman tersebut');
        }


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

        if (auth()->check() && auth()->user()->role === 'administrator' || auth()->user()->role === 'bendahara') {
            $jurnal = Jurnal::findOrFail($id);
            // Validate request including file validation
            $request->validate([
            'title' => 'required|string',
            'nominal' => 'required|numeric',
            'type' => 'required',
            'date' => 'required|date',

            ]);

            // If a new file is uploaded, delete the old one
            if ($request->hasFile('bukti')) {
            if ($jurnal->bukti) {
                Storage::delete($jurnal->bukti);
            }
            $bukti = $request->file('bukti')->storePublicly('/documents');
            } else {
            $bukti = $jurnal->bukti;
            }

            $jurnal->update([
            'title' => $request->title,
            'nominal' => $request->nominal,
            'type' => $request->type,
            'coa' => $request->coa,
            'keterangan' => $request->keterangan,
            'kategori' => 'pusat',
            'bukti' => $bukti,
            ]);

            // Recalculate saldo starting from the updated record
            $jurnals = Jurnal::where('nomor', '>=', $jurnal->nomor)->orderBy('nomor', 'asc')->get();
            $saldo = $jurnal->nomor > 1
            ? optional(Jurnal::where('nomor', '<', $jurnal->nomor)->orderBy('nomor', 'desc')->first())->saldo ?? 0
            : 0;

            foreach ($jurnals as $item) {
            $saldo = $item->type === 'kredit' ? $saldo - $item->nominal : $saldo + $item->nominal;
            $item->update(['saldo' => $saldo]);
            }
            return redirect()->route('admin.jurnals.index');
        } else {
            return redirect()->route('admin.jurnals.index')->with('error', 'anda tidak memiliki akses ke halaman tersebut');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->check() && auth()->user()->role === 'administrator' || auth()->user()->role === 'bendahara') {
            $jurnal = Jurnal::findOrFail($id);
        // Get the previous transaction's saldo
        $previousSaldo = $jurnal->nomor > 1
            ? optional(Jurnal::where('nomor', '<', $jurnal->nomor)->orderBy('nomor', 'desc')->first())->saldo ?? 0
            : 0;

        // Delete the current transaction
        $jurnal->delete();

        // Recalculate saldo for subsequent transactions
        $jurnals = Jurnal::where('nomor', '>', $jurnal->nomor)->orderBy('nomor', 'asc')->get();
        $saldo = $previousSaldo;

        foreach ($jurnals as $item) {
            $saldo = $item->type === 'kredit' ? $saldo - $item->nominal : $saldo + $item->nominal;
            $item->update(['saldo' => $saldo]);
        }

        //redirect
        return redirect()->route('admin.jurnals.index');
        } else {
            return redirect()->route('admin.jurnals.index')->with('error', 'anda tidak memiliki akses ke halaman tersebut');
        }

    }

    public function exportReport()
    {
        // Check if the user is an administrator
        if (auth()->check() && auth()->user()->role === 'administrator' || auth()->user()->role === 'bendahara') {
            $datas = Jurnal::orderBy('nomor', 'asc')->get();
            return Excel::download(new KeuanganReport($datas), 'laporan_kas.xlsx');
        } else {
            return redirect()->route('admin.jurnals.index')->with('error', 'anda tidak memiliki akses ke halaman tersebut');
        }

    }


}
