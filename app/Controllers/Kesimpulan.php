<?php

namespace App\Controllers;

use App\Models\KesimpulanModel;
use App\Models\PasienModel;

// Kelas Pasien
class Kesimpulan extends BaseController
{
    protected $KesimpulanModel;


    // Method Construct Untuk Model
    public function __construct()
    {
        $this->KesimpulanModel = new KesimpulanModel();
        $this->PasienModel = new PasienModel();
    }



    // Method Untuk Menampilkan Tabel
    public function index()
    {
        // Perintah Menampilkan Semua Tabel
        $Kesimpulan = $this->KesimpulanModel->getKesimpulan();

        $data = [
            'title' => 'Kesimpulan',
            'Kesimpulan' => $Kesimpulan
        ];

        return view('kesimpulan/index', $data);
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

        return view('kesimpulan/IndexDetail', $data);
    }


    // Method Untuk Insert Data
    public function create()
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien();
        $data = [
            'title' => 'Form Tambah Data Periksa Fisik',
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        return view('kesimpulan/create', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function save()
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
            return redirect()->to('/kesimpulan/create')->withInput()->with('validation', $validation);
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
        return redirect()->to('/kesimpulan');
    }


    // Method Delete
    public function delete($id)
    {
        $model = new KesimpulanModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/kesimpulan');
    }


    // Method Edit
    public function edit($id = NULL)
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien(); //Mengambil fungsi getDropdownPasien di model pasien
        $model = new KesimpulanModel();
        $Kesimpulan = $model->find($id);

        $data = [
            'title' => 'Form Ubah Data Kesimpulan',
            'Kesimpulan' => $Kesimpulan,
            'validation' => \Config\Services::validation(),
            'pasien' => $pasien
        ];

        return view('kesimpulan/edit', $data);
    }


    public function update($id)
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
            return redirect()->to('/kesimpulan/edit/' . $this->request->getVar('ID_KESIMPULAN'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/kesimpulan');
    }
}
