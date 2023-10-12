<?php

namespace App\Controllers;

use App\Models\ListDataAktualModel;
use App\Models\DataAktualModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class ListDataAktual extends BaseController
{
    // private $_users;
    // private $_myth_users;
    public function __construct()
    {
        // $this->_aktual = new ListDataAktualModel();
        $this->_myth_users = new UserModel();
    }
    public function index()
    {
        // $data_aktual = $this->_aktual->getDatas();
        $data['meta'] = [
            'title' => 'Data Aktual | Jateng Covid',
            'identifier'=>'is_list_data_aktual',
            'submenu_identity'=>'',
            // 'data_aktual'=>$data_aktual,
        ];
        return view('pages/listDataAktual',$data);
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new ListDataAktualModel($request);
        $id_pus=$this->request->getPost('id_pus');
        $id_kab=$this->request->getPost('id_kab');
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables($id_pus,$id_kab);
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_puskesmas;
                $row[] = $list->nama_kab_kota;
                $row[] = $list->tahun;
                $row[] = $list->minggudalamtahun;
                $row[] = $list->minggudalamtahunselanjutnya;
                $row[] = $list->positif;
                $row[] = $list->sembuh;
                $row[] = $list->meninggal;
                $row[] = '                        <td class="flex flex-row justify-center items-center space-x-2">
                <a href="#" type="button" data-id="'.$list->id.'" onclick="deleteData(this)"
                    class="btn-popupz text-center w-10  p-2 text-xs text-red-600 bg-red-200 rounded-md dark:text-red-500 "><i
                        class="fas fa-trash"></i>
                </a>
            </td>';
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all($id_pus,$id_kab),
                "recordsFiltered" => $datamodel->count_filtered($id_pus,$id_kab),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
    public function deleteData($id){
        $dataaktual = new DataAktualModel();
        $succeed=$dataaktual->delete($id);
        if(!$succeed){
            session()->setFlashdata('error','Data tidak berhasil dihapus!');
        }
        session()->setFlashdata('success','Data berhasil dihapus!');
        return redirect()->to('/penduduk');
    }
    public function deleteModal(){
        $id_data = $this->request->getVar('data_id');
        $uri = base_url().'dataaktual/deleteData/'.$id_data;
        $response = '
        <form method="POST" action="'.$uri.'">
        <button type="submit" data-id='.$id_data.' 
        class="btn-delete-confirm inline-block rounded bg-red-500 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
        <i class="fas fa-trash mr-1"></i> Hapus
    </button></form>';
        echo $response;
    }
}
