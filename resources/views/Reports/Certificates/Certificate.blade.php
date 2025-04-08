<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .certificate {
            width: 97%;
            height: 870px;
            padding: 20px;
            border: 10px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            background: url('/assets/images/template.png'); /* URL Absolut */
            background-size: cover;
            background-position: center;
        }
        .certificate-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .certificate-header h1 {
            font-size: 124px;
            margin: 0;
        }
        .certificate-body {
            text-align: center;
        }
        .certificate-body p {
            font-size: 24px;
        }
        .certificate-body .nomor {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }
        .certificate-body .name {
            font-size: 32px;
            font-weight: bold;
            margin-top: 10px;

        }

        .certificate-body .bridging {
            font-size: 32px;
            font-weight: bold;
            margin-top: 100px;
        }
        .certificate-body .body {
            font-size: 24px;
            margin-top: 200px;
        }
        .certificate-body .qr {
            margin-top: 10px;
        }

        .certificate-body .ttd {
            font-size: 24px;
        }

        .certificate-body .date {
            font-size: 24px;
            margin-top: 100px;
        }
        .certificate-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
        .certificate-footer p {
            font-size: 14px;
            margin: 0;
        }
        .certificate-signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
        }
        .certificate-signature div {
            text-align: center;
        }
        .certificate-signature img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="certificate-container" id="certificate">
        <div class="certificate">
            <div class="certificate-header">
                <h1>Sertifikat {{ ucfirst($data->category) }}</h1>
            </div>
            <div class="certificate-body">
                <p class="nomor" style="font-size: 32px;">No Sertifikat: {{ $data->no_certificate }}</p>
                <p class="bridging">Diberikan Kepada :</p>
                <p class="name">{{ $data->name }} </p>
                {{-- <p class="body">{!! $data->body !!}</p> --}}
                 <p class="body"></p>
                <p class="date">Jakarta, {{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</p>
                <p class="ttd">Ketua Aspro SDMA</p>
                <div class="qr">{{ $qr }}</div>
            </div>
            <div class="certificate-footer">
             
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        window.onload = function () {
            const { jsPDF } = window.jspdf;

            html2canvas(document.getElementById('certificate')).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('l', 'pt', [canvas.width, canvas.height]);
                pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save('Sertifikat - {{ $data->name }}.pdf');
            });
        };
    </script>
</body>
</html>
