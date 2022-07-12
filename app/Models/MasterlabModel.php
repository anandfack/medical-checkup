<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterlabModel extends Model
{
    // syarat untuk konek database
    protected $table = 'master_lab';
    protected $primaryKey = 'ID_MASTERLAB';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $allowedFields = ['TIPE_PERIKSA_LAB'];


    public function getDropdownMasterlab()
    {

        // $builder = $this->db->table('pasien');
        // $sql = $builder->select('ID_PASIEN,NAMA_PASIEN')->get();
        $sql = $this->db->table('master_lab')->select('ID_MASTERLAB, TIPE_PERIKSA_LAB')->get();
        return $sql->getResultArray();
    }
}
