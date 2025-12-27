<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Anda - Aspro SDMA</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: #ffffff; padding: 40px; border-radius: 8px; border-top: 5px solid #007bff; }
        .header { text-align: center; margin-bottom: 30px; }
        .content { margin-bottom: 30px; }
        .button-wrapper { text-align: center; margin: 30px 0; }
        .button { background-color: #007bff; color: #ffffff !important; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; }
        .footer { text-align: center; font-size: 12px; color: #888; margin-top: 20px; }
        .info-box { background: #f9f9f9; padding: 15px; border-radius: 5px; font-size: 14px; border-left: 3px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://asprosdma.id/assets/images/logo2.png" alt="Logo Aspro SDMA" width="120">
            <h2 style="color: #007bff;">Sertifikat Kegiatan</h2>
        </div>

        <div class="content">
            <p>Halo, <strong>{{ $certificate->name }}</strong></p>
            <p>Terima kasih telah berpartisipasi dalam kegiatan <strong>{{ $certificate->body }}</strong> yang diselenggarakan oleh Aspro SDMA.</p>

            <p style="margin-top: 20px;">Anda dapat melihat atau mengunduh sertifikat melalui tombol di bawah ini:</p>
        </div>

        <div class="button-wrapper">
            <a href="https://asprosdma.id/events/sertifikasi-keahlian-aparatur-untuk-sdm-indonesia-yang-berdaya-saing/certificate?q={{ $certificate->nip }}" class="button">Lihat Sertifikat</a>
        </div>

        <p>Atau copy link berikut ke browser Anda:</p>
        <p style="font-size: 13px; color: #007bff;">https://asprosdma.id/certificates/search?q={{ $certificate->nip }}</p>

        <p>Jika anda mendapatkan <strong> kendala atau butuh informasi lebih lanjut, kunjungi halaman <a href="https://asprosdma.id/kontak-kami"><u>hubungi kami.</u></a></p>

        <hr style="border: 0; border-top: 1px solid #eee;">

         <p class="mb-0">Media Partner:</p>
            <ul>
                <li>@bkngoidofficial - https://www.instagram.com/bkngoidofficial/</li>
            </ul>

            <p class="mb-0">Sampai bertemu di Komunitas Belajar Selanjutnya!!😁‍️</p>
            <p class="">Salam JF SDM Aparatur!!</p>
            <p class="">Aspro SDMA</p>
    </div>
</body>
</html>
