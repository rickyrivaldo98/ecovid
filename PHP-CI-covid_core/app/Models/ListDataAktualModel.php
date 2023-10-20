<?php

namespace App\Models;
// use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class ListDataAktualModel extends Model{
    protected $table = 'data_aktual';
    protected $column_order = array(null,'id', 'puskesmas.`nama_puskesmas`','kab_kota.`nama_kab_kota`','tahun','minggudalamtahun','minggudalamtahunselanjutnya','positif','sembuh','meninggal');
    protected $column_search = array('id', 'puskesmas.`nama_puskesmas`','kab_kota.`nama_kab_kota`','tahun','minggudalamtahun','minggudalamtahunselanjutnya','positif','sembuh','meninggal');
    protected $order = array('id' => 'asc');
    protected $request;
    protected $db;
    protected $dt;
    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
    }
    private function _get_datatables_query($id_pus= '',$id_kab= '')
    {
        if(!$id_kab || $id_kab == ''){
            $this->dt->select('id, puskesmas.`nama_puskesmas`,kab_kota.`nama_kab_kota`,tahun,minggudalamtahun,minggudalamtahunselanjutnya,positif,sembuh,meninggal');
            $this->dt->join('puskesmas', 'data_aktual.`id_puskesmas`=puskesmas.`id_puskesmas`','left');
            $this->dt->join('kab_kota', 'data_aktual.`id_kabupaten`=kab_kota.`id_kab_kota`','left');
        }else if($id_kab&&$id_pus){
            $this->dt->select('id, puskesmas.`nama_puskesmas`,kab_kota.`nama_kab_kota`,tahun,minggudalamtahun,minggudalamtahunselanjutnya,positif,sembuh,meninggal');
            $this->dt->join('puskesmas', 'data_aktual.`id_puskesmas`=puskesmas.`id_puskesmas`','left');
            $this->dt->join('kab_kota', 'data_aktual.`id_kabupaten`=kab_kota.`id_kab_kota`','left');
            $this->dt->where('id_puskesmas='.$id_pus);
        }else{
            $this->dt->select('id, puskesmas.`nama_puskesmas`,kab_kota.`nama_kab_kota`,tahun,minggudalamtahun,minggudalamtahunselanjutnya,positif,sembuh,meninggal');
            $this->dt->join('puskesmas', 'data_aktual.`id_puskesmas`=puskesmas.`id_puskesmas`','left');
            $this->dt->join('kab_kota', 'data_aktual.`id_kabupaten`=kab_kota.`id_kab_kota`','left');
            $this->dt->where('id_kabupaten='.$id_kab);
        }
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->dt->groupStart(); 
                    $this->dt->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->dt->orLike($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) 
                    $this->dt->groupEnd(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->dt->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables($id_pus='',$id_kab='')
    {
        $this->_get_datatables_query($id_pus,$id_kab);
        if ($_POST['length'] != -1){
            $this->dt->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered($id_pus='',$id_kab='')
    {
        $this->_get_datatables_query($id_pus,$id_kab);
        return $this->dt->countAllResults();
    }
    public function count_all($id_pus='',$id_kab='')
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
    // public function updatePuskesmas($id='',$alamat){
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('tb_penduduk');
    //     $data = [
    //         'NAMA_LGKP' => $alamat,
    //     ];
        
    //     $builder->where('NIK', $id);
    //     $builder->update($data);
    // }
}
