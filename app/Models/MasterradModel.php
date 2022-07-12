<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterradModel extends Model
{
    // syarat untuk konek database
    protected $table = 'master_rad';
    protected $primaryKey = 'ID_MASTERRAD';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['TIPE_PERIKSA_RAD'];


    public function getDropdownMasterrad()
    {

        // $builder = $this->db->table('pasien');
        // $sql = $builder->select('ID_PASIEN,NAMA_PASIEN')->get();
        $sql = $this->db->table('master_rad')->select('ID_MASTERRAD, TIPE_PERIKSA_RAD')->get();
        return $sql->getResultArray();
    }
}
