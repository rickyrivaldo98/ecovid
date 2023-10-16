<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAktualModel extends Model
{
    protected $table      = 'data_aktual';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'puskesmas.`nama_puskesmas`','kab_kota.`nama_kab_kota`','tahun','minggudalamtahun','minggudalamtahunselanjutnya','positif','sembuh','meninggal','created_at'];

    public function getdatetime($params = '')
    {
        if (!$params || $params == '') {
            return $this->select('created_at')->orderBy('created_at', 'DESC')->limit(1)->get()->getResult();
        }
    }

    public function getMingguTahun($params = '')
    {
        if (!$params || $params == '') {
            return $this->select('minggudalamtahun,tahun')->orderBy('minggudalamtahun', 'DESC')->limit(1)->get()->getResult();
        }
    }

}