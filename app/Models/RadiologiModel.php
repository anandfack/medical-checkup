<?php

namespace App\Models;

use CodeIgniter\Model;

class RadiologiModel extends Model
{
    // syarat untuk konek database
    protected $table = 'radiologi';
    protected $primaryKey = 'ID_RADIOLOGI';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['NO_RM', 'TIPE_PERIKSA_RAD', 'ID_PASIEN', 'ID_MASTERRAD', 'HASIL_RAD', 'KESIMPULAN_RAD'];



    public function getRadiologi()
    {
        return $this->db->table('radiologi')
            // Join Tabel Pasien dan Radiologi
            ->join('pasien', 'pasien.ID_PASIEN=radiologi.ID_PASIEN')
            //Join Tabel Masterrad dan Radiologi
            ->join('master_rad', 'master_rad.ID_MASTERRAD=radiologi.ID_MASTERRAD')
            ->get()->getResultArray();
    }


    // public function getMasterrad()
    // {
    //     return $this->db - table('radiologi')
    //         ->join('master_rad', 'master_rad.ID_MASTERRAD=laborat.ID_MASTERRAD')
    //         ->get()->getResultArray();
    // }
}
