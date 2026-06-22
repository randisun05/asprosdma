<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Event</title>
    <style>
        /* Style untuk merapikan struktur email di tengah */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            text-align: left;
            font-family: Arial, sans-serif;
        }

        .message {
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 50%;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px auto;
            width: 100%;
        }

    </style>
</head>
<body>
    <div class="container">
        <hr>
        <div class="message">
            <p>Halo Rekan JF SDM Aparatur!</p>
            <p class="mb-0">Terima kasih telah mendaftar pada kegiatan Komunitas Belajar by Asosiasi Profesi JF SDM Aparatur dengan tema:</p>
                {{ $data['title'] }} </p>
            <p>pada:</p>
            <ul>
                <li>Tanggal : {{ $data['date'] }}</li>
                <li>Jam : Sesuai tertera pada pengumuman </li>
            </ul>

            <p class="mb-0"> Untuk dapat bergabung ke ruang diskusi, silakan klik link zoom meeting berikut: 👇🏽👇🏽👇🏽
                Join Zoom Meeting </p>
            <p>{{ $data['link'] }}</p>

            <p class="mb-0">Berikut beberapa himbauan untuk seluruh peserta kegiatan Komunitas Belajar:</p>
            <ul>
                <li>✅Wajib menggunakan Nama Depan-Nomor Anggota (Contoh Nomor Anggota 00001/01/ASPROSDMA dan Nama Depan Dhanu, maka menjadi Dhanu-00001-01)</li>
                <li>✅Wajib menggunakan Virtual background yg dapat diunduh di: https://linktr.ee/halo.asprosdma
                </li>
                <li>✅Persiapkan diri untuk pembelajaran yang sangat bermanfaat ini
                </li>
                <li>✅Wajib mematikan (mute) microphone dan menyalakan kamera
                </li>
                <li>✅Mari senantiasa mengedepankan etika dalam berdiskusi melalui ruang maya
                </li>
            </ul>

            <p>Daftarkan diri anda sebagai Anggota Asosiasi Profesi JF SDM Aparatur sekarang!
                Pelajari lebih lanjut dengan klik tautan <a href="ww.asprosdma.id">www.asprosdma.id</a></p>

            <p>Jika memerlukan bantuan dapat menghubungi:
                📳: Admin Aspro SDMA <a href="https://api.whatsapp.com/send/?phone=6281316932936&text&type=phone_number&app_absent=0">wa.me/6281316932936</a></p>

            <p class="mb-0">Media Partner:</p>
            <ul>
                <li>@bkngoidofficial - https://www.instagram.com/bkngoidofficial/</li>
            </ul>

            <p class="mb-0">Sampai bertemu di Komunitas Belajar!!😁‍️</p>
            <p class="">💪 Salam JF SDM Aparatur!! 💪</p>
        </div>
    </div>
</body>
</html>
