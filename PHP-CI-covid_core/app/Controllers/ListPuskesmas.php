<?php

namespace App\Controllers;

use App\Models\ListPuskesmasModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class ListPuskesmas extends BaseController
{
    private $_users;
    private $_myth_users;
    public function __construct()
    {
        $this->_users = new ListPuskesmasModel();
        $this->_myth_users = new UserModel();
    }
    public function index()
    {
        $data_user = $this->_users->getUsers();
        $data_kabupaten = $this->_users->getKabupaten();
        $data['meta'] = [
            'title' => 'Puskesmas | Jateng Covid',
            'identifier'=>'is_list_puskesmas',
            'submenu_identity'=>'',
            'data_user'=>$data_user,
            'data_kabupaten'=>$data_kabupaten
        ];
        return view('pages/listPuskesmas',$data);
    }
    public function saveUser(){
        $user_mail = $this->request->getVar('grid-username').'@gmail.com';
        $succeed = $this->_myth_users->withGroup('puskesmas')->save([
            'id_puskesmas'=>$this->request->getVar('grid-puskesmas'),
            'id_kabupaten'=>$this->request->getVar('grid-kabupaten'),
            'email'=>$user_mail,
            'username'=>$this->request->getVar('grid-username'),
            'nama_lengkap'=>$this->request->getVar('grid-fullname'),
            'noHP'=>$this->request->getVar('grid-nohp'),
            'password_hash'=>Password::hash('fkmundip123'),
            'profil_picture'=>'profile-picture-3.jpg',
            'active'=>1
        ]);
        if(!$succeed){
            session()->setFlashdata('error','Data tidak berhasil ditambahkan!');
        }
        session()->setFlashdata('success','Data berhasil ditambahkan!');
        return redirect()->to('/puskesmas');
    }
    public function editUser($id){
        $user_mail = $this->request->getVar('edit-username').'@gmail.com';
        $succeed=$this->_myth_users->save([
            'id' =>$id,
            'id_puskesmas'=>$this->request->getVar('edit-puskesmas'),
            'email'=>$user_mail,
            'username'=>$this->request->getVar('edit-username'),
            'nama_lengkap'=>$this->request->getVar('edit-fullname'),
            'noHP'=>$this->request->getVar('edit-nohp'),
            'password_hash'=>Password::hash('fkmundip123'),
            'profil_picture'=>'profile-picture-3.jpg',
            'active'=>1
        ]);
        if(!$succeed){
            session()->setFlashdata('error','Data tidak berhasil diubah!');
        }
        session()->setFlashdata('success','Data berhasil diubah!');
        return redirect()->to('/puskesmas');
    }
    public function editModal(){
        $id_user = $this->request->getVar('user_id');
        $data_user = $this->_users->getUsers($id_user);
        return json_encode($data_user);
    }
    public function deleteUser($id){
        $succeed=$this->_myth_users->delete($id);
        if(!$succeed){
            session()->setFlashdata('error','Data tidak berhasil dihapus!');
        }
        session()->setFlashdata('success','Data berhasil dihapus!');
        return redirect()->to('/puskesmas');
    }
    public function deleteModal(){
        $id_user = $this->request->getVar('user_id');
        $uri = base_url().'puskesmas/deleteUser/'.$id_user;
        $response = '
        <form method="POST" action="'.$uri.'">
        <button type="submit" data-id='.$id_user.' 
        class="btn-delete-confirm inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
        <i class="fas fa-trash mr-1"></i> Hapus
    </button></form>';
        echo $response;
    }
    public function resetUser($id){
        $succeed=$this->_myth_users->update($id,[            
            'password_hash' => Password::hash('fkmundip123'),
        ]);
        if(!$succeed){
            session()->setFlashdata('error','Data tidak berhasil direset ke default!');
        }
        session()->setFlashdata('success','Password berhasil direset ke default!');
        return redirect()->to('/puskesmas');
    }
    public function resetModal(){
        $id_user = $this->request->getVar('user_id');
        $uri = base_url().'puskesmas/resetUser/'.$id_user;
        $response = '<form method="POST" action="'.$uri.'">
        <button type="submit" data-id='.$id_user.' 
        class="btn-delete-confirm inline-block rounded bg-orange-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
        <i class="fas fa-save mr-1"></i> Konfirmasi
    </button></form>';
        echo $response;
    }
    public function dropdownPuskesmas(){
        $id_kabupaten = $this->request->getVar('id_kabupaten');;
        $puskesmas = $this->_users->getPuskesmas($id_kabupaten);
        $lists = "";
        foreach($puskesmas as $data){
            $lists .= "<option value='".$data->id_puskesmas."'>".$data->nama_puskesmas."</option>";
        }
        $callback = array('list_puskesmas'=>$lists);
        echo json_encode($callback);
    }
}
