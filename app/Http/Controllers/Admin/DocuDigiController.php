<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentDigital;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;

class DocuDigiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docus = DocumentDigital::
        when(request()->q, function($query) {
            $query->where('perihal', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(10);

        $docus->appends(['q' => request()->q]);

        return inertia('Admin/DocumentDigital/Index', [
            'docus' => $docus,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Admin/DocumentDigital/Create', [

            ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            // 'perihal' => 'required',
            // 'speciment' => 'required',
            // 'nipttd' => 'required',
            // 'anchor' => 'required',
            // 'nipparaf' => 'required',
            // 'tujuan' => 'required',
            // 'jenis' => 'required',
            // 'document' => 'required',
            // 'description' => 'required',
        ]);

        // Simpan dokumen asli
    $originalDocumentPath = $request->file('document')->store('documents');
    $fullPath = storage_path('app/public/' . $originalDocumentPath);

    // Generate QR Code
    $qrLink = "https://asprosdma.id/verification/" . uniqid();
    $qrCodePath = storage_path('app/public/images' . uniqid() . '.png');

   QrCode::format('png')->size(200)->generate($qrLink, $qrCodePath);

   $position = $this->findTextPosition($fullPath, $request->anchor);

    // Ekstrak teks dari PDF untuk mencari posisi anchor
    // $parser = new Parser();
    // $pdf = $parser->parseFile($fullPath);
    // $text = $pdf->getText();
    // $anchor = $request->anchor;
    // $position = $this->getAnchorPosition($request->anchor, $text);


    // Cari posisi anchor dalam teks
    // $posX = 10; // Default X jika tidak ditemukan
    // $posY = 220; // Default Y jika tidak ditemukan

    // if (strpos($text, $anchor) !== false) {
    //     // Di sini kita HARUS membaca metadata posisi teks dalam PDF.
    //     // Tapi karena `Smalot\PdfParser` tidak bisa membaca koordinat langsung,
    //     // kita akan menaruh QR di bawah teks yang ditemukan.
    //     $posX = 10; // Default X jika tidak ditemukan
    //     $posY = 220; // Default Y jika tidak ditemukan

    // }
    if (!$position) {
        return response()->json([
            'message' => 'Anchor tidak ditemukan dalam dokumen.',
            'anchor' => $request->anchor,
        ], 404);
    }

    $qrX = $position['x']; // Tetap sejajar dengan teks
    $qrY = $position['y'] - 30; // Pindah ke bawah teks (koordinat PDF terbalik: lebih kecil = ke bawah)


    // Load PDF asli dan tambahkan QR Code
    $newDocumentPath = storage_path('app/public/documents/' . uniqid() . '.pdf');
    $pdf = new Fpdi();
    $pdf->AddPage();
    $pdf->setSourceFile($fullPath);
    $template = $pdf->importPage(1);
    $pdf->useTemplate($template);

    // **5. Tambahkan QR Code pada posisi yang ditemukan**
    // $pdf->Image($qrCodePath, $position['x'], $position['y'], 30, 30);
    // $pdf->Image($qrCodePath, $posX, $posY, 30, 30);
     $pdf->Image($qrCodePath, $qrX, $qrY, 30, 30);


    // Simpan dokumen baru
    $pdf->Output($newDocumentPath, 'F');



        DocumentDigital::create([
            'perihal' => $request->perihal,
            'speciment' => $request->speciment,
            'nipttd' => $request->nipttd,
            'anchor' => $request->anchor,
            'qrcode' => $qrLink,
            'nipparaf' => $request->nipparaf,
            'tujuan' => $request->tujuan,
            'jenis' => $request->jenis,
            'document' => str_replace(storage_path('app/'), '', $newDocumentPath),
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Dokumen berhasil diproses',
            'anchor' => $request->anchor,
            'coordinates' => $position,
            'document_url' => asset('storage/' . str_replace('app/', '', $newDocumentPath)),
        ]);

        return redirect()->route('admin.docudigi.index');
    }

    private function findTextPosition($pdfPath, $anchor)
    {
        $pdf = new Fpdi();
        $pdf->setSourceFile($pdfPath);
        $pageId = $pdf->importPage(1);
        $specs = $pdf->getTemplateSize($pageId);

        $pdfParser = new Parser();
        $document = $pdfParser->parseFile($pdfPath);
        $text = $document->getText();

        $lines = explode("\n", $text);
        $y = $specs['height'] - 10; // Start from bottom
        $x = 10; // Default X start

        foreach ($lines as $line) {
            if (strpos($line, $anchor) !== false) {
                $charPos = strpos($line, $anchor);
                $x = 10 + ($charPos * 2.5); // Estimasi X
                return ['x' => $x, 'y' => $y];
            }
            $y -= 15; // Turun per baris sekitar 15px
        }

        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docu = DocumentDigital::findOrFail($id);
        return inertia('Admin/DocumentDigital/Index', [
            'docu' => $docu,
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
        $docu = DocumentDigital::findOrFail($id);
        return inertia('Admin/DocumentDigital/Index', [
            'docu' => $docu,
            ]);
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
        $docu = DocumentDigital::findOrFail($id);
        $request->validate([
            // 'perihal' => 'required',
            // 'speciment' => 'required',
            // 'nipttd' => 'required',
            // 'anchor' => 'required',
            // 'nipparaf' => 'required',
            // 'tujuan' => 'required',
            // 'jenis' => 'required',
            // 'document' => 'required',
            // 'description' => 'required',
        ]);
        $docu->update($request->all());
        return redirect()->route('admin.docudigi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docu = DocumentDigital::findOrFail($id);
        $docu->delete();
        return redirect()->route('admin.docudigi.index');
    }
}
