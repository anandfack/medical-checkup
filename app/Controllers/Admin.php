<?php

namespace App\Controllers;

use App\Models\LaboratModel;
use App\Models\PasienModel;
use App\Models\MasterlabModel;
use App\Models\MasterradModel;
use App\Models\RadiologiModel;
use App\Models\KesimpulanModel;
use App\Models\PeriksaModel;

class Admin extends BaseController
{
    protected $KesimpulanModel;
    protected $LaboratModel;
    protected $RadiologiModel;
    protected $PeriksaModel;
    protected $PasienModel;
    protected $MasterradModel;
    protected $MasterlabModel;

    public function index()
    {
        $data = ['title' => 'Home'];
        return view('admin/pages/home', $data);
    }

    public function __construct()
    {
        $this->laboratModel = new LaboratModel();
        $this->PasienModel = new PasienModel();
        $this->MasterlabModel = new MasterlabModel();
        $this->radiologiModel = new RadiologiModel();
        $this->MasterradModel = new MasterradModel();
        $this->KesimpulanModel = new KesimpulanModel();
        $this->PeriksaModel = new PeriksaModel();
    }

    // ============================================================Laborat====================================================================

    public function indexlaborat()
    {
        // Perintah Menampilkan Semua Tabel
        $Laborat = $this->laboratModel->getLaborat();

        $data = [
            'title' => 'Laborat',
            'laborat' => $Laborat
        ];

        return view('admin/laborat/index', $data);
    }

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

