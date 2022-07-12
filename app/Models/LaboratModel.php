<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratModel extends Model
{
    // syarat untuk konek database
    protected $table = 'laborat';
    protected $primaryKey = 'ID_LABORAT';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['TIPE_PERIKSA_LAB', 'NO_RM', 'ID_PASIEN', 'NAMA_PASIEN', 'TANGGAL_LAHIR', 'JENIS_KELAMIN', 'PERUSAHAAN', 'NIK', 'DEPARTEMEN', 'BAGIAN', 'ID_MASTERLAB', 'HASIL_LAB', 'NILAI_NORMAL_LAB', 'KETERANGAN_LAB'];


    public function getLaborat()
    {
        return $this->db->table('laborat')
            // Join Tabel Pasien dan Laborat
            ->join('pasien', 'pasien.ID_PASIEN=laborat.ID_PASIEN')
            //Join Tabel Master_lab dan Laborat
            ->join('master_lab', 'master_lab.ID_MASTERLAB=laborat.ID_MASTERLAB')
            ->get()->getResultArray();
    }


    public function CetakPdf($id)
    {
        return $this->db->table('laborat')
            ->select('ID_LABORAT, NAMA_PASIEN, NO_RM, TANGGAL_LAHIR, JENIS_KELAMIN, PERUSAHAAN, NIK, DEPARTEMEN, BAGIAN, HASIL_LAB, NILAI_NORMAL_LAB, KETERANGAN_LAB, TIPE_PERIKSA_LAB')
            ->where('ID_LABORAT', $id)
            ->groupBy('TIPE_PERIKSA_LAB')
            ->join('pasien', 'pasien.ID_PASIEN=laborat.ID_PASIEN')
            ->join('master_lab', 'master_lab.ID_MASTERLAB=laborat.ID_MASTERLAB')
            ->get()->getRowArray();
        // TIPE_PERIKSA_LAB, ID_MASTERLAB,
    }
}
