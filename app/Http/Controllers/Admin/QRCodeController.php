<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Member;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {

        // Retrieve the member where no_member matches the request text
        $member = Member::where('nomember', $request->input('text'))->first();

        // Check if the member exists and has a qr_link
        if ($member && $member->qr_link) {
            $qrLink = "Randi";
        } else {
            // Handle the case where the member or qr_link is not found
            return response('Randi Error', 404);
        }

        // Generate the QR code using the retrieved qr_link
        $qrCode = QrCode::size(300)->generate($qrLink);

        return response($qrCode, 200)->header('Content-Type', 'image/svg+xml');
    }
}
