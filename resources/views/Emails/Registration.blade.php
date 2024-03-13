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
            <p>Terimakasih telah melakukan registrasi keanggotaan Asosiasi Profesi SDM Aparatur. Token usul anda adalah: <strong>{{ $data['id'] }}</strong>.</p>
            {{-- <p>Pembayaran uang pangkal dapat dilakukan dengan cara transfer via ATM Non-Tunai, Internet Banking, dan setoran tunai ke Nomor Rekening BRI. 123 3232 1212 a.n Aspro dengan mencantumkan berita transfer sebagai berikut: <strong>{{ $data['name'] }}</strong>.</p>
            <p>Jika Anda melakukan pembayaran melalui transfer bank (ATM, Internet Banking, M-Banking, setoran tunai), jangan lupa untuk melakukan konfirmasi melalui:</p>
            <ul>
                <li>Halaman Konfirmasi Pembayaran, silakan klik <a href="/registration/paid/{{ $data['id'] }}" class="cta-button">link ini</a></li>
                <li>Whatsapp (harus dilakukan di hari yang sama saat membayar) dengan menghubungi 908080909090</li>
            </ul> --}}
            <p>Jika anda mendapatkan kendala dan untuk informasi pembayaran silakan <a href="/#sapa-kita"><u>hubungi kami.</u></a></p>
           
            <p>Demikian informasi dari kami.</p>
            <p>Terimakasih,</p>
            <p>Tim Keanggotaan Aspro</p>
        </div>
    </div>
</body>
</html>
