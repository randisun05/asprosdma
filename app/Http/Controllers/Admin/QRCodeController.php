<?php

namespace App\Http\Controllers\Admin;

use Faker\Core\Uuid;
use Illuminate\Support\Str;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {

        // Retrieve the member where no_member matches the request text
        $member = Member::where('nomember', $request->input('text'))->first();

        // Check if the member exists and has a qr_link
        if ($member && $member->qr_link) {
            $qrLink = "https://asprosdma.id/identity-verification/" . $member->qr_link;
        } elseif ($member && !$member->qr_link) {
            // Generate a new qr_link if the member does not have one
            $link = (string) Str::uuid();
            $member->qr_link = $link;
            $member->save();
            $qrLink = "https://asprosdma.id/identity-verification/" . $link;

        } else {
            // Handle the case where the member or qr_link is not found
            return response('QR link not found', 404);
        }

        // Generate the QR code using the retrieved qr_link
        $qrCode = QrCode::format('png')->size(300)->generate($qrLink);

        // Create a filename for the QR code
        $fileName = 'qrcode_' . $member->nomember . '.png';

        // Return the QR code as a downloadable response
        return response()->streamDownload(function () use ($qrCode) {
            echo $qrCode;
        }, $fileName, ['Content-Type' => 'image/png']);
    }

    public function generateQRCode1($id)
    {

        // Retrieve the member where no_member matches the request text
        $data = ProfileDataPosition::where('id', $id)->with('main')->first();
        $nomember = $data->main->nomember;
        $member = Member::where('nomember', $nomember)->first();

        // Check if the member exists and has a qr_link
        if ($member && $member->qr_link) {
            $qrLink = "https://asprosdma.id/identity-verification/" . $member->qr_link;
        } elseif ($member && !$member->qr_link) {
            // Generate a new qr_link if the member does not have one
            $link = (string) Str::uuid();
            $member->qr_link = $link;
            $member->save();
            $qrLink = "https://asprosdma.id/identity-verification/" . $link;

        } else {
            // Handle the case where the member or qr_link is not found
            return response('QR link not found', 404);
        }

        // Generate the QR code using the retrieved qr_link
        $qrCode = QrCode::format('png')->size(200)->generate($qrLink);

        // Create a filename for the QR code
        $fileName = 'qrcode_' . $member->name . '.png';

        // Return the QR code as a downloadable response
        return response()->streamDownload(function () use ($qrCode) {
            echo $qrCode;
        }, $fileName, ['Content-Type' => 'image/png']);
    }
}
