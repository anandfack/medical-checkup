<?php

namespace App\Controllers;

use App\Models\MasterradModel;

// Kelas Master Radiologi
class Masterrad extends BaseController
{
    protected $MasterradModel;


    // Method Construct Untuk Model
    public function __construct()
    {
        $this->MasterradModel = new MasterradModel();
    }



    // Method Untuk Menampilkan Tabel
    public function index()
    {
        // Perintah Menampilkan Semua Tabel
        $Masterrad = $this->MasterradModel->findAll();

        $data = [
            'title' => 'Master Radiologi',
            'masterrad' => $Masterrad
        ];

        return view('masterrad/index', $data);
    }


    // Method Untuk Insert Data|
    public function create()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Master Radiologi',
            'validation' => \Config\Services::validation()
        ];

        return view('masterrad/create', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function save()
    {
        //validasi input
        if (!$this->validate(
            [
                'TIPE_PERIKSA_RAD' => 'required'

            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/masterrad/create')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_RAD'), '-', true);
        $this->MasterradModel->save([
            'TIPE_PERIKSA_RAD' => $this->request->getVar('TIPE_PERIKSA_RAD')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman masterrad Setelah Input Data
        return redirect()->to('/masterrad');
    }


    // Method Delete
    public function delete($id)
    {
        $model = new MasterradModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/masterrad');
    }


    // Method Edit
    public function edit($id = NULL)
    {
        // Validasi Data
        $model = new MasterradModel();
        $masterrad = $model->find($id);
        $data = [
            'title' => 'Form Ubah Data Master Radiologi',
            'masterrad' => $masterrad,
            'validation' => \Config\Services::validation()
        ];

        return view('masterrad/edit', $data);
    }


    public function update($id)
    {
        //validasi Update
        if (!$this->validate(
            [
                'TIPE_PERIKSA_RAD' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/masterrad/edit/' . $this->request->getVar('ID_MASTERRAD'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/masterrad');
    }
}
