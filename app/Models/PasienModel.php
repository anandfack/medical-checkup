<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    // syarat untuk konek database
    protected $table = 'pasien';
    protected $primaryKey = 'ID_PASIEN';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['NO_RM', 'NAMA_PASIEN', 'TANGGAL_LAHIR', 'JENIS_KELAMIN', 'PERUSAHAAN', 'NIK', 'DEPARTEMEN', 'BAGIAN'];

    // Ambil data pasien untuk dropdown
    public function getDropdownPasien()
    {
        // $builder = $this->db->table('pasien');
        // $sql = $builder->select('ID_PASIEN,NAMA_PASIEN')->get();
        $sql = $this->db->table('pasien')->select('ID_PASIEN, NAMA_PASIEN, NO_RM')->get();
        return $sql->getResultArray();
    }


    public function CetakPdfPx($id)
    {
        return $this->db->table('pasien')
            ->select('ID_LABORAT, NAMA_PASIEN, NO_RM, TANGGAL_LAHIR, JENIS_KELAMIN, PERUSAHAAN, NIK, DEPARTEMEN, BAGIAN, HASIL_LAB, NILAI_NORMAL_LAB, KETERANGAN_LAB, TIPE_PERIKSA_LAB')
            ->where('ID_PASIEN', $id)
            ->join('pasien', 'pasien.ID_PASIEN=laborat.ID_PASIEN')
            ->join('master_lab', 'master_lab.ID_MASTERLAB=laborat.ID_MASTERLAB')
            ->get()->getRowArray();
    }
}
