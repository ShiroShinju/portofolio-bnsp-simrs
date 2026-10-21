<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PENGKAJIAN AWAL KEPERAWATAN RAWAT INAP NON JIWA</title>
    <style>
        @page {
            size: 210mm 330mm; /* Standar Ukuran Kertas F4 / Folio Grhasia */
            margin: 4mm 6mm 4mm 6mm; /* Mengurangi margin agar tidak memicu overflow ke halaman baru */
        }
        @media print {
            .page-break {
                page-break-after: always;
            }
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8pt;
            color: #000;
            line-height: 1.15;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        .table-fixed {
            table-layout: fixed;
            width: 100%;
        }
        th, td {
            vertical-align: top;
            padding: 2px 3px;
        }
        .table-border, .table-border th, .table-border td {
            border: 1px solid #000;
        }
        .inner-borderless, .inner-borderless td, .inner-borderless th {
            border: none !important;
            border-collapse: collapse;
        }
        .header-title {
            background-color: #d9d9d9;
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
            padding: 4px;
            border: 1px solid #000;
        }
        .section-header {
            background-color: #f0f0f0;
            font-weight: bold;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 2px 4px;
        }
        .box-pasien {
            border: 1.5px solid #000;
            padding: 3px;
            border-radius: 4px;
            min-height: 55px;
        }
        .cb-box {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1px solid #000;
            text-align: center;
            line-height: 11px;
            font-size: 9.5pt;
            font-weight: bold;
            font-family: DejaVu Sans, Arial;
            margin-right: 5px;
            vertical-align: 0.5px;
        }
        .footer-dokumen {
            font-size: 8pt;
            font-weight: bold;
            text-align: right;
            margin-top: 5px;
        }
    </style>
</head>
<body>

@php
    function getVal($item, ...$ids) {
        foreach ($ids as $id) {
            if ($id !== null && isset($item[$id]) && $item[$id] !== '' && $item[$id] !== null) {
                return is_array($item[$id]) ? ($item[$id]['text'] ?? '') : $item[$id];
            }
        }
        return '';
    }

    function isChecked($item, ...$ids) {
        foreach ($ids as $id) {
            if ($id !== null && isset($item[$id])) {
                $v = $item[$id];
                if (!empty($v) && $v != '0' && $v !== 'false' && $v !== false && $v !== 'undefined') {
                    return true;
                }
            }
        }
        return false;
    }

    function renderCB($item, ...$ids) {
        if (isChecked($item, ...$ids)) {
            return '<span class="cb-box">&#10004;</span>';
        }
        return '<span class="cb-box">&nbsp;</span>';
    }
@endphp


<div>
    <!-- ==================== KOP SURAT RESMI RSJ GRHASIA ==================== -->
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 5px;">
        <tr>
            <!-- 1. Logo Pemda DIY (Kiri) -->
            <td width="10%" style="text-align: left; vertical-align: middle;">
                <img src="img/diy.png" alt="Logo DIY" style="width: 55px; height: auto;">
            </td>

            <!-- 2. Teks Kop RS (Tengah) -->
            <td width="46%" style="text-align: center; vertical-align: middle; padding: 0 4px;">
                <div style="font-size: 8pt; font-weight: bold; letter-spacing: 0.1px; line-height: 1.15;">
                    PEMERINTAH DAERAH DAERAH ISTIMEWA YOGYAKARTA
                </div>
                <div style="font-size: 8pt; font-weight: bold; line-height: 1.15;">
                    DINAS KESEHATAN
                </div>
                <div style="font-size: 9.5pt; font-weight: bold; line-height: 1.2; margin-top: 1px;">
                    RUMAH SAKIT JIWA GRHASIA
                </div>
                <img src="img/aksara_jawa-com.png" alt="Aksara Jawa" style="width: 115px; height: auto; margin: 1px 0;"><br>
                <div style="font-size: 6.2pt; line-height: 1.15; color: #000;">
                    Jalan Kaliurang KM 17 Sleman, Kode Pos 55582, Telepon: (0274) 895143, 895297<br>
                    Faksimile: (0274) 895142, Pos-el: <a href="mailto:grhasiamentalhospital@jogjaprov.go.id" style="color: #0000ee; text-decoration: underline;">grhasiamentalhospital@jogjaprov.go.id</a><br>
                    Laman: grhasia.jogjaprov.go.id
                </div>
            </td>

            <!-- 3. Logo RSJ Grhasia Full (Kanan Teks) -->
            <td width="12%" style="text-align: center; vertical-align: middle;">
                <img src="img/logo_grhasia_full.png" alt="Logo Grhasia" style="width: 75px; height: auto;">
            </td>

            <!-- 4. Kotak Identitas Pasien (Paling Kanan) -->
            <td width="32%" style="vertical-align: middle; padding-left: 6px;">
                <div style="border: 1px solid #000; padding: 3px 5px; font-size: 7.5pt; line-height: 1.25;">
                    <table style="width: 100%; border: none;">
                        <tr>
                            <td style="border: none; padding: 1px 0; width: 35%;">Nomor RM</td>
                            <td style="border: none; padding: 1px 0; width: 4%;">:</td>
                            <td style="border: none; padding: 1px 0;"><b>{!! $data[0]->nocm ?? '-' !!}</b></td>
                        </tr>
                        <tr>
                            <td style="border: none; padding: 1px 0;">Nama Pasien</td>
                            <td style="border: none; padding: 1px 0;">:</td>
                            <td style="border: none; padding: 1px 0;"><b>{!! $data[0]->namapasien ?? '-' !!}</b></td>
                        </tr>
                        <tr>
                            <td style="border: none; padding: 1px 0;">Tanggal lahir</td>
                            <td style="border: none; padding: 1px 0;">:</td>
                            <td style="border: none; padding: 1px 0;">{!! !empty($data[0]->tgllahir) ? date('d-m-Y', strtotime($data[0]->tgllahir)) : '-' !!}</td>
                        </tr>
                        <tr>
                            <td style="border: none; padding: 1px 0;">Jenis Kelamin</td>
                            <td style="border: none; padding: 1px 0;">:</td>
                            <td style="border: none; padding: 1px 0;">{!! $data[0]->jeniskelamin ?? '-' !!}</td>
                        </tr>
                    </table>
                    <div style="border-top: 1px solid #000; margin-top: 3px; padding-top: 2px; font-size: 5.8pt; font-style: italic; color: #333; text-align: center;">
                        (Mohon diisi huruf kapital atau tempelkan stiker jika ada)
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <div class="header-title">
        PENGKAJIAN AWAL KEPERAWATAN RAWAT INAP NON JIWA
    </div>

    <!-- ==================== BAGIAN 1 - 4: PEMERIKSAAN AWAL ==================== -->
    <table class="table-border table-fixed" style="margin-top: 3px;">
        <!-- BARIS: Tanggal & Jam Pemeriksaan -->
        <tr>
            <td colspan="3" style="padding: 3px 6px; font-size: 8pt;">
                @php
                    $rawMulai = getVal($item, 3016000);
                    $tglMulai = '';
                    $jamMulai = '';
                    if (!empty($rawMulai)) {
                        $tsMulai = strtotime($rawMulai);
                        if ($tsMulai) {
                            $tglMulai = date('d-m-Y', $tsMulai);
                            $jamMulai = date('H:i', $tsMulai);
                        } else {
                            $pecah = explode(' ', trim($rawMulai));
                            $tglMulai = $pecah[0] ?? $rawMulai;
                            $jamMulai = $pecah[1] ?? '';
                        }
                    }
                @endphp
                Mulai Pemeriksaan Tanggal : <b>{!! $tglMulai ?: '................................' !!}</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Jam : <b>{!! $jamMulai ?: '................' !!}</b>
            </td>
        </tr>

        <!-- BARIS HEADER 1: Keluhan Saat Ini / Alasan Masuk -->
        <tr>
            <td colspan="3" style="background-color: #dcdcdc; font-weight: bold; font-size: 8.5pt; padding: 2.5px 5px;">
                1. Keluhan Saat Ini / Alasan Masuk
            </td>
        </tr>
        <!-- ISI BAGIAN 1 -->
        <tr>
            <td colspan="3" style="min-height: 32px; padding: 4px 6px; font-size: 7.5pt; line-height: 1.35;">
                {!! nl2br(getVal($item, 3016001)) ?: '................................................................................................................................................................' !!}
            </td>
        </tr>

        <!-- BARIS HEADER 2: Faktor Predisposisi (Membentang Penuh 3 Kolom) -->
        <tr>
            <td colspan="3" style="background-color: #dcdcdc; font-weight: bold; font-size: 8.5pt; padding: 2.5px 5px;">
                2. Faktor Predisposisi
            </td>
        </tr>
        <!-- ISI BAGIAN 2: 3 Kolom Bersih Tanpa Garis Vertikal Pemisah -->
        <tr>
            <td colspan="3" style="padding: 4px 8px;">
                <table style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>
                        <!-- Predisposisi Kolom 1 (33%) -->
                        <td width="33%" style="border: none; padding: 1px 4px; vertical-align: top; font-size: 7.5pt; line-height: 1.45;">
                            {!! renderCB($item, 3016003) !!} Gangguan jiwa di masa lalu<br>
                            {!! renderCB($item, 3016006) !!} Genetik<br>
                            {!! renderCB($item, 3016009) !!} Trauma kepala<br>
                            {!! renderCB($item, 3016012) !!} Kejang<br>
                            {!! renderCB($item, 3016015) !!} Riwayat konsumsi minuman keras<br>
                            {!! renderCB($item, 3016020) !!} Riwayat penyalahgunaan NAPZA
                        </td>
                        <!-- Predisposisi Kolom 2 (33%) -->
                        <td width="33%" style="border: none; padding: 1px 4px; vertical-align: top; font-size: 7.5pt; line-height: 1.45;">
                            {!! renderCB($item, 3016004) !!} Introvert<br>
                            {!! renderCB($item, 3016007) !!} Pola asuh<br>
                            {!! renderCB($item, 3016010) !!} Kegagalan tumbuh kembang<br>
                            {!! renderCB($item, 3016013) !!} Pengalaman traumatis<br>
                            {!! renderCB($item, 3016016) !!} {!! getVal($item, 3016016) ?: '............................................................' !!}<br>
                            {!! renderCB($item, 3016019) !!} {!! getVal($item, 3016019) ?: '............................................................' !!}
                        </td>
                        <!-- Predisposisi Kolom 3 (34%) -->
                        <td width="34%" style="border: none; padding: 1px 4px; vertical-align: top; font-size: 7.5pt; line-height: 1.45;">
                            {!! renderCB($item, 3016005) !!} Konflik dengan lingkungan<br>
                            {!! renderCB($item, 3016008) !!} Konflik dalam pekerjaan<br>
                            {!! renderCB($item, 3016011) !!} Konflik keluarga<br>
                            {!! renderCB($item, 3016014) !!} Konflik pendidikan<br>
                            {!! renderCB($item, 3016017) !!} Konflik perkawinan<br>
                            {!! renderCB($item, 3016021, 3016022) !!} {!! getVal($item, 3016021, 3016022) ?: '............................................................' !!}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- BARIS HEADER 3: Faktor Presipitasi (Membentang Penuh 3 Kolom) -->
        <tr>
            <td colspan="3" style="background-color: #dcdcdc; font-weight: bold; font-size: 8.5pt; padding: 2.5px 5px;">
                3. Faktor Presipitasi
            </td>
        </tr>
        <!-- ISI BAGIAN 3 -->
        <tr>
            <td colspan="3" style="min-height: 24px; padding: 4px 6px; font-size: 7.5pt; line-height: 1.35;">
                {!! nl2br(getVal($item, 3016023)) ?: '................................................................................................................................................................' !!}
            </td>
        </tr>

        <!-- BARIS HEADER 4: Pemeriksaan Fisik (Membentang Penuh 3 Kolom) -->
        <tr>
            <td colspan="3" style="background-color: #dcdcdc; font-weight: bold; font-size: 8.5pt; padding: 2.5px 5px;">
                4. Pemeriksaan Fisik
            </td>
        </tr>
        <!-- ISI BAGIAN 4 -->
        <tr>
            <td colspan="3" style="padding: 5px 6px; font-size: 7.5pt; line-height: 1.45;">
                <!-- Tabel 5 Kolom: Menyebarkan TD, N, RR, T, SaO2 Merata 100% Lebar -->
                <table style="width: 100%; border-collapse: collapse; border: none; margin-bottom: 4px;">
                    <tr>
                        <td width="20%" style="border: none; padding: 0;">TD: <b>{!! getVal($item, 3016025) ?: '.........' !!}</b> mmHg</td>
                        <td width="20%" style="border: none; padding: 0;">N: <b>{!! getVal($item, 3016026) ?: '.........' !!}</b> x/menit</td>
                        <td width="20%" style="border: none; padding: 0;">RR: <b>{!! getVal($item, 3016027) ?: '.........' !!}</b> x/menit</td>
                        <td width="20%" style="border: none; padding: 0;">T: <b>{!! getVal($item, 3016028) ?: '.........' !!}</b> &deg;C</td>
                        <td width="20%" style="border: none; padding: 0;">SaO2: <b>{!! getVal($item, 3016029) ?: '.........' !!}</b> %</td>
                    </tr>
                </table>
                <!-- Kondisi Fisik Satu Baris Langsung -->
                <b>Kondisi Fisik:</b> {!! getVal($item, 3016030) ?: '................................................................................................................................................................' !!}
            </td>
        </tr>
    </table>

    <!-- ============================================================== -->
    <!--                      SKALA NYERI (FULL WIDTH)                  -->
    <!-- ============================================================== -->
    <table class="table-border table-fixed" style="margin-top: 3px;">
        <!-- HEADER SKALA NYERI -->
        <tr>
            <td colspan="2" style="background-color: #dcdcdc; font-weight: bold; font-size: 8.5pt; text-align: center; padding: 2.5px 5px;">
                SKALA NYERI
            </td>
        </tr>

        <!-- SUB-BAGIAN 1: NUMERIC -->
        <tr>
            <td colspan="2" style="padding: 2px 6px; border-bottom: 1px solid #000;">
                <div style="font-weight: bold; font-size: 8pt; margin-bottom: 1px;">NUMERIC</div>
                <table style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>
                        <!-- Kolom Diagram Numeric (56%) - Naik ke atas & Center -->
                        <td width="56%" style="border: none; padding: 0; vertical-align: top; text-align: center;">
                            <img src="img/skalanyeri/numericPainRatingScale_HD.png" alt="Numeric Scale" style="width: 300px; height: auto;">
                        </td>
                        <!-- Kolom Checkbox Score Numeric (44%) - Naik ke atas & Sejajar Judul Gambar -->
                        <td width="44%" style="border: none; padding-left: 10px; padding-top: 1px; vertical-align: top; font-size: 7.5pt; line-height: 1.35;">
                            <b>Score</b><br>
                            {!! renderCB($item, 3016033) !!} 0 = Tidak Nyeri<br>
                            {!! renderCB($item, 3016034) !!} 1 - 3 = Nyeri Ringan<br>
                            {!! renderCB($item, 3016035) !!} 4 - 6 = Nyeri Sedang<br>
                            {!! renderCB($item, 3016036) !!} 7 - 10 = Nyeri Berat
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- SUB-BAGIAN 2: WONG BAKER FACES -->
        <tr>
            <td colspan="2" style="padding: 3px 6px; border-bottom: 1px solid #000;">
                <div style="font-weight: bold; font-size: 8pt; margin-bottom: 2px;">WONG BAKER FACES</div>
                <table style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>
                        <!-- Kolom Wajah Wong Baker (55%) -->
                        <td width="55%" style="border: none; padding: 2px 0; vertical-align: middle;">
                            <table style="width: 100%; border-collapse: collapse; border: none; text-align: center;">
                                <tr>
                                    <td width="16.6%" style="border: none; padding: 0;"><img src="img/skalanyeri/1.png" style="height: 22px; width: auto;" alt="0"></td>
                                    <td width="16.6%" style="border: none; padding: 0;"><img src="img/skalanyeri/2.png" style="height: 22px; width: auto;" alt="2"></td>
                                    <td width="16.6%" style="border: none; padding: 0;"><img src="img/skalanyeri/3.png" style="height: 22px; width: auto;" alt="4"></td>
                                    <td width="16.6%" style="border: none; padding: 0;"><img src="img/skalanyeri/4.png" style="height: 22px; width: auto;" alt="6"></td>
                                    <td width="16.6%" style="border: none; padding: 0;"><img src="img/skalanyeri/5.png" style="height: 22px; width: auto;" alt="8"></td>
                                    <td width="16.6%" style="border: none; padding: 0;"><img src="img/skalanyeri/6.png" style="height: 22px; width: auto;" alt="10"></td>
                                </tr>
                                <tr style="font-size: 6.5pt; font-weight: bold; line-height: 1.1;">
                                    <td style="border: none; padding-top: 1px;">0</td>
                                    <td style="border: none; padding-top: 1px;">1 2 3</td>
                                    <td style="border: none; padding-top: 1px;">4</td>
                                    <td style="border: none; padding-top: 1px;">5 6 7</td>
                                    <td style="border: none; padding-top: 1px;">8</td>
                                    <td style="border: none; padding-top: 1px;">9 10</td>
                                </tr>
                                <tr style="font-size: 5pt; line-height: 1.1; vertical-align: top;">
                                    <td style="border: none; padding-top: 1px;">Tidak<br>Nyeri</td>
                                    <td style="border: none; padding-top: 1px;">Sedikit<br>Nyeri</td>
                                    <td style="border: none; padding-top: 1px;">Agak<br>mengganggu</td>
                                    <td style="border: none; padding-top: 1px;">Mengganggu<br>aktivitas</td>
                                    <td style="border: none; padding-top: 1px;">Sangat<br>mengganggu</td>
                                    <td style="border: none; padding-top: 1px;">Tak Ter-<br>tahankan</td>
                                </tr>
                            </table>
                        </td>

                        <!-- Kolom Checkbox Score Wong Baker (45%) -->
                        <td width="45%" style="border: none; padding-left: 15px; vertical-align: middle; font-size: 7.5pt; line-height: 1.35;">
                            <b>Score</b><br>
                            {!! renderCB($item, 3016038) !!} 0 = Tidak Ada Nyeri<br>
                            {!! renderCB($item, 3016039) !!} 1 - 2 - 3 = Sedikit Nyeri<br>
                            {!! renderCB($item, 3016040) !!} 4 = Agak mengganggu<br>
                            {!! renderCB($item, 3016041) !!} 5 - 6 - 7 = Mengganggu aktivitas<br>
                            {!! renderCB($item, 3016042) !!} 8 = Sangat mengganggu<br>
                            {!! renderCB($item, 3016043) !!} 9 - 10 = Tak Tertahankan
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- BARIS: Lokasi, Durasi, Frekuensi Merata 3 Kolom -->
        <tr>
            <td colspan="2" style="padding: 4px 8px; font-size: 7.5pt;">
                <table style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>
                        <td width="33%" style="border: none; padding: 0;"><b>Lokasi:</b> {!! getVal($item, 3016044) ?: '..............................' !!}</td>
                        <td width="33%" style="border: none; padding: 0;"><b>Durasi:</b> {!! getVal($item, 3016045) ?: '..............................' !!}</td>
                        <td width="34%" style="border: none; padding: 0;"><b>Frekuensi:</b> {!! getVal($item, 3016046) ?: '..............................' !!}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- ============================================================== -->
    <!--              PENILAIAN RISIKO JATUH (FULL WIDTH)               -->
    <!-- ============================================================== -->
    <table class="table-border table-fixed" style="margin-top: 3px;">
        <!-- HEADER PENILAIAN RISIKO JATUH -->
        <tr>
            <td colspan="3" style="background-color: #dcdcdc; font-weight: bold; font-size: 8.5pt; text-align: center; padding: 2.5px 5px;">
                PENILAIAN RISIKO JATUH
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 5px 8px; font-size: 7.5pt; line-height: 1.45;">
                <div style="font-weight: bold; margin-bottom: 2px;">MORSE (Dewasa)</div>
                <table style="width: 100%; border-collapse: collapse; border: none; margin-bottom: 4px;">
                    <tr>
                        <td width="35%" style="border: none; padding: 0;">{!! renderCB($item, 3016049) !!} Tidak ada risiko jatuh : 0 - 24</td>
                        <td width="35%" style="border: none; padding: 0;">{!! renderCB($item, 3016050) !!} Risiko jatuh rendah : 25 - 44</td>
                        <td width="30%" style="border: none; padding: 0;">{!! renderCB($item, 3016051) !!} Risiko jatuh tinggi : &gt;= 45</td>
                    </tr>
                </table>

                <div style="font-weight: bold; margin-bottom: 2px;">HUMPTY DUMPTY (Anak)</div>
                <table style="width: 100%; border-collapse: collapse; border: none;">
                    <tr>
                        <td width="35%" style="border: none; padding: 0;">{!! renderCB($item, 3016053) !!} Risiko jatuh rendah : 7 - 11</td>
                        <td width="65%" style="border: none; padding: 0;">{!! renderCB($item, 3016054) !!} Risiko jatuh tinggi : &gt;= 12</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- ============================================================== -->
    <!--            SKRINING RISIKO NUTRISIONAL   -->
    <!-- ============================================================== -->
    <table class="table-border table-fixed" style="margin-top: 3px;">
        <tr style="background-color: #f0f0f0; text-align: center; font-weight: bold;">
            <td colspan="2">SKRINING RISIKO NUTRISIONAL</td>
        </tr>
        <tr>
            <!-- ===================== KOLOM KIRI: ANAK (50%) ===================== -->
            <td width="50%" style="vertical-align: top; padding: 2px;">
                <div style="font-weight: bold; text-align: center; font-size: 7.5pt; margin-bottom: 2px;">ANAK</div>
                <table class="table-border" style="width: 100%; font-size: 6.5pt; border-collapse: collapse;">
                    <tr style="background-color: #f5f5f5; font-weight: bold; text-align: center;">
                        <td width="7%">NO</td>
                        <td width="65%">VARIABEL</td>
                        <td width="28%">SKOR</td>
                    </tr>
                    <tr style="background-color: #fafafa; font-weight: bold;">
                        <td colspan="3">A. Dijawab oleh tenaga kesehatan</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">1.</td>
                        <td>Apakah ada penyakit yang mendasari dengan risiko malnutrisi atau apakah ada pembedahan besar?</td>
                        <td>
                            {!! renderCB($item, 3016058) !!} a. Tidak (0)<br>
                            {!! renderCB($item, 3016059) !!} b. Ya (2)
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2.</td>
                        <td>Apakah pasien dalam kondisi status gizi buruk berdasarkan pemeriksaan klinis secara subyektif?</td>
                        <td>
                            {!! renderCB($item, 3016060) !!} a. Tidak (0)<br>
                            {!! renderCB($item, 3016061) !!} b. Ya (1)
                        </td>
                    </tr>
                    <tr style="background-color: #fafafa; font-weight: bold;">
                        <td colspan="3">B. Dijawab oleh pengasuh anak</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">1.</td>
                        <td>Apakah hal-hal dibawah ini ditemukan pada anak?<br>
                            a. Diare &gt;5x/hari / muntah &gt;3x/hari<br>
                            b. Penurunan asupan makan beberapa hari<br>
                            c. Ketidakcukupan asupan gizi sakit
                        </td>
                        <td>
                            {!! renderCB($item, 3016062) !!} a. Tidak (0)<br>
                            {!! renderCB($item, 3016063) !!} b. Ya (1)
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2.</td>
                        <td>Apakah ada penurunan berat badan atau tidak ada penambahan BB (bayi &lt;1 th)?</td>
                        <td>
                            {!! renderCB($item, 3016064) !!} a. Tidak (0)<br>
                            {!! renderCB($item, 3016065) !!} b. Ya (1)
                        </td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td colspan="2" style="text-align: right;">TOTAL SKOR ANAK :</td>
                        <td style="text-align: center; font-size: 7pt;">{!! getVal($item, 3016066) ?: '0' !!}</td>
                    </tr>
                </table>
                <div style="font-size: 6pt; margin-top: 2px; line-height: 1.1;">
                    <b>KESIMPULAN :</b><br>
                    <b>Skor 0</b> = Risiko rendah, tidak ada intervensi gizi diperlukan<br>
                    <b>Skor 1 - 3</b> = Risiko sedang, konsultasikan dokter/ahli gizi<br>
                    <b>Skor 4 - 5</b> = Risiko tinggi, konsultasikan dokter & ahli gizi
                </div>
            </td>

            <!-- ===================== KOLOM KANAN: DEWASA (50%) ===================== -->
            <td width="50%" style="vertical-align: top; padding: 2px;">
                <div style="font-weight: bold; text-align: center; font-size: 7.5pt; margin-bottom: 2px;">DEWASA</div>
                <table class="table-border" style="width: 100%; font-size: 6.5pt; border-collapse: collapse;">
                    <tr style="background-color: #f5f5f5; font-weight: bold; text-align: center;">
                        <td width="7%">NO</td>
                        <td width="53%">VARIABEL</td>
                        <td width="40%">SKOR</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">1.</td>
                        <td>
                            Apakah anda kehilangan berat badan (BB) secara tidak sengaja?<br>
                            <i>Jika Ya, berapa banyak atau berapa kg kehilangan BB:</i>
                        </td>
                        <td>
                            {!! renderCB($item, 3016068) !!} a. Tidak (0)<br>
                            {!! renderCB($item, 3016069, 3016074) !!} b. Ragu-ragu (2)<br>
                            {!! renderCB($item, 3016070) !!} c. 1 - 5 kg (1)<br>
                            {!! renderCB($item, 3016071) !!} d. 6 - 10 kg (2)<br>
                            {!! renderCB($item, 3016072) !!} e. 11 - 15 kg (3)<br>
                            {!! renderCB($item, 3016073) !!} f. &gt; 15 kg (4)
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2.</td>
                        <td>Apakah Anda mengalami penurunan asupan makan karena penurunan nafsu makan?</td>
                        <td>
                            {!! renderCB($item, 3016075) !!} a. Tidak (0)<br>
                            {!! renderCB($item, 3016076) !!} b. Ragu-ragu (2)
                        </td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td colspan="2" style="text-align: right;">TOTAL SKOR DEWASA :</td>
                        <td style="text-align: center; font-size: 7pt;">{!! getVal($item, 3016077) ?: '0' !!}</td>
                    </tr>
                </table>

                @php
                    // Deteksi diagnosa khusus yang tercentang/diisi
                    $diagList = [];
                    if (isChecked($item, 3014905, 3016080, 3018425)) $diagList[] = 'DM';
                    if (isChecked($item, 3014906, 3016081, 3018426)) $diagList[] = 'Hipertensi';
                    if (isChecked($item, 3014907, 3016082, 3018427)) $diagList[] = 'Geriatri';
                    if (isChecked($item, 3014908, 3016083, 3018428)) $diagList[] = 'Infeksi TB';
                    if (isChecked($item, 3014909, 3016084, 3018429)) $diagList[] = 'Infeksi Hepatitis';
                    
                    // Teks tambahan dari textbox lain-lain / sebutkan (jika ada)
                    $diagLain = trim(getVal($item, 3014911, 3016085, 3016086, 3018431));
                    if (!empty($diagLain)) {
                        $diagList[] = $diagLain;
                    }
                    
                    $hasKhusus = isChecked($item, 3014903, 3016078, 3018423) || !empty($diagList);
                    $isTidakKhusus = isChecked($item, 3014904, 3016079, 3018424);
                    
                    $sebutkanText = !empty($diagList) ? implode(', ', $diagList) : 'TIDAK ADA';
                @endphp

                <!-- 3. Pasien dengan Diagnosa Khusus -->
                <div style="font-size: 6.5pt; margin-top: 3px; line-height: 1.35;">
                    <b>3. Pasien dengan diagnosa khusus :</b>
                    <span class="cb-box">{!! $hasKhusus ? '&#10004;' : '&nbsp;' !!}</span> Ya &nbsp;&nbsp;
                    <span class="cb-box">{!! ($isTidakKhusus && empty($diagList)) || (!$hasKhusus && $isTidakKhusus) ? '&#10004;' : '&nbsp;' !!}</span> Tidak<br>
                    <span style="font-style: italic; color: #444;">(DM / Hipertensi / Geriatri / Infeksi TB / Infeksi Hepatitis / Lain-lain)</span><br>
                    Sebutkan : <b>{{ $sebutkanText }}</b>
                </div>

                <!-- KESIMPULAN DEWASA -->
                <div style="font-size: 6.5pt; margin-top: 3px; line-height: 1.25; border-top: 0.5px solid #ccc; padding-top: 2px;">
                    <b>KESIMPULAN :</b><br>
                    *) Bila skor <u>&gt;</u> 2 dan atau pasien dengan diagnosis / kondisi khusus, kolaborasi dengan dokter dan atau dengan ahli gizi
                </div>
            </td>
        </tr>

        <!-- ===================== BARIS BAWAH: GERIATRI >= 60 TAHUN ===================== -->
        <tr>
            <td colspan="2" style="padding: 2px 3px;">
                <div style="font-weight: bold; text-align: center; font-size: 7.5pt; margin-bottom: 2px;">
                    GERIATRI &gt;= 60 TAHUN (MINI NUTRITIONAL ASSESSMENT / MNA)
                </div>
                                <table style="width: 100%; border-collapse: collapse; font-size: 6.5pt;">
                    <tr>
                        <!-- Tabel Pertanyaan Geriatri (72%) -->
                        <td width="72%" style="vertical-align: top; padding: 0;">
                            <table class="table-border" style="width: 100%; font-size: 6.5pt; border-collapse: collapse;">
                                <tr style="background-color: #f5f5f5; font-weight: bold; text-align: center;">
                                    <td width="5%" style="padding: 1.5px 2px;">NO</td>
                                    <td width="42%" style="padding: 1.5px 2px;">PERTANYAAN / KRITERIA</td>
                                    <td width="53%" style="padding: 1.5px 2px;">PILIHAN JAWABAN</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">A</td>
                                    <td style="padding: 1.5px 2px;">Apakah asupan makanan berkurang selama 3 bulan terakhir?</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016407, 3019658, 3018539) !!} 0 = Asupan makanan sangat berkurang<br>
                                        {!! renderCB($item, 3016408, 3019659, 3018540) !!} 1 = Asupan makanan agak berkurang<br>
                                        {!! renderCB($item, 3016409, 3019660, 3018541) !!} 2 = Asupan makanan tidak berkurang
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">B</td>
                                    <td style="padding: 1.5px 2px;">Berat badan turun selama 3 bulan terakhir?</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016411, 3019662, 3018543) !!} 0 = Berat badan turun lebih dari 3 kg<br>
                                        {!! renderCB($item, 3016412, 3019663, 3018544) !!} 1 = Tidak tahu<br>
                                        {!! renderCB($item, 3016413, 3019664, 3018545) !!} 2 = Berat badan turun antara 1 hingga 3 kg<br>
                                        {!! renderCB($item, 3016414, 3019665, 3018546) !!} 3 = Berat badan tidak turun
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">C</td>
                                    <td style="padding: 1.5px 2px;">Pergerakan atau Mobilitas?</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016416, 3019667, 3018548) !!} 0 = Terbatas di tempat tidur atau kursi<br>
                                        {!! renderCB($item, 3016417, 3019668, 3018549) !!} 1 = Mampu bangun dari tempat tidur/kursi, tapi tidak bisa keluar<br>
                                        {!! renderCB($item, 3016418, 3019669, 3018550) !!} 2 = Dapat bepergian ke luar rumah
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">D</td>
                                    <td style="padding: 1.5px 2px;">Mengalami tekanan psikologis atau penyakit akut (3 bulan terakhir)?</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016420, 3019671, 3018552) !!} 0 = Ya &nbsp;&nbsp;&nbsp;&nbsp;
                                        {!! renderCB($item, 3016421, 3019672, 3018553) !!} 2 = Tidak
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">E</td>
                                    <td style="padding: 1.5px 2px;">Gangguan neuropsikologis</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016423, 3019674, 3018555) !!} 0 = Demensia berat atau depresi<br>
                                        {!! renderCB($item, 3016424, 3019675, 3018556) !!} 1 = Demensia ringan<br>
                                        {!! renderCB($item, 3016425, 3019676, 3018557) !!} 2 = Tidak ada gangguan psikologis
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">F1</td>
                                    <td style="padding: 1.5px 2px;">Indeks Massa Tubuh (IMT)</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016427, 3019678, 3018559) !!} 0 = IMT kurang dari 19<br>
                                        {!! renderCB($item, 3016428, 3019679, 3018560) !!} 1 = IMT 19 hingga kurang dari 21<br>
                                        {!! renderCB($item, 3016429, 3019680, 3018561) !!} 2 = IMT 21 hingga kurang dari 23<br>
                                        {!! renderCB($item, 3016430, 3019681, 3018562) !!} 3 = IMT 23 atau lebih besar
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; padding: 1.5px 2px;">F2</td>
                                    <td style="padding: 1.5px 2px;">Lingkar lengan atas (LiLA) jika tidak dapat diukur IMT</td>
                                    <td style="line-height: 1.2; padding: 1.5px 2px;">
                                        {!! renderCB($item, 3016432, 3019683, 3018564) !!} 0,0 = LiLA kurang dari 21<br>
                                        {!! renderCB($item, 3016433, 3019684, 3018565) !!} 0,5 = LiLA 21 hingga 22<br>
                                        {!! renderCB($item, 3016434, 3019685, 3018566) !!} 1,0 = LiLA lebih dari 22
                                    </td>
                                </tr>
                                <!-- Baris TOTAL SKOR di Paling Bawah Tabel -->
                                <tr style="font-weight: bold; background-color: #fafafa;">
                                    <td colspan="2" style="text-align: right; padding: 2px 5px;">TOTAL SKOR MNA (Max. 14) :</td>
                                    <td style="text-align: center; font-size: 7.5pt; padding: 2px;">
                                        {!! getVal($item, 3016435, 3018567, 3019686) ?: '.....' !!}
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <!-- Box Interpretasi Geriatri (28%) Tetap di Samping Kanan -->
                        <td width="28%" style="vertical-align: top; padding-left: 6px;">
                            <div style="border: 1px solid #000; padding: 4px; font-size: 6.5pt; line-height: 1.35;">
                                <b>KESIMPULAN (MNA) :</b><br>
                                <b>12 - 14 poin</b> : Status gizi normal<br>
                                <b>8 - 11 poin</b> : Malnutrisi / Risiko malnutrisi<br>
                                <b>0 - 7 poin</b> : Malnutrisi
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- ========================================================================= -->
    <!-- ALTERNATIF 1: HALAMAN 2 (5 s/d 8 di Kiri | 9 s/d 13 di Kanan)             -->
    <!-- ========================================================================= -->
    <table class="table-fixed" style="width: 100%; border-collapse: collapse; border: 1px solid #000; margin-top: 4px;">
        <tr>
            <!-- KOLOM KIRI HALAMAN 2: 5, 6, 7, 8 -->
            <td width="50%" style="padding: 0; vertical-align: top; border-right: 1px solid #000;">
                
                <!-- 5. Kebutuhan Tidur -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    5. Kebutuhan Tidur
                </div>
                <div style="padding: 3px 5px; font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none;">
                        <tr>
                            <td style="width: 50%; padding: 1px 0; border: none;">{!! renderCB($item, 3016088) !!} Tidak ada gangguan</td>
                            <td style="width: 50%; padding: 1px 0; border: none;">{!! renderCB($item, 3016091) !!} Kesulitan memulai tidur</td>
                        </tr>
                        <tr>
                            <td style="padding: 1px 0; border: none;">{!! renderCB($item, 3016089) !!} Sering terjaga</td>
                            <td style="padding: 1px 0; border: none;">{!! renderCB($item, 3016092) !!} Ketidakpuasan tidur</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 1px 0; border: none;">{!! renderCB($item, 3016090) !!} Perubahan pola tidur</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 1px 0; border: none;">{!! renderCB($item, 3016093) !!} Tidur malam pukul {!! getVal($item, 3016094) ?: '.......' !!} sd {!! getVal($item, 3016095) ?: '.......' !!}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 1px 0; border: none;">{!! renderCB($item, 3016096) !!} Tidur siang pukul {!! getVal($item, 3016097) ?: '.......' !!} sd {!! getVal($item, 3016098) ?: '.......' !!}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 1px 0; border: none;"><span class="cb-box">&nbsp;</span> Jelaskan : ................................................................</td>
                        </tr>
                    </table>
                </div>

                <!-- 6. Perawatan Diri -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    6. Perawatan Diri
                </div>
                <div style="font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    <div style="padding: 3px 6px; border-bottom: 1px solid #000;">
                        <div style="padding-left: 10px; margin-bottom: 2px;">a. Mandi</div>
                        <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none; margin-left: 15px;">
                            <tr>
                                <td style="width: 30%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016101) !!} Mandiri</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016102) !!} Bantuan minimal</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016103) !!} Bantuan total</td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding: 3px 6px; border-bottom: 1px solid #000;">
                        <div style="padding-left: 10px; margin-bottom: 2px;">b. Toileting / eliminasi</div>
                        <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none; margin-left: 15px;">
                            <tr>
                                <td style="width: 30%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016105) !!} Mandiri</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016106) !!} Bantuan minimal</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016107) !!} Bantuan total</td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding: 3px 6px; border-bottom: 1px solid #000;">
                        <div style="padding-left: 10px; margin-bottom: 2px;">c. Berpakaian</div>
                        <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none; margin-left: 15px;">
                            <tr>
                                <td style="width: 30%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016109) !!} Mandiri</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016108, 3016110) !!} Bantuan minimal</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016111) !!} Bantuan total</td>
                            </tr>
                        </table>
                    </div>
                    <div style="padding: 3px 6px;">
                        <div style="padding-left: 10px; margin-bottom: 2px;">d. Makan</div>
                        <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none; margin-left: 15px;">
                            <tr>
                                <td style="width: 30%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016113) !!} Mandiri</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016114) !!} Bantuan minimal</td>
                                <td style="width: 35%; padding: 0.5px 0; border: none;">{!! renderCB($item, 3016115) !!} Bantuan total</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- 7. Minum Obat -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    7. Minum Obat
                </div>
                <div style="padding: 3px 6px; font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none;">
                        <tr>
                            <td style="width: 30%; padding: 1px 0; border: none;">{!! renderCB($item, 3016117) !!} Teratur</td>
                            <td style="width: 35%; padding: 1px 0; border: none;">{!! renderCB($item, 3016118) !!} Tidak teratur</td>
                            <td style="width: 35%; padding: 1px 0; border: none;">{!! renderCB($item, 3016120) !!} Tidak minum</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 1px 0; border: none;">{!! renderCB($item, 3016119) !!} Belum pernah berobat</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 1px 0; border: none;"><span class="cb-box">&nbsp;</span> Jelaskan : ................................................................</td>
                        </tr>
                    </table>
                </div>

                <!-- 8. Konsep Diri -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    8. Konsep Diri
                </div>
                <div style="font-size: 6.3pt; line-height: 1.25;">
                    <div style="padding: 2.5px 5px; border-bottom: 1px solid #000;">
                        <b>a. Gambaran diri / body image</b>
                        <div style="margin-left: 6px; margin-top: 1px;">
                            {!! renderCB($item, 3016125) !!} Mengungkapkan kecacatan<br>
                            {!! renderCB($item, 3016124) !!} Kehilangan bagian tubuh<br>
                            {!! renderCB($item, 3016126) !!} Fungsi atau struktur tubuh berubah atau hilang<br>
                            <span class="cb-box">&nbsp;</span> Jelaskan : ................................................................
                        </div>
                    </div>
                    <div style="padding: 2.5px 5px; border-bottom: 1px solid #000;">
                        <b>b. Identitas / identity</b>
                        <div style="margin-left: 6px; margin-top: 1px;">
                            {!! renderCB($item, 3016129) !!} Menolak dirinya sesuai jenis kelamin<br>
                            {!! renderCB($item, 3016130) !!} Penampilan tidak sesuai jenis kelamin<br>
                            <span class="cb-box">&nbsp;</span> Jelaskan : ................................................................
                        </div>
                    </div>
                    <div style="padding: 2.5px 5px; border-bottom: 1px solid #000;">
                        <b>c. Peran / role</b>
                        <div style="margin-left: 6px; margin-top: 1px;">
                            {!! renderCB($item, 3016134) !!} Overload peran<br>
                            {!! renderCB($item, 3016136) !!} Perubahan peran<br>
                            {!! renderCB($item, 3016133) !!} Transisi peran karena sakit<br>
                            {!! renderCB($item, 3016135) !!} Konflik peran<br>
                            {!! renderCB($item, 3016137) !!} Keraguan peran<br>
                            <span class="cb-box">&nbsp;</span> Jelaskan : ................................................................
                        </div>
                    </div>
                    <div style="padding: 2.5px 5px; border-bottom: 1px solid #000;">
                        <b>d. Ideal diri / self ideal</b>
                        <div style="margin-left: 6px; margin-top: 1px;">
                            {!! renderCB($item, 3016141) !!} Masa depan suram<br>
                            {!! renderCB($item, 3016143) !!} Terserah pada nasib<br>
                            {!! renderCB($item, 3016140) !!} Tidak memiliki harapan<br>
                            {!! renderCB($item, 3016142) !!} Enggan membicarakan masa depan<br>
                            <span class="cb-box">&nbsp;</span> Jelaskan : ................................................................
                        </div>
                    </div>
                    <div style="padding: 2.5px 5px;">
                        <b>e. Harga diri / self esteem</b>
                        <div style="margin-left: 6px; margin-top: 1px;">
                            {!! renderCB($item, 3016146) !!} Menilai diri negative ( misal : tidak berguna )<br>
                            {!! renderCB($item, 3016147) !!} Merasa malu / bersalah<br>
                            {!! renderCB($item, 3016148) !!} Merasa tidak mampu melakukan apapun<br>
                            {!! renderCB($item, 3016149) !!} Meremehkan kemampuan mengatasi masalah<br>
                            {!! renderCB($item, 3016150) !!} Merasa tidak memiliki kelebihan atau kemampuan positif<br>
                            {!! renderCB($item, 3016151) !!} Melebih-lebihkan penilaian negatif tentang diri sendiri<br>
                            {!! renderCB($item, 3016152) !!} Menolak penilaian positif diri sendiri<br>
                            <span class="cb-box">&nbsp;</span> Jelaskan : ................................................................
                        </div>
                    </div>
                </div>
            </td>

            <!-- KOLOM KANAN HALAMAN 2: 9, 10, 11, 12, 13 -->
            <td width="50%" style="padding: 0; vertical-align: top;">
                
                <!-- 9. Sosialisasi -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    9. Sosialisasi
                </div>
                <div style="padding: 2.5px 6px; font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    <div>{!! renderCB($item, 3016155) !!} Menarik diri</div>
                    <div>{!! renderCB($item, 3016154) !!} Berperan aktif</div>
                    <div>{!! renderCB($item, 3016156) !!} Perilaku tidak dapat diterima lingkungan</div>
                    <div>{!! renderCB($item, 3016157) !!} Tidak puas dalam hubungan sosial</div>
                    <div>{!! renderCB($item, 3016158) !!} Merasa berbeda dengan orang lain</div>
                    <div>{!! renderCB($item, 3016159) !!} Tidak percaya diri saat berhadapan dengan orang lain</div>
                    <div>{!! renderCB($item, 3016160) !!} Riwayat ditolak lingkungan sosial</div>
                    <div>{!! renderCB($item, 3016161) !!} Merasa ingin sendiri</div>
                    <div>{!! renderCB($item, 3016162) !!} Merasa tidak nyaman / aman di lingkungan sosial</div>
                    <div>{!! renderCB($item, 3016163) !!} Tidak berminat / menolak interaksi dengan orang lain</div>
                    <div><span class="cb-box">&nbsp;</span> Jelaskan : ................................................................</div>
                </div>

                <!-- 10. Kebutuhan Spiritual -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    10. Kebutuhan Spiritual
                </div>
                <div style="padding: 3px 6px; font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    @php
                        $valSpiritualA = trim(getVal($item, 3016166));
                        $checkedSpiritualA = isChecked($item, 3016165) || !empty($valSpiritualA);
                        $showSpiritualA = $checkedSpiritualA && !empty($valSpiritualA);

                        $valSpiritualB = trim(getVal($item, 3016168));
                        $checkedSpiritualB = isChecked($item, 3016167) || !empty($valSpiritualB);
                        $showSpiritualB = $checkedSpiritualB && !empty($valSpiritualB);
                    @endphp
                    <div>
                        a. {!! renderCB($item, 3016165, !empty($valSpiritualA)) !!} Nilai dan keyakinan yang dianut<br>
                        <div style="margin-left: 14px;">
                            Jelaskan : {!! $showSpiritualA ? '<b>' . e($valSpiritualA) . '</b>' : '................................................................' !!}
                        </div>
                    </div>
                    <div style="margin-top: 2.5px;">
                        b. {!! renderCB($item, 3016167, !empty($valSpiritualB)) !!} Kegiatan ibadah di rumah<br>
                        <div style="margin-left: 14px;">
                            Jelaskan : {!! $showSpiritualB ? '<b>' . e($valSpiritualB) . '</b>' : '................................................................' !!}
                        </div>
                    </div>
                </div>

                <!-- 11. Mekanisme Koping Individu -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    11. Mekanisme Koping Individu
                </div>
                <div style="font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    <table style="width: 100%; border-collapse: collapse; border: none;">
                        <tr>
                            <td style="width: 52%; vertical-align: top; padding: 2.5px 5px; border-right: 1px solid #000;">
                                <div style="font-weight: bold; margin-bottom: 2px;">Adaptif</div>
                                <div>{!! renderCB($item, 3016171) !!} Mampu menyelesaikan masalah</div>
                                <div>{!! renderCB($item, 3016172) !!} Bicara dengan orang lain</div>
                                <div>{!! renderCB($item, 3016173) !!} Aktifitas Konstruktif</div>
                                <div>{!! renderCB($item, 3016174) !!} Teknik relaksasi</div>
                                <div>{!! renderCB($item, 3016175) !!} Olah raga</div>
                                <div><span class="cb-box">&nbsp;</span> Jelaskan : ............................</div>
                            </td>
                            <td style="width: 48%; vertical-align: top; padding: 2.5px 5px;">
                                <div style="font-weight: bold; margin-bottom: 2px;">Maladaptif</div>
                                <div>{!! renderCB($item, 3016177) !!} Menciderai diri dan orang lain</div>
                                <div>{!! renderCB($item, 3016178) !!} Menghindar</div>
                                <div>{!! renderCB($item, 3016179) !!} Bekerja berlebihan</div>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- 12. Keluarga -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    12. Keluarga
                </div>
                <div style="padding: 2.5px 6px; font-size: 6.8pt; line-height: 1.35; border-bottom: 1px solid #000;">
                    <div>{!! renderCB($item, 3016181) !!} Tidak memahami masalah kesehatan pasien</div>
                    <div>{!! renderCB($item, 3016182) !!} Peningkatan gejala pada pasien</div>
                    <div>{!! renderCB($item, 3016183) !!} Kegagalan mengurangi faktor risiko kekambuhan</div>
                    <div>{!! renderCB($item, 3016184) !!} Penolakan keluarga terhadap pasien</div>
                    <div>{!! renderCB($item, 3016185) !!} Kurang perhatian pada penyakit pasien</div>
                    <div>{!! renderCB($item, 3016186) !!} Ketidaktertarikan keluarga terhadap penyakit pasien dan perawatannya</div>
                    <div>{!! renderCB($item, 3016187) !!} Mengungkapkan kesulitan dalam melakukan perawatan terhadap pasien</div>
                    <div><span class="cb-box">&nbsp;</span> Jelaskan : ................................................................</div>
                </div>

                <!-- 13. Kebutuhan Perencanaan Pulang -->
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000;">
                    13. Kebutuhan Perencanaan Pulang
                </div>
                <div style="padding: 3px 6px; font-size: 6.6pt; line-height: 1.3;">
                    <div style="font-weight: bold; margin-bottom: 2px;">Kemampuan klien memenuhi kebutuhan :</div>
                    <div style="font-weight: bold; margin-bottom: 2px;">a. Kegiatan dalam rumah</div>

                    <table style="width: 100%; border-collapse: collapse; border: none; margin-bottom: 3px;">
                        <tr><td colspan="3" style="padding: 0.5px 0 0.5px 10px; border: none;">1. Menyiapkan makanan</td></tr>
                        <tr>
                            <td style="width: 30%; padding: 0.5px 0 1.5px 18px; border: none;">{!! renderCB($item, 3016192) !!} Mandiri</td>
                            <td style="width: 38%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016193) !!} Bantuan minimal</td>
                            <td style="width: 32%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016194) !!} Bantuan total</td>
                        </tr>
                        <tr><td colspan="3" style="padding: 0.5px 0 0.5px 10px; border: none;">2. Perawatan kesehatan</td></tr>
                        <tr>
                            <td style="width: 30%; padding: 0.5px 0 1.5px 18px; border: none;">{!! renderCB($item, 3016196) !!} Mandiri</td>
                            <td style="width: 38%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016197) !!} Bantuan minimal</td>
                            <td style="width: 32%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016198) !!} Bantuan total</td>
                        </tr>
                        <tr><td colspan="3" style="padding: 0.5px 0 0.5px 10px; border: none;">3. Merawat pakaian</td></tr>
                        <tr>
                            <td style="width: 30%; padding: 0.5px 0 1.5px 18px; border: none;">{!! renderCB($item, 3016200) !!} Mandiri</td>
                            <td style="width: 38%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016201) !!} Bantuan minimal</td>
                            <td style="width: 32%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016202) !!} Bantuan total</td>
                        </tr>
                        <tr><td colspan="3" style="padding: 0.5px 0 0.5px 10px; border: none;">4. Merawat tempat tinggal</td></tr>
                        <tr>
                            <td style="width: 30%; padding: 0.5px 0 1.5px 18px; border: none;">{!! renderCB($item, 3016204) !!} Mandiri</td>
                            <td style="width: 38%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016205) !!} Bantuan minimal</td>
                            <td style="width: 32%; padding: 0.5px 0 1.5px 0; border: none;">{!! renderCB($item, 3016206) !!} Bantuan total</td>
                        </tr>
                    </table>

                    <div style="font-weight: bold; margin-bottom: 2px;">b. Kegiatan di luar rumah</div>
                    @php
                        $valUang = strtolower(trim(getVal($item, 3016208)));
                        $isUangMandiri = isChecked($item, 3016208) || $valUang === 'mandiri';
                        $isUangMin = strpos($valUang, 'minimal') !== false;
                        $isUangTot = strpos($valUang, 'total') !== false;

                        $valTrans = strtolower(trim(getVal($item, 3016209)));
                        $isTransMandiri = isChecked($item, 3016209) || $valTrans === 'mandiri';
                        $isTransMin = strpos($valTrans, 'minimal') !== false;
                        $isTransTot = strpos($valTrans, 'total') !== false;
                    @endphp
                    <table style="width: 100%; border-collapse: collapse; border: none; margin-bottom: 2px;">
                        <tr><td colspan="3" style="padding: 0.5px 0 0.5px 10px; border: none;">1. Mengelola uang</td></tr>
                        <tr>
                            <td style="width: 30%; padding: 0.5px 0 1.5px 18px; border: none;"><span class="cb-box">{!! $isUangMandiri ? '&#10004;' : '&nbsp;' !!}</span> Mandiri</td>
                            <td style="width: 38%; padding: 0.5px 0 1.5px 0; border: none;"><span class="cb-box">{!! $isUangMin ? '&#10004;' : '&nbsp;' !!}</span> Bantuan minimal</td>
                            <td style="width: 32%; padding: 0.5px 0 1.5px 0; border: none;"><span class="cb-box">{!! $isUangTot ? '&#10004;' : '&nbsp;' !!}</span> Bantuan total</td>
                        </tr>
                        <tr><td colspan="3" style="padding: 0.5px 0 0.5px 10px; border: none;">2. Melakukan transportasi</td></tr>
                        <tr>
                            <td style="width: 30%; padding: 0.5px 0 1.5px 18px; border: none;"><span class="cb-box">{!! $isTransMandiri ? '&#10004;' : '&nbsp;' !!}</span> Mandiri</td>
                            <td style="width: 38%; padding: 0.5px 0 1.5px 0; border: none;"><span class="cb-box">{!! $isTransMin ? '&#10004;' : '&nbsp;' !!}</span> Bantuan minimal</td>
                            <td style="width: 32%; padding: 0.5px 0 1.5px 0; border: none;"><span class="cb-box">{!! $isTransTot ? '&#10004;' : '&nbsp;' !!}</span> Bantuan total</td>
                        </tr>
                    </table>

                    <div style="margin-top: 3px;">
                        Jelaskan : ................................................................
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <!-- ========================================================================= -->
    <!-- HALAMAN 3: MASALAH KEPERAWATAN (KIRI) | TANDA TANGAN PERAWAT (KANAN)      -->
    <!-- ========================================================================= -->
    <div style="page-break-before: always;"></div>
    <table class="table-fixed" style="width: 100%; border-collapse: collapse; border: 1px solid #000; margin-top: 6px;">
        <tr>
            <!-- SISI KIRI (55%): MASALAH KEPERAWATAN -->
            <td width="55%" style="padding: 0; vertical-align: top; border-right: 1px solid #000;">
                <div style="background-color: #dcdcdc; font-weight: bold; font-size: 7.5pt; padding: 2px 5px; border-bottom: 1px solid #000; text-align: center;">
                    MASALAH KEPERAWATAN
                </div>
                <div style="padding: 3px 5px; font-size: 6.5pt; line-height: 1.35;">
                    <table class="inner-borderless" style="width: 100%; border-collapse: collapse; border: none;">
                        <tr>
                            <td style="width: 50%; vertical-align: top; padding: 0.5px 2px; border: none;">
                                <div>{!! renderCB($item, 3016368) !!} Nyeri akut</div>
                                <div>{!! renderCB($item, 3016371) !!} Nyeri kronis</div>
                                <div>{!! renderCB($item, 3016329) !!} Bersihan jalan nafas tidak efektif</div>
                                <div>{!! renderCB($item, 3016248) !!} Pola nafas tidak efektif</div>
                                <div>{!! renderCB($item, null) !!} Gangguan pertukaran gas</div>
                                <div>{!! renderCB($item, 3016320) !!} Risiko penurunan curah jantung</div>
                                <div>{!! renderCB($item, 3016335) !!} Perfusi perifer tidak efektif</div>
                                <div>{!! renderCB($item, 3016218) !!} Intoleransi aktivitas</div>
                                <div>{!! renderCB($item, null) !!} Gangguan eliminasi urin</div>
                                <div>{!! renderCB($item, null) !!} Retensi urin</div>
                                <div>{!! renderCB($item, 3016374) !!} Inkontinensia urin</div>
                                <div>{!! renderCB($item, null) !!} Konstipasi</div>
                                <div>{!! renderCB($item, 3016356) !!} Risiko jatuh</div>
                                <div>{!! renderCB($item, 3016221) !!} Defisit nutrisi</div>
                            </td>
                            <td style="width: 50%; vertical-align: top; padding: 0.5px 2px; border: none;">
                                <div>{!! renderCB($item, null) !!} Risiko defisit nutrisi</div>
                                <div>{!! renderCB($item, 3016296) !!} Defisit perawatan diri</div>
                                <div>{!! renderCB($item, 3016305) !!} Gangguan pola tidur</div>
                                <div>{!! renderCB($item, 3016245) !!} Risiko cedera</div>
                                <div>{!! renderCB($item, 3016341) !!} Risiko infeksi</div>
                                <div>{!! renderCB($item, 3016332) !!} Ketidakstabilan gula darah</div>
                                <div>{!! renderCB($item, 3016227) !!} Gangguan integritas kulit</div>
                                <div>{!! renderCB($item, 3016362) !!} Hipertermia</div>
                                <div>{!! renderCB($item, 3016215) !!} Diare</div>
                                <div>{!! renderCB($item, 3016359) !!} Hipovolemia</div>
                                <div><span class="cb-box">&nbsp;</span> ................................................................</div>
                                <div><span class="cb-box">&nbsp;</span> ................................................................</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>

            <!-- SISI KANAN (45%): SELESAI PEMERIKSAAN & TANDA TANGAN PERAWAT -->
            <td width="45%" style="padding: 0; vertical-align: bottom;">
                @php
                    $rawSelesai = getVal($item, 3016403);
                    $tglSelesai = '';
                    $jamSelesai = '';
                    if (!empty($rawSelesai)) {
                        $tsSelesai = strtotime($rawSelesai);
                        if ($tsSelesai) {
                            $tglSelesai = date('d-m-Y', $tsSelesai);
                            $jamSelesai = date('H:i', $tsSelesai) . ' WIB';
                        } else {
                            $pecahS = explode(' ', trim($rawSelesai));
                            $tglSelesai = $pecahS[0] ?? $rawSelesai;
                            $jamSelesai = !empty($pecahS[1]) ? $pecahS[1] . ' WIB' : '';
                        }
                    }

                    $rawPerawat = getVal($item, 3016404);
                    $namaPerawat = '';
                    $nipPerawat = '';
                    $idPeg = null;

                    if (!empty($rawPerawat)) {
                        $pecahP = explode('~', $rawPerawat);
                        $namaPerawat = count($pecahP) > 1 ? $pecahP[1] : $rawPerawat;
                        if (is_numeric($pecahP[0])) {
                            $idPeg = $pecahP[0];
                        }
                    } elseif (!empty($data[0]->namaperawat)) {
                        $namaPerawat = $data[0]->namaperawat;
                    }

                    try {
                        $pegObj = null;
                        if (!empty($idPeg)) {
                            $pegObj = \DB::table('pegawai_m')->where('id', $idPeg)->first();
                        } elseif (!empty($namaPerawat)) {
                            $cleanName = trim(preg_replace('/,.*$/', '', $namaPerawat));
                            $pegObj = \DB::table('pegawai_m')
                                ->where(function($q) use ($namaPerawat, $cleanName) {
                                    $q->where('namalengkap', 'ilike', '%' . $cleanName . '%')
                                      ->orWhere('nama', 'ilike', '%' . $cleanName . '%');
                                })->first();
                        }
                        if ($pegObj) {
                            $nipPerawat = $pegObj->nippns ?? $pegObj->nip_pns ?? $pegObj->nip ?? '';
                        }
                    } catch (\Exception $e) {}
                @endphp
                <div style="padding: 10px 12px;">
                    <!-- Selesai Pemeriksaan Tanggal & Jam di Bagian Atas -->
                    <div style="text-align: left; margin-bottom: 25px; font-size: 7.5pt; line-height: 1.4;">
                        Selesai Pemeriksaan Tanggal : <b>{!! $tglSelesai ?: '................................' !!}</b><br>
                        Jam : <b>{!! $jamSelesai ?: '................' !!}</b>
                    </div>

                    <!-- Tanda Tangan Perawat di Dasar Bawah -->
                    <div style="text-align: center; font-size: 7.5pt; margin-top: 30px;">
                        Perawat,<br><br><br><br><br>
                        <b>( {!! !empty($namaPerawat) ? $namaPerawat : '.......................................................' !!} )</b><br>
                        NIP. {!! !empty($nipPerawat) ? $nipPerawat : '...................................................' !!}
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>