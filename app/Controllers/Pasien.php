<?php

namespace App\Controllers;

use App\Models\KesimpulanModel;
use App\Models\PasienModel;
use App\Models\LaboratModel;
use App\Models\MasterlabModel;
use App\Models\PeriksaModel;

// Kelas Pasien
class Pasien extends BaseController
{
    protected $pasienModel;

    public function index()
    {
        $data = ['title' => 'Home'];
        return view('pasien/home', $data);
    }
    // Method Construct Untuk Model
    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->laboratModel = new LaboratModel();
        $this->masterlabModel = new MasterlabModel();
        $this->PeriksaModel = new PeriksaModel();
        $this->KesimpulanModel = new KesimpulanModel();
    }



    // Method Untuk Menampilkan Tabel
    // public function indexpasien()
    // {
    //     // Perintah Menampilkan Semua Tabel
    //     $Pasien = $this->pasienModel->findAll();

    //     $data = [
    //         'title' => 'Pasien',
    //         'pasien' => $Pasien
    //     ];

    //     return view('pasien/indexpasien', $data);
    // }


    // public function pdf($id = NULL)
    // {
    //     $Pdf = $this->pasienModel->CetakPdfPx($id);
    //     $data = [
    //         'title' => 'Tampil Detail Pasien',
    //         'PdfLab' => $Pdf
    //     ];
    //     dd($data);
    //     return view('pdf/indexlaborat', $data);
    // }


    // Method Untuk Insert Data|
    // public function createpasien()
    // {
    //     // Validasi Data
    //     $data = [
    //         'title' => 'Form Tambah Data Pasien',
    //         'validation' => \Config\Services::validation()
    //     ];

    //     return view('pasien/createpasien', $data);
    // }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    // public function savepasien()
    // {
    //validasi input
    // if (!$this->validate(
    //     [
    //         'NO_RM' => 'required',
    //         'NAMA_PASIEN' => 'required',
    //         'TANGGAL_LAHIR' => 'required',
    //         'JENIS_KELAMIN' => 'required',
    //         'PERUSAHAAN' => 'required',
    //         'NIK' => 'required',
    //         'DEPARTEMEN' => 'required',
    //         'BAGIAN' => 'required'

    //     ]
    // )) {
    // Validasi
    //     $validation = \Config\Services::validation();
    //     return redirect()->to('/pasien/createpasien')->withInput()->with('validation', $validation);
    // }


    // Request Untuk Data Mana Yang Akan Diisi
    // $SLUG = url_title($this->request->getVar('NAMA_PASIEN'), '-', true);
    // $this->pasienModel->save([
    //     'NO_RM' => $this->request->getVar('NO_RM'),
    //     'NAMA_PASIEN' => $this->request->getVar('NAMA_PASIEN'),
    //     'SLUG' => $SLUG,
    //     'TANGGAL_LAHIR' => $this->request->getVar('TANGGAL_LAHIR'),
    //     'JENIS_KELAMIN' => $this->request->getVar('JENIS_KELAMIN'),
    //     'PERUSAHAAN' => $this->request->getVar('PERUSAHAAN'),
    //     'NIK' => $this->request->getVar('NIK'),
    //     'DEPARTEMEN' => $this->request->getVar('DEPARTEMEN'),
    //     'BAGIAN' => $this->request->getVar('BAGIAN')
    // ]);

    // Session Notifikasi Data Berhasil di Input
    // session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

    // Mengembalikan Ke Halaman pasien Setelah Input Data
    //     return redirect()->to('/pasien/indexpasien');
    // }


    // Method Delete
    // public function deletepasien($id)
    // {
    //     $model = new PasienModel();
    //     $model->delete($id);

    // Session Notifikasi Data Berhasil di Input
    // session()->setFlashdata('pesan', 'data berhasil dihapus!');
    // Mengembalikan Ke Halaman Awal
    //     return redirect()->to('/pasien/indexpasien');
    // }


    // Method Edit
    // public function editpasien($id = NULL)
    // {
    // Validasi Data
    //     $model = new PasienModel();
    //     $pasien = $model->find($id);
    //     $data = [
    //         'title' => 'Form Ubah Data Pasien',
    //         'pasien' => $pasien,
    //         'validation' => \Config\Services::validation()
    //     ];

    //     return view('pasien/editpasien', $data);
    // }


    // public function updatepasien($id)
    // {
    //validasi Update
    // if (!$this->validate(
    //     [
    //         'NO_RM' => 'required',
    //         'NAMA_PASIEN' => 'required',
    //         'TANGGAL_LAHIR' => 'required',
    //         'JENIS_KELAMIN' => 'required',
    //         'PERUSAHAAN' => 'required',
    //         'NIK' => 'required',
    //         'DEPARTEMEN' => 'required',
    //         'BAGIAN' => 'required'
    //     ]
    // )) {
    // Validasi
    //     $validation = \Config\Services::validation();
    //     return redirect()->to('/pasien/editpasien/' . $this->request->getVar('ID_PASIEN'))->withInput()->with('validation', $validation);
    // }


    // Request Untuk Data Mana Yang Akan Diisi
    // $SLUG = url_title($this->request->getVar('NAMA_PASIEN'), '-', true);
    // $this->pasienModel->save([
    //     'ID_PASIEN' => $id,
    //     'NO_RM' => $this->request->getVar('NO_RM'),
    //     'NAMA_PASIEN' => $this->request->getVar('NAMA_PASIEN'),
    //     'SLUG' => $SLUG,
    //     'TANGGAL_LAHIR' => $this->request->getVar('TANGGAL_LAHIR'),
    //     'JENIS_KELAMIN' => $this->request->getVar('JENIS_KELAMIN'),
    //     'PERUSAHAAN' => $this->request->getVar('PERUSAHAAN'),
    //     'NIK' => $this->request->getVar('NIK'),
    //     'DEPARTEMEN' => $this->request->getVar('DEPARTEMEN'),
    //     'BAGIAN' => $this->request->getVar('BAGIAN')
    // ]);

    // Session Notifikasi Data Berhasil di Input
    // session()->setFlashdata('pesan', 'data berhasil Diubah!');

    // Mengembalikan Ke Halaman pasien Setelah Input Data
    //     return redirect()->to('/pasien/indexpasien');
    // }


    // ============================================================Periksa====================================================================



    public function indexperiksa()
    {
        // Perintah Menampilkan Semua Tabel
        $Periksa = $this->PeriksaModel->getPeriksa();

        $data = [
            'title' => 'Periksa',
            'Periksa' => $Periksa
        ];

        return view('pasien/indexperiksa', $data);
    }

    // Method Detail Periksa
    public function detailperiksa($id = NULL)
    {
        // Parsing Data
        // $Periksa = $this->PeriksaModel->DetailPeriksa($id); //Mengambil fungsi getDropdownPasien di model pasien
        $Periksa = $this->PeriksaModel->DetailPeriksa($id);
        $data = [
            'title' => 'Tampil Detail Pasien',
            'Periksa' => $Periksa
        ];
        // dd($data);
        return view('pasien/IndexDetailPeriksa', $data);
    }


    // Method Untuk Insert Data
    public function createperiksa()
    {
        // Validasi Data
        $pasien = $this->pasienModel->getDropdownPasien();
        $data = [
            'title' => 'Form Tambah Data Periksa Fisik',
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        return view('pasien/createperiksa', $data);
    }

    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function saveperiksa()
    {
        //validasi input
        if (!$this->validate(
            [
                'NO_RM' => 'required',
                'BATUK_DARAH' => 'required',
                'KENCING_BATU' => 'required',
                'HEPATITIS' => 'required',
                'HERNIA' => 'required',
                'HIPERTENSI' => 'required',
                'HEMORROID' => 'required',
                'DIABETES' => 'required',
                'TINGGI_BADAN' => 'required',
                'BERAT_BADAN' => 'required',
                'NADI' => 'required',
                'TEKANAN_DARAH' => 'required',
                'VISUS' => 'required',
                'BUTA_WARNA' => 'required',
                'JULING' => 'required',
                'KELAINAN_MATA_LAIN' => 'required',
                'TELINGA_LUAR' => 'required',
                'TELINGA_TENGAH' => 'required',
                'GIGI' => 'required',
                'PARU' => 'required',
                'JANTUNG' => 'required',
                'HATI' => 'required',
                'LIMPA' => 'required',
                'EKSTRIMITAS' => 'required',
                'KESEIMBANGAN' => 'required',
                'EXIM' => 'required',
                'DERMATITIS' => 'required'

            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/pasien/createperiksa')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('BATUK_DARAH'), '-', true);
        $this->PeriksaModel->save([
            'ID-PASIEN' => $this->request->getVar('NO_RM'),
            'BATUK_DARAH' => $this->request->getVar('BATUK_DARAH'),
            'KENCING_BATU' => $this->request->getVar('KENCING_BATU'),
            'SLUG' => $SLUG,
            'HEPATITIS' => $this->request->getVar('HEPATITIS'),
            'HERNIA' => $this->request->getVar('HERNIA'),
            'HIPERTENSI' => $this->request->getVar('HIPERTENSI'),
            'HEMORROID' => $this->request->getVar('HEMORROID'),
            'DIABETES' => $this->request->getVar('DIABETES'),
            'TINGGI_BADAN' => $this->request->getVar('TINGGI_BADAN'),
            'BERAT_BADAN' => $this->request->getVar('BERAT_BADAN'),
            'NADI' => $this->request->getVar('NADI'),
            'TEKANAN_DARAH' => $this->request->getVar('TEKANAN_DARAH'),
            'VISUS' => $this->request->getVar('VISUS'),
            'BUTA_WARNA' => $this->request->getVar('BUTA_WARNA'),
            'JULING' => $this->request->getVar('JULING'),
            'KELAINAN_MATA_LAIN' => $this->request->getVar('KELAINAN_MATA_LAIN'),
            'TELINGA_LUAR' => $this->request->getVar('TELINGA_LUAR'),
            'TELINGA_TENGAH' => $this->request->getVar('TELINGA_TENGAH'),
            'GIGI' => $this->request->getVar('GIGI'),
            'PARU' => $this->request->getVar('PARU'),
            'JANTUNG' => $this->request->getVar('JANTUNG'),
            'HATI' => $this->request->getVar('HATI'),
            'LIMPA' => $this->request->getVar('LIMPA'),
            'EKSTRIMITAS' => $this->request->getVar('EKSTRIMITAS'),
            'KESEIMBANGAN' => $this->request->getVar('KESEIMBANGAN'),
            'EXIM' => $this->request->getVar('EXIM'),
            'DERMATITIS' => $this->request->getVar('DERMATITIS')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/pasien/indexperiksa');
    }


    // Method Delete
    public function deleteperiksa($id)
    {
        $model = new PeriksaModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/pasien/indexperiksa');
    }


    // Method Edit
    public function editperiksa($id = NULL)
    {
        // Validasi Data
        $pasien = $this->pasienModel->getDropdownPasien(); //Mengambil fungsi getDropdownPasien di model pasien
        $model = new PeriksaModel();
        $periksa = $model->find($id);

        $data = [
            'title' => 'Form Ubah Data Periksa Fisik',
            'periksa' => $periksa,
            'validation' => \Config\Services::validation(),
            'pasien' => $pasien
        ];

        return view('pasien/editperiksa', $data);
    }


    public function updateperiksa($id)
    {

        //validasi Update
        if (!$this->validate(
            [
                'NO_RM' => 'required',
                'BATUK_DARAH' => 'required',
                'KENCING_BATU' => 'required',
                'HEPATITIS' => 'required',
                'HERNIA' => 'required',
                'HIPERTENSI' => 'required',
                'HEMORROID' => 'required',
                'DIABETES' => 'required',
                'TINGGI_BADAN' => 'required',
                'BERAT_BADAN' => 'required',
                'NADI' => 'required',
                'TEKANAN_DARAH' => 'required',
                'VISUS' => 'required',
                'BUTA_WARNA' => 'required',
                'JULING' => 'required',
                'KELAINAN_MATA_LAIN' => 'required',
                'TELINGA_LUAR' => 'required',
                'TELINGA_TENGAH' => 'required',
                'GIGI' => 'required',
                'PARU' => 'required',
                'JANTUNG' => 'required',
                'HATI' => 'required',
                'LIMPA' => 'required',
                'EKSTRIMITAS' => 'required',
                'KESEIMBANGAN' => 'required',
                'EXIM' => 'required',
                'DERMATITIS' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/pasien/editperiksa/' . $this->request->getVar('ID_PERIKSA'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('BATUK_DARAH'), '-', true);
        $this->PeriksaModel->save([
            'ID_PERIKSA' => $id,
            'ID-PASIEN' => $this->request->getVar('NO_RM'), //Menampilkan No Rekmaedis Berdasarkan Id Pasien
            'BATUK_DARAH' => $this->request->getVar('BATUK_DARAH'),
            'KENCING_BATU' => $this->request->getVar('KENCING_BATU'),
            'SLUG' => $SLUG,
            'HEPATITIS' => $this->request->getVar('HEPATITIS'),
            'HERNIA' => $this->request->getVar('HERNIA'),
            'HIPERTENSI' => $this->request->getVar('HIPERTENSI'),
            'HEMORROID' => $this->request->getVar('HEMORROID'),
            'DIABETES' => $this->request->getVar('DIABETES'),
            'TINGGI_BADAN' => $this->request->getVar('TINGGI_BADAN'),
            'BERAT_BADAN' => $this->request->getVar('BERAT_BADAN'),
            'NADI' => $this->request->getVar('NADI'),
            'TEKANAN_DARAH' => $this->request->getVar('TEKANAN_DARAH'),
            'VISUS' => $this->request->getVar('VISUS'),
            'BUTA_WARNA' => $this->request->getVar('BUTA_WARNA'),
            'JULING' => $this->request->getVar('JULING'),
            'KELAINAN_MATA_LAIN' => $this->request->getVar('KELAINAN_MATA_LAIN'),
            'TELINGA_LUAR' => $this->request->getVar('TELINGA_LUAR'),
            'TELINGA_TENGAH' => $this->request->getVar('TELINGA_TENGAH'),
            'GIGI' => $this->request->getVar('GIGI'),
            'PARU' => $this->request->getVar('PARU'),
            'JANTUNG' => $this->request->getVar('JANTUNG'),
            'HATI' => $this->request->getVar('HATI'),
            'LIMPA' => $this->request->getVar('LIMPA'),
            'EKSTRIMITAS' => $this->request->getVar('EKSTRIMITAS'),
            'KESEIMBANGAN' => $this->request->getVar('KESEIMBANGAN'),
            'EXIM' => $this->request->getVar('EXIM'),
            'DERMATITIS' => $this->request->getVar('DERMATITIS')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/pasien/indexperiksa');
    }


    // ===========================================================Kesimpulan===================================================================


    public function indexkesimpulan()
    {
        // Perintah Menampilkan Semua Tabel
        $Kesimpulan = $this->KesimpulanModel->getKesimpulan();

        $data = [
            'title' => 'Kesimpulan',
            'Kesimpulan' => $Kesimpulan
        ];

        return view('pasien/indexkesimpulan', $data);
    }

    // Method Detail Periksa
    public function detailkesimpulan($id = NULL)
    {
        // Parsing Data
        // $Periksa = $this->PeriksaModel->DetailPeriksa($id); //Mengambil fungsi getDropdownPasien di model pasien
        $Kesimpulan = $this->KesimpulanModel->DetailKesimpulan($id);
        $data = [
            'title' => 'Tampil Detail Pasien',
            'Kesimpulan' => $Kesimpulan
        ];

        return view('pasien/IndexDetailKesimpulan', $data);
    }


    // Method Untuk Insert Data
    public function createkesimpulan()
    {
        // Validasi Data
        $pasien = $this->pasienModel->getDropdownPasien();
        $data = [
            'title' => 'Form Tambah Data Periksa Fisik',
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        return view('pasien/createkesimpulan', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function savekesimpulan()
    {
        //validasi input
        if (!$this->validate(
            [
                'NO_RM' => 'required',
                'PEMERIKSAAN_FISIK' => 'required',
                'FOTO_THORAX' => 'required',
                'LABORATORIUM' => 'required',
                'SARAN' => 'required',
                'IMT' => 'required',
                'TATALAKSANA' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/pasien/createkesimpulan')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('PEMERIKSAAN_FISIK'), '-', true);
        $this->KesimpulanModel->save([
            'ID_PASIEN' => $this->request->getVar('NO_RM'),
            'PEMERIKSAAN_FISIK' => $this->request->getVar('PEMERIKSAAN_FISIK'),
            'FOTO_THORAX' => $this->request->getVar('FOTO_THORAX'),
            'LABORATORIUM' => $this->request->getVar('LABORATORIUM'),
            'SARAN' => $this->request->getVar('SARAN'),
            'IMT' => $this->request->getVar('IMT'),
            'TATALAKSANA' => $this->request->getVar('TATALAKSANA')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/pasien/indexkesimpulan');
    }


    // Method Delete
    public function deletekesimpulan($id)
    {
        $model = new KesimpulanModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/pasien/indexkesimpulan');
    }


    // Method Edit
    public function editkesimpulan($id = NULL)
    {
        // Validasi Data
        $pasien = $this->pasienModel->getDropdownPasien(); //Mengambil fungsi getDropdownPasien di model pasien
        $model = new KesimpulanModel();
        $Kesimpulan = $model->find($id);

        $data = [
            'title' => 'Form Ubah Data Kesimpulan',
            'Kesimpulan' => $Kesimpulan,
            'validation' => \Config\Services::validation(),
            'pasien' => $pasien
        ];

        return view('pasien/editkesimpulan', $data);
    }


    public function updatekesimpulan($id)
    {

        //validasi Update
        if (!$this->validate(
            [
                'NO_RM' => 'required',
                'PEMERIKSAAN_FISIK' => 'required',
                'FOTO_THORAX' => 'required',
                'LABORATORIUM' => 'required',
                'SARAN' => 'required',
                'IMT' => 'required',
                'TATALAKSANA' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/pasien/editkesimpulan/' . $this->request->getVar('ID_KESIMPULAN'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('PEMERIKSAAN_FISIK'), '-', true);
        $this->KesimpulanModel->save([
            'ID_KESIMPULAN' => $id,
            'ID_PASIEN' => $this->request->getVar('NO_RM'),
            'SLUG' => $SLUG,
            'PEMERIKSAAN_FISIK' => $this->request->getVar('PEMERIKSAAN_FISIK'),
            'FOTO_THORAX' => $this->request->getVar('FOTO_THORAX'),
            'LABORATORIUM' => $this->request->getVar('LABORATORIUM'),
            'SARAN' => $this->request->getVar('SARAN'),
            'IMT' => $this->request->getVar('IMT'),
            'TATALAKSANA' => $this->request->getVar('TATALAKSANA')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/pasien/indexkesimpulan');
    }
}
