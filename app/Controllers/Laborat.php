<?php

namespace App\Controllers;

use App\Models\LaboratModel;
use App\Models\PasienModel;
use App\Models\MasterlabModel;

// Kelas Laborat
class Laborat extends BaseController
{
    protected $laboratModel;

    public function index()
    {
        $data = ['title' => 'Home'];
        return view('laborat/home', $data);
    }
    // Method Construct Untuk Model
    public function __construct()
    {
        $this->laboratModel = new LaboratModel();
        $this->PasienModel = new PasienModel();
        $this->MasterlabModel = new MasterlabModel();
    }



    // Method Untuk Menampilkan Tabel
    public function indexlaborat()
    {
        // Perintah Menampilkan Semua Tabel
        $Laborat = $this->laboratModel->getLaborat();

        $data = [
            'title' => 'Laborat',
            'laborat' => $Laborat
        ];

        return view('laborat/indexlaborat', $data);
    }


    // public function pdf($id = NULL)
    // {
    //     $Pdf = $this->laboratModel->CetakPdf($id);
    //     $data = [
    //         'title' => 'Tampil Detail Pasien',
    //         'PdfLab' => $Pdf
    //     ];
    //     dd($data);
    //     return view('pdf/indexlaborat', $data);
    // }


    // Method Untuk Insert Data
    public function createlaborat()
    {
        // session();
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien(); // Mengambil Data Pasien
        $masterlab = $this->MasterlabModel->getDropdownMasterlab(); // Mengambil Data MasterLab
        $data = [
            'title' => 'Form Tambah Data Laborat',
            'pasien' => $pasien, // Parsing data pasien untuk ditampilkan di view
            'masterlab' => $masterlab,
            'validation' => \Config\Services::validation()
        ];

        return view('laborat/createlaborat', $data);
    }


    public function savelaborat()
    {
        //validasi input
        if (!$this->validate(
            [
                'TIPE_PERIKSA_LAB' => 'required',
                'HASIL_LAB' => 'required',
                'BIAYA_LAB' => 'required',
                'NO_RM' => 'required',
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/laborat/createlaborat')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('HASIL_LAB'), '-', true);
        $this->laboratModel->save([
            'ID_MASTERLAB' => $this->request->getVar('TIPE_PERIKSA_LAB'),
            'ID_PASIEN' => $this->request->getVar('NO_RM'), //Menampilkan No Rekamedis Berdasarkan Id Pasien
            'SLUG_LAB' => $SLUG,
            'HASIL_LAB' => $this->request->getVar('HASIL_LAB'),
            'BIAYA_LAB' => $this->request->getVar('BIAYA_LAB'),
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/laborat/indexlaborat');
    }


    // Method Delete
    public function deletelaborat($id)
    {
        $model = new LaboratModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/laborat/indexlaborat');
    }


    // Method Edit
    public function editlaborat($id = NULL)
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien(); //Mengambil fungsi getDropdownPasien di model pasien
        $masterlab = $this->MasterlabModel->getDropdownMasterlab();
        $model = new LaboratModel();
        $laborat = $model->find($id);

        $data = [
            'title' => 'Form Ubah Data laboratorium',
            'laborat' => $laborat,
            'validation' => \Config\Services::validation(),
            'pasien' => $pasien,
            'masterlab' => $masterlab
        ];

        return view('laborat/editlaborat', $data);
    }


    public function updatelaborat($id)
    {

        //validasi Update
        if (!$this->validate(
            [
                'TIPE_PERIKSA_LAB' => 'required',
                'HASIL_LAB' => 'required',
                'BIAYA_LAB' => 'required',
                'NO_RM' => 'required',
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/laborat/editlaborat/' . $this->request->getVar('ID_LABORAT'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('HASIL_LAB'), '-', true);
        $this->laboratModel->save([
            'ID_LABORAT' => $id,
            'ID_PASIEN' => $this->request->getVar('NO_RM'), //Menampilkan No Rekmaedis Berdasarkan Id Pasien
            'ID_MASTERLAB' => $this->request->getVar('TIPE_PERIKSA_LAB'),
            'SLUG_LAB' => $SLUG,
            'HASIL_LAB' => $this->request->getVar('HASIL_LAB'),
            'BIAYA_LAB' => $this->request->getVar('BIAYA_LAB'),
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/laborat/indexlaborat');
    }

    // ============================================================Masterlab===================================================================


    public function indexmasterlab()
    {
        // Perintah Menampilkan Semua Tabel
        $MasterLab = $this->MasterlabModel->findAll();

        $data = [
            'title' => 'Master Laboratorium',
            'masterlab' => $MasterLab
        ];

        return view('laborat/indexmasterlab', $data);
    }


    // Method Untuk Insert Data|
    public function createmasterlab()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Master Laboratorium',
            'validation' => \Config\Services::validation()
        ];

        return view('laborat/createmasterlab', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function savemasterlab()
    {
        //validasi input
        if (!$this->validate(
            [
                'TIPE_PERIKSA_LAB' => 'required'

            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/laborat/createmasterlab')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_LAB'), '-', true);
        $this->MasterlabModel->save([
            'TIPE_PERIKSA_LAB' => $this->request->getVar('TIPE_PERIKSA_LAB')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman masterlab Setelah Input Data
        return redirect()->to('/laborat/indexmasterlab');
    }


    // Method Delete
    public function deletemasterlab($id)
    {
        $model = new MasterlabModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/laborat/indexmasterlab');
    }


    // Method Edit
    public function editmasterlab($id = NULL)
    {
        // Validasi Data
        $model = new MasterLabModel();
        $masterlab = $model->find($id);
        $data = [
            'title' => 'Form Ubah Data Master Laboratorium',
            'masterlab' => $masterlab,
            'validation' => \Config\Services::validation()
        ];

        return view('laborat/editmasterlab', $data);
    }


    public function updatemasterlab($id)
    {
        //validasi Update
        if (!$this->validate(
            [
                'TIPE_PERIKSA_LAB' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/laborat/editmasterlab/' . $this->request->getVar('ID_MASTERLAB'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_LAB'), '-', true);
        $this->MasterlabModel->save([
            'ID_MASTERLAB' => $id,
            'TIPE_PERIKSA_LAB' => $this->request->getVar('TIPE_PERIKSA_LAB')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman Masterlab Setelah Input Data
        return redirect()->to('/laborat/indexmasterlab');
    }
}
