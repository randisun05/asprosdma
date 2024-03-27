<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Registrasi</title>
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
        {{-- <div class="logo-container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
            </a>
        </div> --}}
        <hr>
        <div class="message">
            <p>Dear <strong>{{ $data['name'] }}</strong>,</p>
            <p>Terimakasih telah melakukan registrasi keanggotaan Asosiasi Profesi SDM Aparatur. Token usul anda adalah:
                <strong>{{ $data['id'] }}</strong>.</p>
            <p>Pembayaran uang pangkal iuran dapat dilakukan dengan cara transfer via ATM Non-Tunai, Internet Banking,
                dan setoran tunai hanya ke <strong> Nomor Rekening BRI. 123 3232 1212 a.n Aspro </strong> sebesar
                <strong> Rp. 120.000 untuk pejabat Fungsional Analis SDM Aparatur </strong>
                dan <strong> Rp. 100.000 bagi Pejabat Fungsional Pranata SDM Aparatur</strong> dengan mencantumkan
                berita transfer sebagai berikut: <strong>{{ $data['name'] }}</strong>.</p>
            <p> <strong> Waspada terhadap penipuan yang mengatasnamakan Asosiasi Profesi SDM Aparatur, pembayaran hanya
                    dilakukan ke nomor rekening diatas.</strong></p>
            <p>Jika Anda sudah melakukan pembayaran silakan untuk melakukan konfirmasi melalui halaman konfirmasi <a
                    href="https://asprosdma.id/registration/paid/{{ $data['id'] }}" class="button">Halaman
                    Konfirmasi</a> </p>
            <p>Jika anda mendapatkan kendala atau butuh informasi lebih lanjut dapat menghubungi sdr. Dimas melalui
                pesan whatsapp dgn kontak 0812-1559-3147 </p>
            <p>atau kunjungi halaman <a href="https://asprosdma.id/kontak-kami"><u>hubungi kami.</u></a></p>

            <p>Demikian informasi dari kami.</p>
            <p>Terimakasih,</p>
            <p>Tim Keanggotaan Aspro SDMA</p>
        </div>
    </div>
</body>

</html>
