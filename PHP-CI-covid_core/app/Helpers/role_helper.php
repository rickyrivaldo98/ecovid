<?php 
function get_role($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('auth_groups_users');
    if($id&&$id!=''){
        return $builder->select('auth_groups.name')->join('auth_groups','auth_groups_users.group_id=auth_groups.id','left')->join('users','auth_groups_users.user_id=users.id','left')->where('users.id ='.$id)->get()->getResult();
    }else{
        return 'Unidentified';
    }
}