<?php

namespace App\Http\Controllers\User;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProfileDataMain;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MemberCardController extends Controller
{
    public function index()
    {
        if (auth()->guard('member')->check()) {
            $profile = Member::where('id', auth()->guard('member')->id())->first();
            $foto = ProfileDataMain::where('nip', $profile->nip)->first('image');

            // Check if the member exists and has a qr_link
            if ($profile && $profile->qr_link) {
                $qrLink = "https://asprosdma.id/identity-verification/" . $profile->qr_link;
            } elseif ($profile && !$profile->qr_link) {
                // Generate a new qr_link if the member does not have one
                // Buat QR Link
              $qrLink = "https://asprosdma.id/identity-verification/" . ($profile->qr_link ?? Str::uuid());
            } else {
                // Handle the case where the member or qr_link is not found
                return response('QR link not found', 404);
            }

            // Generate the QR code in SVG format
            $qrCode = QrCode::format('svg')->size(75)->generate($qrLink);

            return inertia('User/MemberCard/Index', [
             'profile' => $profile,
             'qrCode' => (string) $qrCode, // Konversi menjadi string biasa
                'foto' => $foto

            ]);
        }
    }

    public function download()
    {
        if (auth()->guard('member')->check()) {
            $profile = Member::where('id', auth()->guard('member')->id())->first();
            $foto = ProfileDataMain::where('nip', $profile->nip)->first('image');

            // Check if the member exists and has a qr_link
            if ($profile && $profile->qr_link) {
                $qrLink = "https://asprosdma.id/identity-verification/" . $profile->qr_link;
            } elseif ($profile && !$profile->qr_link) {
                // Generate a new qr_link if the member does not have one
                $link = (string) \Illuminate\Support\Str::uuid();
                $profile->qr_link = $link;
                $profile->save();
                $qrLink = "https://asprosdma.id/identity-verification/" . $link;
            } else {
                // Handle the case where the member or qr_link is not found
                return response('QR link not found', 404);
            }

            // Generate the QR code using the retrieved qr_link
            $qrCode = QrCode::size(125)->generate($qrLink);

            // Render the view with the profile and qrCode
            return view('Layouts/Components/MemberCard', compact('profile', 'qrCode', 'foto'));
        }
    }

    public function saveMemberCard(Request $request)
    {
        $imageData = $request->input('image');
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageName = 'member-card-' . time() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($imageData));

        return response()->json(['success' => true, 'message' => 'Image saved successfully']);
    }
}
