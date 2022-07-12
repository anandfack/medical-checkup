<?php

namespace App\Models;

use CodeIgniter\Model;

class KesimpulanModel extends Model
{
    // syarat untuk konek database
    protected $table = 'kesimpulan';
    protected $primaryKey = 'ID_KESIMPULAN';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['ID_PASIEN', 'NAMA_PASIEN', 'NO_RM', 'PEMERIKSAAN_FISIK', 'FOTO_THORAX', 'LABORATORIUM', 'SARAN', 'IMT', 'TATALAKSANA'];

    // METHOD UNTUK JOIN TABEL KESIMPULAN DAN PASIEN
    public function getKesimpulan()
    {
        return $this->db->table('kesimpulan')
            // Join Tabel Pasien dan Periksa
            ->join('pasien', 'pasien.ID_PASIEN=kesimpulan.ID_PASIEN')
            ->get()->getResultArray();
    }

    // METHOD UNTUK MENAMPILKAN DETAIL SESUAI DENGAN ID
    public function DetailKesimpulan($id)
    {
        return $this->db->table('kesimpulan')
            ->select('NAMA_PASIEN, NO_RM, ID_KESIMPULAN, PEMERIKSAAN_FISIK, FOTO_THORAX, LABORATORIUM, SARAN, IMT, TATALAKSANA')
            ->where('ID_KESIMPULAN', $id)
            ->join('pasien', 'pasien.ID_PASIEN=kesimpulan.ID_PASIEN')

            // ->select('periksa.*', 'pasien.NAMA_PASIEN', 'pasien.NO_RM')
            ->get()->getRowArray();
    }
}
