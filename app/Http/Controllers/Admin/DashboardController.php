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
                ->pluck('total', 'level')
                ->sortBy(function ($value, $key) {
                    $order = [
                        'Terampil','Mahir','Penyelia','Ahli Pertama','Ahli Muda','Ahli Madya','Ahli Utama'
                    ];
                    return array_search($key, $order);
                });

            $countsPerMonth = [];
            $accumulatedCounts = [];
            $totalCount = 0;

            $startYear = 2024;
            $currentYear = date('Y');  // Tahun saat ini (misalnya: 2025)
            $currentMonth = date('n'); // Bulan saat ini (misalnya: 2 untuk Februari)

            for ($year = $startYear; $year <= $currentYear; $year++) {
                $endMonth = ($year == $currentYear) ? $currentMonth : 12;

                // Mulai dari April 2024, bulan berikutnya mulai dari Januari
                $startMonth = ($year == 2024) ? 4 : 1;
                for ($month = $startMonth; $month <= $endMonth; $month++) {
                    $key = "{$year}-" . str_pad($month, 2, '0', STR_PAD_LEFT);

                    // Total per bulan
                    $monthlyCount = ProfileDataPosition::whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->count();

                    $totalCount += $monthlyCount;
                    $countsPerMonth[$key] = $monthlyCount;
                    $accumulatedCounts[$key] = $totalCount;

                    // Per posisi
                    $monthlyCountsByPosition = ProfileDataPosition::whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->groupBy('position')
                        ->select('position', DB::raw('count(*) as total'))
                        ->get()
                        ->pluck('total', 'position');

                    foreach ($monthlyCountsByPosition as $position => $count) {
                        if (!isset($accumulatedCountsByPosition[$position])) {
                            $accumulatedCountsByPosition[$position] = [];
                        }

                        $accumulatedCountsByPosition[$position][$key] = $count;
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
            'accumulatedCountsByPosition' => $accumulatedCountsByPosition,
        ]);
    }
}
