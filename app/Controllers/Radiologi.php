<?php

namespace App\Controllers;

use App\Models\RadiologiModel;
use App\Models\PasienModel;
use App\Models\MasterradModel;

// Kelas Radiologi
class Radiologi extends BaseController
{
    protected $radiologiModel;

    public function index()
    {
        $data = ['title' => 'Home'];
        return view('radiologi/home', $data);
    }
    // Method Construct Untuk Model
    public function __construct()
    {
        $this->radiologiModel = new RadiologiModel();
        $this->pasienModel = new PasienModel();
        $this->MasterradModel = new MasterradModel();
    }



    // Method Untuk Menampilkan Tabel
    public function indexradiologi()
    {
        // Perintah Menampilkan Semua Tabel
        $Radiologi = $this->radiologiModel->getRadiologi();

        $data = [
            'title' => 'Radiologi',
            'radiologi' => $Radiologi
        ];

        return view('radiologi/indexradiologi', $data);
    }


    // Method Untuk Insert Data
    public function createradiologi()
    {
        // session();
        // Validasi Data
        $pasien = $this->pasienModel->getDropdownPasien(); //Mengambil Data Pasien Dari Model Pasien
        $masterrad = $this->MasterradModel->getDropdownMasterrad();
        $data = [
            'title' => 'Form Tambah Data Radiologi',
            'pasien' => $pasien, //parsing data pasien untuk ditampilkan di view
            'masterrad' => $masterrad,
            'validation' => \Config\Services::validation()
        ];

        return view('radiologi/createradiologi', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    // MENUNGGU DATABASE YANG BENAR
    public function saveradiologi()
    {
        //validasi input
        if (!$this->validate(
            [
                'TIPE_PERIKSA_RAD' => 'required',
                'HASIL_RAD' => 'required',
                // 'BIAYA_RAD' => 'required',
                'NO_RM' => 'required',
                'KESIMPULAN_RAD' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/radiologi/createradiologi')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('HASIL_RAD'), '-', true);
        $this->radiologiModel->save([
            'ID_MASTERRAD' => $this->request->getVar('TIPE_PERIKSA_RAD'),
            'ID_PASIEN' => $this->request->getVar('NO_RM'), //Menampilkan Nama Pasien Berdasarkan Id Pasien
            'SLUG_RAD' => $SLUG,
            'HASIL_RAD' => $this->request->getVar('HASIL_RAD'),
            // 'BIAYA_RAD' => $this->request->getVar('BIAYA_RAD'),
            'KESIMPULAN_RAD' => $this->request->getVar('KESIMPULAN_RAD')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/radiologi/indexradiologi');
    }


    // Method Delete
    public function deleteradiologi($id)
    {
        $model = new RadiologiModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');

        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/radiologi/indexradiologi');
    }


    // Method Edit
    public function editradiologi($id = NULL)
    {
        // Validasi Data
        $pasien = $this->pasienModel->getDropdownPasien(); //Mengambil Data Pasien Dari Models
        $masterrad = $this->MasterradModel->getDropdownMasterrad();
        $model = new RadiologiModel();
        $radiologi = $model->find($id);

        $data = [
            'title' => 'Form Ubah Data radiologi',
            'radiologi' => $radiologi,
            'validation' => \Config\Services::validation(),
            'pasien' => $pasien,
            'masterrad' => $masterrad
        ];

        return view('radiologi/editradiologi', $data);
    }


    public function updateradiologi($id)
    {
        //validasi Update
        if (!$this->validate(
            [
                'TIPE_PERIKSA_RAD' => 'required',
                'HASIL_RAD' => 'required',
                // 'BIAYA_RAD' => 'required',
                'NO_RM' => 'required',
                'KESIMPULAN_RAD' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/radiologi/editradiologi/' . $this->request->getVar('ID_RADIOLOGI'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('HASIL_RAD'), '-', true);
        $this->radiologiModel->save([
            'ID_RADIOLOGI' => $id,
            'ID_PASIEN' => $this->request->getVar('NO_RM'), //Menampilkan Nama Pasien Berdasarkan Id Pasien
            'ID_MASTERRAD' => $this->request->getVar('TIPE_PERIKSA_RAD'),
            'SLUG_RAD' => $SLUG,
            'HASIL_RAD' => $this->request->getVar('HASIL_RAD'),
            // 'BIAYA_RAD' => $this->request->getVar('BIAYA_RAD'),
            'KESIMPULAN_RAD' => $this->request->getVar('KESIMPULAN_RAD')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/radiologi/indexradiologi');
    }

    // ============================================================Masterrad===================================================================

    public function indexmasterrad()
    {
        // Perintah Menampilkan Semua Tabel
        $Masterrad = $this->MasterradModel->findAll();

        $data = [
            'title' => 'Master Radiologi',
            'masterrad' => $Masterrad
        ];

        return view('radiologi/indexmasterrad', $data);
    }


    // Method Untuk Insert Data|
    public function createmasterrad()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Master Radiologi',
            'validation' => \Config\Services::validation()
        ];

        return view('radiologi/createmasterrad', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function savemasterrad()
    {
        //validasi input
        if (!$this->validate(
            [
                'TIPE_PERIKSA_RAD' => 'required'

            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/radiologi/createmasterrad')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_RAD'), '-', true);
        $this->MasterradModel->save([
            'TIPE_PERIKSA_RAD' => $this->request->getVar('TIPE_PERIKSA_RAD')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman masterrad Setelah Input Data
        return redirect()->to('/radiologi/indexmasterrad');
    }


    // Method Delete
    public function deletemasterrad($id)
    {
        $model = new MasterradModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/radiologi/indexmasterrad');
    }


    // Method Edit
    public function editmasterrad($id = NULL)
    {
        // Validasi Data
        $model = new MasterradModel();
        $masterrad = $model->find($id);
        $data = [
            'title' => 'Form Ubah Data Master Radiologi',
            'masterrad' => $masterrad,
            'validation' => \Config\Services::validation()
        ];

        return view('radiologi/editmasterrad', $data);
    }


    public function updatemasterrad($id)
    {
        //validasi Update
        if (!$this->validate(
            [
                'TIPE_PERIKSA_RAD' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/radiologi/editmasterrad/' . $this->request->getVar('ID_MASTERRAD'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_RAD'), '-', true);
        $this->MasterradModel->save([
            'ID_MASTERRAD' => $id,
            'TIPE_PERIKSA_RAD' => $this->request->getVar('TIPE_PERIKSA_RAD')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman Masterrad Setelah Input Data
        return redirect()->to('/radiologi/indexmasterrad');
    }
}
