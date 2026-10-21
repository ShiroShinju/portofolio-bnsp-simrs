# Studi Kasus 2: SIMRS RS Jiwa Grhasia Yogyakarta (`#41503`)

* **Nomor Tiket MARK**: `#41503`
* **Judul Tugas**: *Buatkan cetak view form RM.40.02.Rev01 Pengkajian Awal Keperawatan Rawat Inap Non Jiwa 1-2 (BB)*
* **Commit Hash**: `3f2b16325bb96d943e76a69f38aae7c27a7a42e5`

---

## 1. Tangkapan Layar Bukti Pengerjaan

### A. Tiket Penugasan pada Sistem Manajemen Proyek (MARK)
![Tiket MARK 41503](./screenshots/01-tiket-mark-41503.png)

### B. Hasil Cetak Bagian Skrining Risiko Nutrisional (Anak & Dewasa)
![Skrining Nutrisi](./screenshots/02-cetak-skrining-nutrisi.png)

### C. Hasil Cetak Bagian Psikososial, Spiritual & Mekanisme Koping
![Pengkajian Lanjutan](./screenshots/03-cetak-pengkajian-lanjutan.png)

### D. Hasil Cetak Bagian Masalah Keperawatan, Tanggal/Jam Selesai, & Tanda Tangan + NIP Perawat
![Masalah Keperawatan dan TTD](./screenshots/04-cetak-masalah-keperawatan-ttd.png)

---

## 2. Deskripsi Kebutuhan
Membangun tampilan cetak (*print view*) untuk formulir rekam medis **RM.40.02.Rev01 — Pengkajian Awal Keperawatan Rawat Inap Non Jiwa** pada SIMRS RSJ Grhasia Yogyakarta. Dokumen cetak harus presisi mengikuti format standar akreditasi rumah sakit pada ukuran kertas F4/Folio (`210mm x 330mm`), memetakan ratusan atribut pemeriksaan fisik, skala nyeri, risiko jatuh, status fungsional, masalah keperawatan, hingga tanda tangan dan NIP perawat pemeriksa.

---

## 3. Daftar File dalam Folder Ini
1. [`pengkajian-awal-keperawatan-ri-non-jiwa.blade.php`](./pengkajian-awal-keperawatan-ri-non-jiwa.blade.php) — File *template* laporan Laravel Blade (1.135 baris kode).
2. [`PengkajianAwalKeperawatanRINonJiwaCtrl.js`](./PengkajianAwalKeperawatanRINonJiwaCtrl.js) — File *controller* AngularJS yang menghubungkan aksi cetak di frontend ke endpoint report backend (baris `1982–2004`).
3. [`numericPainRatingScale_HD.png`](./numericPainRatingScale_HD.png) — Aset gambar instrumen *Numeric Pain Rating Scale* untuk bagian penilaian nyeri.
4. [`commit-3f2b16325.diff`](./commit-3f2b16325.diff) — File *patch/diff* asli dari Git sebagai bukti pengerjaan.

---

## 4. Cuplikan Implementasi Kode Utama

### A. Fungsi Cetak di Frontend (`PengkajianAwalKeperawatanRINonJiwaCtrl.js`)
```javascript
$scope.cetakBlade = function () {
    var emrId = norecEMR || (cacheHelper.get('cacheNomorEMR') ? cacheHelper.get('cacheNomorEMR')[1] : '');
    if (!emrId) {
        window.messageContainer.error('Silakan SIMPAN data terlebih dahulu sebelum mencetak!');
        return;
    }

    var local = JSON.parse(localStorage.getItem('profile'));
    var localId = local ? local.id : ($scope.cc.kdprofile || 30);
    var currentPegawai = medifirstService.getPegawaiLogin();
    var nama = currentPegawai ? currentPegawai.namaLengkap : '';

    window.open(config.baseApiBackend + 'report/get-cetak-surat-man?nocm='
        + $scope.cc.nocm + '&emr=' + emrId + '&noemr=' + nomorEMR
        + '&emrfk=' + $scope.cc.emrfk
        + '&kdprofile=' + localId
        + '&nama=' + encodeURIComponent(nama)
        + '&blade=pengkajian-awal-keperawatan-ri-non-jiwa', '_blank'
    );
};

$scope.cetakPdf = $scope.cetakBlade;
```

### B. Fungsi Helper Modular di Laravel Blade (`pengkajian-awal-keperawatan-ri-non-jiwa.blade.php`)
```php
function getVal($item, ...$ids) {
    foreach ($ids as $id) {
        if ($id !== null && isset($item[$id]) && $item[$id] !== '' && $item[$id] !== null) {
            return is_array($item[$id]) ? ($item[$id]['text'] ?? '') : $item[$id];
        }
    }
    return '';
}

function renderCB($item, ...$ids) {
    $checked = isChecked($item, ...$ids);
    return '<span class="cb-box">' . ($checked ? '&#10004;' : '&nbsp;') . '</span>';
}
```

### C. Pencarian NIP Perawat Otomatis ke Tabel Master (`pegawai_m`)
```php
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
```
