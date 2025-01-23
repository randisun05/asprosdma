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
            font-size: 36px;
            margin: 0;
        }
        .certificate-body {
            text-align: center;
        }
        .certificate-body p {
            font-size: 18px;
            margin: 10px 0;
        }
        .certificate-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
        .certificate-footer p {
            font-size: 16px;
            margin: 0;
        }
        .certificate-signature {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
        }
        .certificate-signature div {
            text-align: center;
        }
        .certificate-signature img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="certificate-container" id="certificate">
        <div class="certificate">
            <div class="certificate-body">
            </div>
        </div>
    </div>
    <button id="downloadBtn">Download PDF</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;

            // Pilih elemen sertifikat
            const certificate = document.getElementById('certificate');

            // Konversi elemen sertifikat ke canvas
            html2canvas(certificate).then(canvas => {
                const imgData = canvas.toDataURL('image/png');

                // Buat PDF
                const pdf = new jsPDF({
                    orientation: 'landscape',
                    unit: 'px',
                    format: 'a4'
                });

                // Tambahkan gambar ke PDF
                const width = pdf.internal.pageSize.getWidth();
                const height = pdf.internal.pageSize.getHeight();
                pdf.addImage(imgData, 'PNG', 0, 0, width, height);

                // Unduh PDF
                pdf.save('sertifikat.pdf');
            });
        });
    </script>
</body>
</html>
