<?php

namespace App\Controllers;

use App\Models\MasterLabModel;

// Kelas Master Laboratorium
class MasterLab extends BaseController
{
    protected $MasterLabModel;


    // Method Construct Untuk Model
    public function __construct()
    {
        $this->MasterLabModel = new MasterLabModel();
    }



    // Method Untuk Menampilkan Tabel
    public function index()
    {
        // Perintah Menampilkan Semua Tabel
        $MasterLab = $this->MasterLabModel->findAll();

        $data = [
            'title' => 'Master Laboratorium',
            'masterlab' => $MasterLab
        ];

        return view('masterlab/index', $data);
    }


    // Method Untuk Insert Data|
    public function create()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Master Laboratorium',
            'validation' => \Config\Services::validation()
        ];

        return view('masterlab/create', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function save()
    {
        //validasi input
        if (!$this->validate(
            [
                'TIPE_PERIKSA_LAB' => 'required'

            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/masterlab/create')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_LAB'), '-', true);
        $this->MasterLabModel->save([
            'TIPE_PERIKSA_LAB' => $this->request->getVar('TIPE_PERIKSA_LAB')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman masterlab Setelah Input Data
        return redirect()->to('/masterlab');
    }


    // Method Delete
    public function delete($id)
    {
        $model = new MasterLabModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/masterlab');
    }


    // Method Edit
    public function edit($id = NULL)
    {
        // Validasi Data
        $model = new MasterLabModel();
        $masterlab = $model->find($id);
        $data = [
            'title' => 'Form Ubah Data Master Laboratorium',
            'masterlab' => $masterlab,
            'validation' => \Config\Services::validation()
        ];

        return view('masterlab/edit', $data);
    }


    public function update($id)
    {
        //validasi Update
        if (!$this->validate(
            [
                'TIPE_PERIKSA_LAB' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/masterlab/edit/' . $this->request->getVar('ID_MASTERLAB'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_LAB'), '-', true);
        $this->MasterLabModel->save([
            'ID_MASTERLAB' => $id,
            'TIPE_PERIKSA_LAB' => $this->request->getVar('TIPE_PERIKSA_LAB')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman Masterlab Setelah Input Data
        return redirect()->to('/masterlab');
    }
}
