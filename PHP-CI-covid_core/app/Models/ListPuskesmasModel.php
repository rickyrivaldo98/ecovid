<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPuskesmasModel extends Model
{
    protected $table = 'users';
    // protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'id_puskesmas', 'email', 'username', 'nama_lengkap', 'noHP', 'password_hash', 'active'];
    // protected $returnType = '';

    public function getUsers($id = '')
    {
        if (!$id || $id == '') {
            return $this->select('users.id,email,username,nama_lengkap,noHP,nama_puskesmas,alamat,nama_kab_kota')->join('auth_groups_users gs', 'users.id=gs.user_id')->join('puskesmas pks', 'users.id_puskesmas=pks.id_puskesmas')->join('kab_kota kab', 'pks.id_kab_kota=kab.id_kab_kota')->where('gs.group_id=3')->findAll();
        } else {
            return $this->select('users.id,users.username,users.nama_lengkap,users.noHP,puskesmas.`nama_puskesmas`,kab_kota.`nama_kab_kota`,puskesmas.id_puskesmas,puskesmas.`id_kab_kota`,puskesmas.`alamat`')->join('auth_groups_users gs', 'users.id=gs.user_id')->join('puskesmas', 'users.id_puskesmas = puskesmas.`id_puskesmas`', 'left')->join('kab_kota', 'puskesmas.`id_kab_kota` = kab_kota.`id_kab_kota`', 'left')->where('users.id=' . $id)->findAll();
        }
    }
    public function getKabupaten($params = '')
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kab_kota');
        if (!$params || $params == '') {
            return $builder->select('id_kab_kota,nama_kab_kota')->get()->getResult();
        }
    }

    public function getKabupatenid($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('kab_kota');
        $kp = $builder->select('nama_kab_kota')->where('id_kab_kota=' . $id)->get()->getResult();
        foreach ($kp as $row) {
            return $row->nama_kab_kota;
        }
    }

    public function getKabupatenid2($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('puskesmas');
        $kp = $builder->select('id_kab_kota')->where('id_puskesmas=' . $id)->get()->getResult();
        foreach ($kp as $row) {
            return $row->id_kab_kota;
        }
    }

    public function getPuskesmas($params = '')
    {
        $db = \Config\Database::connect();
        $builder = $db->table('puskesmas');
        if ($params || $params != '') {
            return $builder->select('id_puskesmas,nama_puskesmas')->join('kab_kota kab', 'puskesmas.id_kab_kota=kab.id_kab_kota')->where('kab.id_kab_kota=' . $params)->get()->getResult();
        } else {
            return null;
        }
    }
    public function updatePuskesmas($id = '', $alamat)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('puskesmas');
        $data = [
            'alamat' => $alamat,
        ];

        $builder->where('id_puskesmas', $id);
        $builder->update($data);
    }
}
