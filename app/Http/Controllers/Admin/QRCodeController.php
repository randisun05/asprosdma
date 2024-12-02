<?php

namespace App\Http\Controllers\Admin;

use Str;
use Faker\Core\Uuid;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    return response($qrCode, 200)->header('Content-Type', 'image/png');
    }
}
