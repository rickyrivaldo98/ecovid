<?php 
function get_kabupaten($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('kab_kota');
    if($id&&$id!=''){
        return $builder->select('nama_kab_kota')->where('id_kab_kota ='.$id)->get()->getResult();
    }else{
        return '';
    }
}