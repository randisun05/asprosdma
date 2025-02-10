import sys
import fitz  # PyMuPDF

def main():
    if len(sys.argv) != 4:
        print("Usage: python find_text_position.py <fullPath> <qrCodePath> <anchor>")
        sys.exit(1)

    # Tangkap parameter dari PHP
    pdf_path = sys.argv[1]     # Path ke dokumen PDF
    qr_code_path = sys.argv[2] # Path penyimpanan QR Code
    anchor_text = sys.argv[3]  # Teks anchor yang dicari


    # Buka dokumen PDF
    doc = fitz.open(pdf_path)

    # Cari teks anchor di semua halaman
    text_instances = []
    for page_num in range(len(doc)):
        page = doc[page_num]
        found_instances = page.search_for(anchor_text)
        if found_instances:
            text_instances.extend(found_instances)
            break  # Hentikan pencarian setelah menemukan teks anchor

    # Jika ditemukan, ganti dengan QR Code
    if text_instances:
        rect = text_instances[0]  # Ambil koordinat pertama
        # Atur ukuran kotak menjadi 30x30
        rect = fitz.Rect(rect.x0, rect.y0, rect.x0 + 70, rect.y0 + 70)
        page.insert_image(rect, filename=qr_code_path)

        # Simpan dokumen yang sudah dimodifikasi
        output_path = pdf_path.replace(".pdf", "_ttd.pdf")
        doc.save(output_path)
        print(f"QR Code berhasil disisipkan! Dokumen disimpan di: {output_path}")
    else:
        print("Anchor text tidak ditemukan!")

    doc.close()

if __name__ == "__main__":
    main()
