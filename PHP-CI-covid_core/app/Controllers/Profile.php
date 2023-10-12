<?php

namespace App\Controllers;
use App\Models\ListPuskesmasModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
class Profile extends BaseController
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
        $data_kabupaten = $this->_users->getKabupaten();
        $data['meta'] = [
            'title' => 'Profile | Jateng Covid',
            'identifier'=>'is_profile',
            'submenu_identity'=>'',
            'data_kabupaten'=>$data_kabupaten,
        ];
        return view('pages/profile',$data);
    }
    public function editUser($id){
        $succeed=$this->_myth_users->save([
            'id' =>$id,
            'id_puskesmas'=>$this->request->getVar('edit-puskesmas'),
            'email'=>$this->request->getVar('edit-email'),
            'username'=>$this->request->getVar('edit-username'),
            'nama_lengkap'=>$this->request->getVar('edit-fullname'),
            'noHP'=>$this->request->getVar('edit-nohp'),
            'active'=>1
        ]);
        if(!$succeed){
            session()->setFlashdata('error','Data tidak berhasil diubah!');
        }
        session()->setFlashdata('success','Data berhasil diubah!');
        return redirect()->to('/profile');
    }
    public function editModal(){
        $id_user = $this->request->getVar('user_id');
        $data_user = $this->_users->getUsers($id_user);
        return json_encode($data_user);
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
    public function editPassword($id){
        if(!$this->validate([
            'edit_old_password'=>[
                'rules'=>'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'edit_new_password'=>[
                'rules'=>'required|strong_password',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'edit_confirm_password'=>[
                'rules'=>'required|matches[edit_new_password]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'matches'=>'Konfirmasi password tidak sama dengan password baru',
                ]
            ],
        ])){
            session()->setFlashdata('error_pass', $this->validator->listErrors());
            return redirect()->to('/profile')->withInput();
        }
        if(Password::verify($this->request->getVar('edit_old_password'),user()->password_hash)){
            $this->_myth_users->save([
                'id' =>$id,
                'password_hash'=>Password::hash($this->request->getVar('edit_new_password')),
            ]);
            session()->setFlashdata('success_pass','Password berhasil diubah!');
        }else{
            session()->setFlashdata('error_pass','Password lama salah!');
        }
        return redirect()->to('/profile');
    }
    public function editFotoProfil($id){
        if(!$this->validate([
            'profil_picture' => [
				'rules' => 'uploaded[profil_picture]|is_image[profil_picture]|mime_in[profil_picture,image/jpg,image/jpeg,image/png]|max_size[profil_picture,1024]',
				'errors' => [
					'uploaded' => 'Pilih file yang akan diupload dahulu',
					'is_image' => 'File yang dipilih harus gambar',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg, atau png',
					'max_size' => 'Ukuran File Maksimal 1 MB'
				]
			]
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/profile')->withInput();
        }
        $dataFoto = $this->request->getFile('profil_picture');
        if($dataFoto->getName()=='profile-picture-3.jpg'){
            $succeed=$this->_myth_users->save([
                'id' =>$id,
                'profil_picture'=>$dataFoto->getName(),
            ]);
        }else{
            $namaFoto = $dataFoto->getRandomName();
            $dataFoto->move('img', $namaFoto);
            $succeed=$this->_myth_users->save([
                'id' =>$id,
                'profil_picture'=>$namaFoto,
            ]);
        }
        if(!$succeed){
            session()->setFlashdata('error','Foto Profil tidak berhasil diubah!');
        }
        session()->setFlashdata('success','Foto Profil berhasil diubah!');
        return redirect()->to('/profile');
    }
}
