<?php

namespace App\Controllers;

use App\Models\PeriksaModel;
use App\Models\PasienModel;

// Kelas Pasien
class Periksa extends BaseController
{
    protected $PeriksaModel;


    // Method Construct Untuk Model
    public function __construct()
    {
        $this->PeriksaModel = new PeriksaModel();
        $this->PasienModel = new PasienModel();
    }



    // Method Untuk Menampilkan Tabel
    public function index()
    {
        // Perintah Menampilkan Semua Tabel
        $Periksa = $this->PeriksaModel->getPeriksa();

        $data = [
            'title' => 'Periksa',
            'Periksa' => $Periksa
        ];

        return view('periksa/index', $data);
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
        return view('periksa/IndexDetail', $data);
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

        return view('periksa/create', $data);
    }


    // Method Untuk Menyimpan Data Yang Telah di Inputkan
    public function save()
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
            return redirect()->to('/periksa/create')->withInput()->with('validation', $validation);
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
        return redirect()->to('/periksa');
    }


    // Method Delete
    public function delete($id)
    {
        $model = new PeriksaModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/periksa');
    }


    // Method Edit
    public function edit($id = NULL)
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien(); //Mengambil fungsi getDropdownPasien di model pasien
        $model = new PeriksaModel();
        $periksa = $model->find($id);

        $data = [
            'title' => 'Form Ubah Data Periksa Fisik',
            'periksa' => $periksa,
            'validation' => \Config\Services::validation(),
            'pasien' => $pasien
        ];

        return view('periksa/edit', $data);
    }


    public function update($id)
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
            return redirect()->to('/periksa/edit/' . $this->request->getVar('ID_PERIKSA'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/periksa');
    }
}
