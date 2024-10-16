<?php

namespace App\Http\Controllers\Admin;

use App\Models\instansi;
use Illuminate\Http\Request;
use App\Exports\MemberExport;
use App\Models\ProfileDataMain;
use Illuminate\Support\Facades\DB;
use App\Models\ProfileDataPosition;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;



class DataMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 'keanggotaan' || auth()->user()->role === 'administrator') {
            $datas = ProfileDataPosition::with('main')
            ->when(request()->q, function($query) {
            $query->whereHas('main', function($query) {
                $query->where('name', 'like', '%' . request()->q . '%')
                      ->orWhere('agency', 'like', '%' . request()->q . '%')
                      ->orWhere('nip', 'like', '%' . request()->q . '%');
            });
            })
            ->latest()
            ->paginate(10);
            $datas->appends(['q' => request()->q]);
            return inertia('Admin/Members/Index', [
                'datas' => $datas,
             ]);
             } else {

            return redirect()->route('admin.dashboard')->with('error','anda tidak memiliki akses ke halaman tersebut');
        }

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
        if (auth()->user()->role === 'keanggotaan' || auth()->user()->role === 'administrator') {
            $data = ProfileDataPosition::where('id',$id)->with('main')->first();
            return inertia('Admin/Members/Show', [
               'data' => $data
            ]);
            } else {
            return redirect()->route('admin.dashboard')->with('error','anda tidak memiliki akses ke halaman tersebut');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role === 'keanggotaan' || auth()->user()->role === 'administrator') {
            $data = ProfileDataPosition::where('id',$id)->with('main')->first();
            $instansis = instansi::get();
            return inertia('Admin/Members/Edit', [
            'data' => $data,
            'instansis' => $instansis,
            ]);
            } else {
            return redirect()->route('admin.dashboard')->with('error','anda tidak memiliki akses ke halaman tersebut');
        }

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
        if (auth()->user()->role === 'keanggotaan' || auth()->user()->role === 'administrator') {
        $request->validate([
            'nip' => ['required','string', 'regex:/^\d{18}$/'],
        ],[
            'nip.regex' => 'NIP harus terdiri dari 18 angka.',
        ]);
        $id = ProfileDataPosition::where('id', $id)
        ->first();
        $main = ProfileDataMain::where('id', $id->main_id)
        ->first();
        //update data main
        $main->update([
                'nip' => $request->nip,
                // 'name' => $request->name,
                // 'fname' => $request->fname,
                // 'lname' => $request->lname,
                // 'leveledu' => $request->leveledu,
                // 'lastedu' => $request->lastedu,
                // 'place' => $request->place,
                // 'dob' => $request->dob,
                // 'docid' => $request->docid,
                // 'nodocid' => $request->nodocid,
                // 'email' => $request->email,
                // 'contact' => $request->contact,
                // 'gender' => $request->gender,
                // 'religion' => $request->religion,
        ]);

        // $position = ProfileDataPosition::where('main_id',$main->id)
        // ->first();

        // $position->update([
        //     'agency' => $request->agency,
        //     'type' => $request->type,
        //     'status' => $request->status,
        //     'unit' => $request->unit,
        //     'subunit' => $request->subunit,
        //     'position' => $request->position,
        //     'level' => $request->level,
        //     'location' => $request->location,
        //     'tmtpos' => $request->tmtpos,
        //     'golru' => $request->golru,
        //     'tmtgolru' => $request->tmtgolru,
        //     'wyear' => $request->wyear,
        //     'wmonth' => $request->wmonth,
        //  ]);
         return redirect()->route('admin.members.index')->with('success','data berhasil diupdate');
        } else {
            return redirect()->route('admin.dashboard')->with('error','anda tidak memiliki akses ke halaman tersebut');
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
        //
    }

    public function indexReport()
    {
        if (auth()->user()->role === 'keanggotaan' || auth()->user()->role === 'administrator') {

            $dataCountsByPosition = ProfileDataPosition::groupBy('position',)
            ->select('position', DB::raw('count(*) as total'))
            ->get()
            ->pluck('total', 'position');

            $dataCountsByLevel = ProfileDataPosition::groupBy('level')
            ->select('level', DB::raw('count(*) as total'))
            ->get()
            ->pluck('total', 'level');

            $countsPerMonth = [];
            $accumulatedCounts = [];
            $currentYear = date('Y');
            $totalCount = 0;

            for ($month = 1; $month <= 12; $month++) {
                $monthlyCount = ProfileDataPosition::with('main')
                    ->whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $month)
                    ->count();

                $countsPerMonth[$month] = $monthlyCount;
                $totalCount += $monthlyCount;
                $accumulatedCounts[$month] = $totalCount;
            }

            return inertia('Admin/Members/Report', [
                'dataCountsByPosition' => $dataCountsByPosition,
                'dataCountsByLevel' => $dataCountsByLevel,
                'countsPerMonth' => $countsPerMonth,
                'accumulatedCounts' => $accumulatedCounts,
            ]);
            } else {

            return redirect()->route('admin.dashboard')->with('error','anda tidak memiliki akses ke halaman tersebut');
        }

    }

    public function exportReport()
    {
        if (auth()->user()->role === 'keanggotaan' || auth()->user()->role === 'administrator') {
            $datas = ProfileDataPosition::with('main')
            ->get();
            return Excel::download(new MemberExport($datas), 'data_anggota.xlsx');
            } else {
                return redirect()->route('admin.dashboard')->with('error','anda tidak memiliki akses ke halaman tersebut');
        }

    }
}
