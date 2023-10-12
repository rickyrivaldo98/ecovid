<?php 
function get_puskesmas($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('puskesmas');
    if($id&&$id!=''){
        return $builder->select('nama_puskesmas')->where('id_puskesmas ='.$id)->get()->getResult();
    }else{
        return '';
    }
}