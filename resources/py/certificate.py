import sys
import fitz  # PyMuPDF
import os
import io
import qrcode

def generate_qr_pixmap(data, size=80):
    qr = qrcode.make(data)
    img_bytes = io.BytesIO()
    qr.save(img_bytes, format="PNG")
    img_bytes.seek(0)

    img_doc = fitz.open("png", img_bytes)
    page = img_doc[0]

    rect = page.rect
    scale_x = size / rect.width
    scale_y = size / rect.height

    matrix = fitz.Matrix(scale_x, scale_y)
    pix = page.get_pixmap(matrix=matrix)
    return pix

def main():
    if len(sys.argv) < 2:
        print("Usage: python generate_certificate.py <pdf_template_path> key=value ...")
        sys.exit(1)

    pdf_template_path = sys.argv[1]
    args = {key: value for key, value in (arg.split('=') for arg in sys.argv[2:])}

    data = {
        "#nomor": args.get("nomor", ""),
        "#nama": args.get("nama", ""),
        "#qr": args.get("qr", ""),
        "$file": args.get("file", "sertifikat.pdf"),
    }

    doc = fitz.open(pdf_template_path)
    page = doc[0]

    # Sisipkan QR code tepat di tengah anchor #qr
    if data["#qr"]:
        qr_areas = page.search_for("#qr")
        if qr_areas:
            for area in qr_areas:
                page.add_redact_annot(area, fill=(1, 1, 1))
                page.apply_redactions()

                qr_size = 80
                qr_pixmap = generate_qr_pixmap(data["#qr"], size=qr_size)

                # Hitung tengah anchor, lalu tempatkan QR di situ
                center_x = (area.x0 + area.x1) / 2
                center_y = (area.y0 + area.y1) / 2
                qr_rect = fitz.Rect(
                    center_x - qr_size / 2,
                    center_y - qr_size / 2,
                    center_x + qr_size / 2,
                    center_y + qr_size / 2
                )

                page.insert_image(qr_rect, pixmap=qr_pixmap)

    font_settings = {
        "#nomor": {"fontsize": 20, "fontname": "helv", "color": (0, 0, 0), "y_offset": 15},
        "#nama": {"fontsize": 24, "fontname": "helv", "color": (0, 0, 0), "y_offset": 15},
    }

    for anchor, value in data.items():
        if anchor in ["#qr", "$file"]:
            continue

        areas = page.search_for(anchor)
        if areas:
            for area in areas:
                page.add_redact_annot(area, fill=(1, 1, 1))
                page.apply_redactions()

                settings = font_settings.get(anchor, {})
                fontsize = settings.get("fontsize", 12)
                fontname = settings.get("fontname", "helv")
                color = settings.get("color", (0, 0, 0))
                y_offset = settings.get("y_offset", 10)

                font = fitz.Font(fontname=fontname)
                text_width = font.text_length(value, fontsize=fontsize)

                center_x = (area.x0 + area.x1) / 2
                x = center_x - (text_width / 2)
                y = area.y0 + y_offset

                page.insert_text((x, y), value, fontsize=fontsize, fontname=fontname, color=color)

    output_dir = "storage/app/documents/"
    os.makedirs(output_dir, exist_ok=True)
    output_path = os.path.join(output_dir, data["$file"])
    doc.save(output_path, garbage=4, deflate=True)
    doc.close()

    print(f"Sertifikat berhasil dibuat: {output_path}")

if __name__ == "__main__":
    main()
