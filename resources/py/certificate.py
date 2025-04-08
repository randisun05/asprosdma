import sys
import fitz  # PyMuPDF
import qrcode
from io import BytesIO
from PIL import Image
from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import letter

def find_anchor_positions(pdf_path, anchor_text):
    """Mencari posisi teks anchor dalam PDF."""
    doc = fitz.open(pdf_path)

    for page_num in range(len(doc)):
        page = doc[page_num]
        found_instances = page.search_for(anchor_text)
        if found_instances:
            return page, found_instances[0]  # Ambil hanya instance pertama

    return None, None

def generate_certificate(template_path, data, output_path):
    """Menyesuaikan template sertifikat dengan teks & QR Code."""
    
    # Buka PDF template
    doc = fitz.open(template_path)
    page = doc[0]

    # Tambahkan teks berdasarkan posisi anchor dalam template
    for anchor, text in data.items():
        if anchor == "$qr":
            continue  # QR Code diproses terpisah

        page, rect = find_anchor_positions(template_path, anchor)
        if page and rect:
            page.insert_text((rect.x0, rect.y0), text, fontsize=14)

    # Generate QR Code jika ditemukan anchor `$qr`
    if "$qr" in data:
        qr = qrcode.make(data["$qr"])
        qr_io = BytesIO()
        qr.save(qr_io, format="PNG")
        qr_img = Image.open(qr_io)

        page, rect = find_anchor_positions(template_path, "$qr")
        if page and rect:
            qr_rect = fitz.Rect(rect.x0, rect.y0, rect.x0 + 70, rect.y0 + 70)
            page.insert_image(qr_rect, stream=qr_io)

    # Simpan ke file output
    doc.save(output_path)

if __name__ == "__main__":
    template_path = sys.argv[1]
    output_path = sys.argv[6]  # Argumen terakhir adalah output file

    data = {
        "$no": sys.argv[2],
        "$nama": sys.argv[3],
        "$body": sys.argv[4],
        "$qr": sys.argv[5]
    }

    generate_certificate(template_path, data, output_path)\
    
    print("Arguments received:", sys.argv)  # Debugging jumlah argumen

if len(sys.argv) < 7:
    print("Error: Not enough arguments provided!")
    sys.exit(1)

pdf_path = sys.argv[1]
output_path = sys.argv[-1]  # Argumen terakhir adalah output file

# Debugging: Cek apakah file template ada
if not os.path.exists(pdf_path):
    print(f"Error: Template file {pdf_path} tidak ditemukan!")
    sys.exit(1)

# Buka dokumen PDF
doc = fitz.open(pdf_path)
if len(doc) == 0:
    print("Error: PDF kosong atau tidak bisa dibuka!")
    sys.exit(1)

# Cek apakah teks anchor ditemukan
anchor_texts = ["$no", "$nama", "$body", "$qr"]
found = False

for page_num in range(len(doc)):
    page = doc[page_num]
    for anchor in anchor_texts:
        found_instances = page.search_for(anchor)
        if found_instances:
            print(f"Anchor '{anchor}' ditemukan di halaman {page_num + 1}")
            found = True

if not found:
    print("Error: Tidak ada anchor yang ditemukan di PDF!")
    sys.exit(1)

# Simpan perubahan
doc.save(output_path)
doc.close()
print(f"PDF berhasil disimpan di {output_path}")
