<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Event;
use App\Models\Merchan;
use App\Models\PublicPost;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProfileDataPosition;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $registrationData = [
            'total-registrasi' => Registration::count(),
            'telah-dilakukan-verifikasi' => Registration::where('emailstatus', '!=', 0)->count(),
            'upload-bukti-pembayaran' => Registration::whereNotNull('paid')->count(),
            'perbaikan' => Registration::where('status', 'confirm')->count(),
            'selesai' => Registration::where('status', 'approved')->count(),
            'ditolak' => Registration::where('status', 'rejected')->count(),

        ];

        $publicationData = [
            'publikasi' => Post::where('status', 'approved')->count(),
            'kegiatan' => Event::count(),
            'merchan' => Merchan::count(),
        ];

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
            $totalCount = 0;

            $startYear = 2024;
            $currentYear = date('Y');  // Tahun saat ini (misalnya: 2025)
            $currentMonth = date('n'); // Bulan saat ini (misalnya: 2 untuk Februari)

            for ($year = $startYear; $year <= $currentYear; $year++) {
                // Tentukan batas bulan (Desember untuk tahun sebelumnya, bulan saat ini untuk tahun berjalan)
                $endMonth = ($year == $currentYear) ? $currentMonth : 12;

                for ($month = 1; $month <= $endMonth; $month++) {
                    $monthlyCount = ProfileDataPosition::with('main')
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();

                    $totalCount += $monthlyCount;
                    if ($totalCount > 0) { // Hanya simpan jika ada data
                        $key = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT);
                        $countsPerMonth[$key] = $monthlyCount;
                        $accumulatedCounts[$key] = $totalCount;
                    }
                }
            }


        return inertia('Admin/Dashboard/Index', [
            'registrationData' => $registrationData,
            'publicationData' => $publicationData,
            'dataCountsByPosition' => $dataCountsByPosition,
            'dataCountsByLevel' => $dataCountsByLevel,
            'countsPerMonth' => $countsPerMonth,
            'accumulatedCounts' => $accumulatedCounts,
        ]);
    }
}