        return view('admin/laborat/create', $data);
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
            return redirect()->to('/admin/createlaborat')->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexlaborat');
    }

    public function deletelaborat($id)
    {
        $model = new LaboratModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexlaborat');
    }

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

        return view('admin/laborat/edit', $data);
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
            return redirect()->to('/admin/editlaborat/' . $this->request->getVar('ID_LABORAT'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexlaborat');
    }

    // ===========================================================Masterlab====================================================================
    public function indexmasterlab()
    {
        // Perintah Menampilkan Semua Tabel
        $MasterLab = $this->MasterlabModel->findAll();

        $data = [
            'title' => 'Master Laboratorium',
            'masterlab' => $MasterLab
        ];

        return view('admin/masterlab/index', $data);
    }


    // Method Untuk Insert Data|
    public function createmasterlab()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Master Laboratorium',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/masterlab/create', $data);
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
            return redirect()->to('/admin/createmasterlab')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_LAB'), '-', true);
        $this->MasterlabModel->save([
            'TIPE_PERIKSA_LAB' => $this->request->getVar('TIPE_PERIKSA_LAB')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman masterlab Setelah Input Data
        return redirect()->to('/admin/indexmasterlab');
    }


    // Method Delete
    public function deletemasterlab($id)
    {
        $model = new MasterLabModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexmasterlab');
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

        return view('admin/masterlab/edit', $data);
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
            return redirect()->to('/admin/editmasterlab/' . $this->request->getVar('ID_MASTERLAB'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexmasterlab');
    }
    // ===========================================================Radiologi====================================================================

    public function indexradiologi()
    {
        // Perintah Menampilkan Semua Tabel
        $Radiologi = $this->radiologiModel->getRadiologi();

        $data = [
            'title' => 'Radiologi',
            'radiologi' => $Radiologi
        ];

        return view('admin/radiologi/index', $data);
    }

    public function createradiologi()
    {
        // session();
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien(); //Mengambil Data Pasien Dari Model Pasien
        $masterrad = $this->MasterradModel->getDropdownMasterrad();
        $data = [
            'title' => 'Form Tambah Data Radiologi',
            'pasien' => $pasien, //parsing data pasien untuk ditampilkan di view
            'masterrad' => $masterrad,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/radiologi/create', $data);
    }

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
            return redirect()->to('/admin/createradiologi')->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexradiologi');
    }

    public function deleteradiologi($id)
    {
        $model = new RadiologiModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');

        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexradiologi');
    }

    public function editradiologi($id = NULL)
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien(); //Mengambil Data Pasien Dari Models
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

        return view('admin/radiologi/edit', $data);
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
            return redirect()->to('/admin/editradiologi/' . $this->request->getVar('ID_RADIOLOGI'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexradiologi');
    }

    // ===========================================================Masterrad====================================================================

    public function indexmasterrad()
    {
        // Perintah Menampilkan Semua Tabel
        $Masterrad = $this->MasterradModel->findAll();

        $data = [
            'title' => 'Master Radiologi',
            'masterrad' => $Masterrad
        ];

        return view('admin/masterrad/index', $data);
    }

    public function createmasterrad()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Master Radiologi',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/masterrad/create', $data);
    }

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
            return redirect()->to('/admin/createmasterrad')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('TIPE_PERIKSA_RAD'), '-', true);
        $this->MasterradModel->save([
            'TIPE_PERIKSA_RAD' => $this->request->getVar('TIPE_PERIKSA_RAD')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman masterrad Setelah Input Data
        return redirect()->to('/admin/indexmasterrad');
    }

    public function deletemasterrad($id)
    {
        $model = new MasterradModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexmasterrad');
    }

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

        return view('admin/masterrad/edit', $data);
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
            return redirect()->to('/admin/editmasterrad/' . $this->request->getVar('ID_MASTERRAD'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexmasterrad');
    }

    // ===========================================================Pasien====================================================================

    public function indexpasien()
    {
        // Perintah Menampilkan Semua Tabel
        $Pasien = $this->PasienModel->findAll();

        $data = [
            'title' => 'Pasien',
            'pasien' => $Pasien
        ];

        return view('admin/pasien/index', $data);
    }

    public function pdfpasien($id = NULL)
    {
        $Pdf = $this->PasienModel->CetakPdfPx($id);
        $data = [
            'title' => 'Tampil Detail Pasien',
            'PdfLab' => $Pdf
        ];
        dd($data);
        return view('admin/pdf/indexlaborat', $data);
    }

    public function createpasien()
    {
        // Validasi Data
        $data = [
            'title' => 'Form Tambah Data Pasien',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/pasien/create', $data);
    }

    public function savepasienadmin()
    {
        //validasi input
        if (!$this->validate(
            [
                'NO_RM' => 'required',
                'NAMA_PASIEN' => 'required',
                'TANGGAL_LAHIR' => 'required',
                'JENIS_KELAMIN' => 'required',
                'PERUSAHAAN' => 'required',
                'NIK' => 'required',
                'DEPARTEMEN' => 'required',
                'BAGIAN' => 'required'

            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/createpasien')->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('NAMA_PASIEN'), '-', true);
        $this->PasienModel->save([
            'NO_RM' => $this->request->getVar('NO_RM'),
            'NAMA_PASIEN' => $this->request->getVar('NAMA_PASIEN'),
            'SLUG' => $SLUG,
            'TANGGAL_LAHIR' => $this->request->getVar('TANGGAL_LAHIR'),
            'JENIS_KELAMIN' => $this->request->getVar('JENIS_KELAMIN'),
            'PERUSAHAAN' => $this->request->getVar('PERUSAHAAN'),
            'NIK' => $this->request->getVar('NIK'),
            'DEPARTEMEN' => $this->request->getVar('DEPARTEMEN'),
            'BAGIAN' => $this->request->getVar('BAGIAN')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil ditambahkan!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/admin/indexpasien');
    }

    public function deletepasien($id)
    {
        $model = new PasienModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexpasien');
    }

    public function editpasien($id = NULL)
    {
        // Validasi Data
        $model = new PasienModel();
        $pasien = $model->find($id);
        $data = [
            'title' => 'Form Ubah Data Pasien',
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/pasien/edit', $data);
    }

    public function updatepasien($id)
    {
        //validasi Update
        if (!$this->validate(
            [
                'NO_RM' => 'required',
                'NAMA_PASIEN' => 'required',
                'TANGGAL_LAHIR' => 'required',
                'JENIS_KELAMIN' => 'required',
                'PERUSAHAAN' => 'required',
                'NIK' => 'required',
                'DEPARTEMEN' => 'required',
                'BAGIAN' => 'required'
            ]
        )) {
            // Validasi
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/editpasien/' . $this->request->getVar('ID_PASIEN'))->withInput()->with('validation', $validation);
        }


        // Request Untuk Data Mana Yang Akan Diisi
        $SLUG = url_title($this->request->getVar('NAMA_PASIEN'), '-', true);
        $this->PasienModel->save([
            'ID_PASIEN' => $id,
            'NO_RM' => $this->request->getVar('NO_RM'),
            'NAMA_PASIEN' => $this->request->getVar('NAMA_PASIEN'),
            'SLUG' => $SLUG,
            'TANGGAL_LAHIR' => $this->request->getVar('TANGGAL_LAHIR'),
            'JENIS_KELAMIN' => $this->request->getVar('JENIS_KELAMIN'),
            'PERUSAHAAN' => $this->request->getVar('PERUSAHAAN'),
            'NIK' => $this->request->getVar('NIK'),
            'DEPARTEMEN' => $this->request->getVar('DEPARTEMEN'),
            'BAGIAN' => $this->request->getVar('BAGIAN')
        ]);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil Diubah!');

        // Mengembalikan Ke Halaman pasien Setelah Input Data
        return redirect()->to('/admin/indexpasien');
    }

    // ===========================================================Periksa====================================================================

    public function indexperiksa()
    {
        // Perintah Menampilkan Semua Tabel
        $Periksa = $this->PeriksaModel->getPeriksa();

        $data = [
            'title' => 'Periksa',
            'Periksa' => $Periksa
        ];

        return view('admin/periksa/index', $data);
    }

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
        return view('admin/periksa/IndexDetail', $data);
    }

    public function createperiksa()
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien();
        $data = [
            'title' => 'Form Tambah Data Periksa Fisik',
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/periksa/create', $data);
    }

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
            return redirect()->to('/admin/createperiksa')->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexperiksa');
    }

    public function deleteperiksa($id)
    {
        $model = new PeriksaModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexperiksa');
    }

    public function editperiksa($id = NULL)
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

        return view('admin/periksa/edit', $data);
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
            return redirect()->to('/admin/editperiksa/' . $this->request->getVar('ID_PERIKSA'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexperiksa');
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

        return view('admin/kesimpulan/index', $data);
    }

    public function detailkesimpulan($id = NULL)
    {
        // Parsing Data
        // $Periksa = $this->PeriksaModel->DetailPeriksa($id); //Mengambil fungsi getDropdownPasien di model pasien
        $Kesimpulan = $this->KesimpulanModel->DetailKesimpulan($id);
        $data = [
            'title' => 'Tampil Detail Pasien',
            'Kesimpulan' => $Kesimpulan
        ];

        return view('admin/kesimpulan/IndexDetail', $data);
    }

    public function createkesimpulan()
    {
        // Validasi Data
        $pasien = $this->PasienModel->getDropdownPasien();
        $data = [
            'title' => 'Form Tambah Data Periksa Fisik',
            'pasien' => $pasien,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kesimpulan/create', $data);
    }

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
            return redirect()->to('/admin/createkesimpulan')->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexkesimpulan');
    }

    public function deletekesimpulan($id)
    {
        $model = new KesimpulanModel();
        $model->delete($id);

        // Session Notifikasi Data Berhasil di Input
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        // Mengembalikan Ke Halaman Awal
        return redirect()->to('/admin/indexkesimpulan');
    }

    public function editkesimpulan($id = NULL)
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

        return view('admin/kesimpulan/edit', $data);
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
            return redirect()->to('/admin/editkesimpulan/' . $this->request->getVar('ID_KESIMPULAN'))->withInput()->with('validation', $validation);
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
        return redirect()->to('/admin/indexkesimpulan');
    }
}
