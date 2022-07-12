<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriksaModel extends Model
{
    // syarat untuk konek database
    protected $table = 'periksa';
    protected $primaryKey = 'ID_PERIKSA';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['ID-PASIEN', 'NAMA_PASIEN', 'NO_RM', 'BATUK_DARAH', 'KENCING_BATU', 'HEPATITIS', 'HERNIA', 'HIPERTENSI', 'HEMORROID', 'DIABETES', 'TINGGI_BADAN', 'BERAT_BADAN', 'NADI', 'TEKANAN_DARAH', 'VISUS', 'BUTA_WARNA', 'JULING', 'KELAINAN_MATA_LAIN', 'TELINGA_LUAR', 'TELINGA_TENGAH', 'GIGI', 'PARU', 'JANTUNG', 'HATI', 'LIMPA', 'EKSTRIMITAS', 'KESEIMBANGAN', 'EXIM', 'DERMATITIS'];

    // METHOD UNTUK JOIN TABEL PERIKSA DAN PASIEN
    public function getPeriksa()
    {
        return $this->db->table('periksa')
            // Join Tabel Pasien dan Periksa
            ->join('pasien', 'pasien.ID_PASIEN=periksa.ID-PASIEN')
            ->get()->getResultArray();
    }

    // METHOD UNTUK MENAMPILKAN DETAIL SESUAI DENGAN ID
    public function detailperiksa($id)
    {
        return $this->db->table('periksa')
            ->select('NAMA_PASIEN, NO_RM, ID_PERIKSA, BATUK_DARAH, KENCING_BATU, HEPATITIS, HERNIA, HIPERTENSI, HEMORROID, DIABETES, TINGGI_BADAN, BERAT_BADAN, NADI, TEKANAN_DARAH, VISUS, BUTA_WARNA, JULING, KELAINAN_MATA_LAIN, TELINGA_LUAR, TELINGA_TENGAH, GIGI, PARU, JANTUNG, HATI, LIMPA, EKSTRIMITAS, KESEIMBANGAN, EXIM, DERMATITIS')
            ->where('ID_PERIKSA', $id)
            ->join('pasien', 'pasien.ID_PASIEN=periksa.ID-PASIEN')

            // ->select('periksa.*', 'pasien.NAMA_PASIEN', 'pasien.NO_RM')
            ->get()->getRowArray();
    }
}
