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
            <p>Setelah kami verifikasi data anda, ada beberapa data yang perlu di perbaiki, silakan akses <a href="http://10.40.9.3:8005/registration/confirm/{{ $data['id'] }}/edit"> link ini </a> untuk memperbaiki data anda</p>
            <p>Kami akan memproses usulan anda, setelah data anda diperbaiki.</p>
            <p>Jika anda mendapatkan kendala silakan <a href="/#sapa-kita"><u>hubungi kami.</u></a></p>
                       
            <p>Demikian informasi dari kami.</p>
            <p>Terimakasih,</p>
            <p>Tim Keanggotaan Aspro</p>
        </div>
    </div>
</html>
