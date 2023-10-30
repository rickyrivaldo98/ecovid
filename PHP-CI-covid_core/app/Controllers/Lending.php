<?php

namespace App\Controllers;

use App\Models\ListPuskesmasModel;
use App\Models\DataAktualModel;
use Myth\Auth\Models\DataModel;
use Myth\Auth\Models\DataModelPuskesmas;


class Lending extends BaseController
{
    private $_puskesmas;
    public function __construct()
    {
        $this->_puskesmas = new ListPuskesmasModel();
        $this->_myth_datas = new DataModel();
        $this->_myth_datas_puskesmas = new DataModelPuskesmas();
        $this->_dataaktual = new DataAktualModel();
    }

    public function callAPI($method, $url, $data)
    {
        // session()->setFlashdata('load', 'true');
        set_time_limit(200);
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_TIMEOUT_MS, 130000); //in miliseconds
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        // session()->setFlashdata('load', 'false');
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

    public function index()
    {
        $data_user = $this->_puskesmas->getUsers();
        $data_kabupaten = $this->_puskesmas->getKabupaten();
        $dataminggu = $this->_myth_datas->getMinggu();
        $dataMingguTahun = $this->_dataaktual->getMingguTahun();
        $datetime = $this->_dataaktual->getdatetime();
        if (user() == null) {
            $data_puskesmas = null;
        } else {
            $data_puskesmas = $this->_puskesmas->getPuskesmas(user()->id_kabupaten);
        };



        $data['meta'] = [
            'title' => 'Home | Jateng Covid',
            'identifier' => 'is_home',
            'submenu_identity' => '',
            'data_user' => $data_user,
            'data_kabupaten' => $data_kabupaten,
            'data_puskesmas' => $data_puskesmas,
            'data_datetime' => $datetime,
            'data_minggu' => $dataminggu,
            'data_minggu_tahun' => $dataMingguTahun,
        ];

        return view('pages/lending', $data);
    }

    public function saveData()
    {
        $id_puskesmas = $this->request->getVar('grid-puskesmas2');
        $id_kabupaten = $this->request->getVar('grid-kabupaten2');
        $tahun = $this->request->getVar('grid-tahun');
        $minggudalamtahun = $this->request->getVar('grid-minggu-tahun');
        $minggudalamtahunselanjutnya = $this->request->getVar('grid-minggu-tahun-selanjutnya');
        $positif = $this->request->getVar('grid-positif');
        $sembuh = $this->request->getVar('grid-sembuh');
        $meninggal = $this->request->getVar('grid-meninggal');
        $checkdata = $this->_myth_datas->isData(
            $id_kabupaten,
            $id_puskesmas,
            $tahun,
            $minggudalamtahun,
            $minggudalamtahunselanjutnya
        );
        $dataall = $this->_myth_datas->getAll();
        // print_r(json_encode($dataall));



        if ($checkdata) {
            $succeed = $this->_myth_datas->update($checkdata->id, [
                'id_puskesmas' => $id_puskesmas,
                'id_kabupaten' => $id_kabupaten,
                'tahun' => $tahun,
                'minggudalamtahun' => $minggudalamtahun,
                'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya,
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal,
            ]);
            // $testretrain = $this->callAPI('POST', 'http://127.0.0.1:5000/retrain', json_encode([
            //     'kabupaten' => 99,
            //     'tahun' => $tahun,
            //     "ppkm" => 1,
            //     'minggudalamtahun' => $minggudalamtahun,
            //     'positif' => $positif,
            //     'sembuh' => $sembuh,
            //     'meninggal' => $meninggal,
            // ]));
            $semuadata = $this->callAPI('POST', 'http://127.0.0.1:5000/retrain', json_encode($dataall));
            // die();
            if (!$succeed or !$semuadata) {
                session()->setFlashdata('error', 'Data tidak berhasil diupdate!');
            }
            session()->setFlashdata('success', 'Data berhasil diupdate!');
            return redirect()->to('/');
        } else {
            $succeed = $this->_myth_datas->save([
                'id_puskesmas' => $id_puskesmas,
                'id_kabupaten' => $id_kabupaten,
                'tahun' => $tahun,
                'minggudalamtahun' => $minggudalamtahun,
                'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya,
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal,
            ]);
            $semuadata = $this->callAPI('POST', 'http://127.0.0.1:5000/retrain', json_encode($dataall));
            // die();
            if (!$succeed or !$semuadata) {
                session()->setFlashdata('error', 'Data tidak berhasil ditambahkan!');
            }
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to('/');
        }
    }

    public function saveDataKabupaten()
    {
        $id_puskesmas = $this->request->getVar('grid-puskesmas4');
        $id_kabupaten = $this->request->getVar('grid-kabupaten4');
        $tahun = $this->request->getVar('grid-tahun');
        $minggudalamtahun = $this->request->getVar('grid-minggu-tahun');
        $minggudalamtahunselanjutnya = $this->request->getVar('grid-minggu-tahun-selanjutnya');
        $positif = $this->request->getVar('grid-positif');
        $sembuh = $this->request->getVar('grid-sembuh');
        $meninggal = $this->request->getVar('grid-sembuh');
        $checkdata = $this->_myth_datas->isData(
            $id_puskesmas,
            $id_kabupaten,
            $tahun,
            $minggudalamtahun,
            $minggudalamtahunselanjutnya
        );
        $dataall = $this->_myth_datas->getAll();

        // if($checkdata){
        //     return var_dump('update',$checkdata->id);
        // }else{
        //     return var_dump('tambah',$checkdata);
        // }

        if ($checkdata) {
            $succeed = $this->_myth_datas->update($checkdata->id, [
                'id_puskesmas' => $id_puskesmas,
                'id_kabupaten' => $id_kabupaten,
                'tahun' => $tahun,
                'minggudalamtahun' => $minggudalamtahun,
                'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya,
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal,
            ]);
            $semuadata = $this->callAPI('POST', 'http://127.0.0.1:5000/retrain', json_encode($dataall));
            if (!$succeed or !$semuadata) {
                session()->setFlashdata('error', 'Data tidak berhasil diupdate!');
            }
            session()->setFlashdata('success', 'Data berhasil diupdate!');
            return redirect()->to('/');
        } else {
            $succeed = $this->_myth_datas->save([
                'id_puskesmas' => $id_puskesmas,
                'id_kabupaten' => $id_kabupaten,
                'tahun' => $tahun,
                'minggudalamtahun' => $minggudalamtahun,
                'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya,
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal,
            ]);
            $semuadata = $this->callAPI('POST', 'http://127.0.0.1:5000/retrain', json_encode($dataall));
            if (!$succeed or !$semuadata) {
                session()->setFlashdata('error', 'Data tidak berhasil ditambahkan!');
            }
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to('/');
        }
    }

    public function saveDataPuskesmas()
    {
        $id_puskesmas = user()->id_puskesmas;
        $id_kabupaten = $this->_puskesmas->getKabupatenid2($id_puskesmas);
        $tahun = $this->request->getVar('grid-tahun');
        $minggudalamtahun = $this->request->getVar('grid-minggu-tahun');
        $minggudalamtahunselanjutnya = $this->request->getVar('grid-minggu-tahun-selanjutnya');
        $positif = $this->request->getVar('grid-positif');
        $sembuh = $this->request->getVar('grid-sembuh');
        $meninggal = $this->request->getVar('grid-sembuh');
        $checkdata = $this->_myth_datas_puskesmas->isData(
            $id_puskesmas,
            $id_kabupaten,
            $tahun,
            $minggudalamtahun,
            $minggudalamtahunselanjutnya
        );

        // if($checkdata){
        //     return var_dump('update',$checkdata);
        // }else{
        //     return var_dump('tambah',$checkdata);
        // }

        if ($checkdata) {
            $succeed = $this->_myth_datas_puskesmas->update($checkdata->id, [
                'id_puskesmas' => $id_puskesmas,
                'id_kabupaten' => $id_kabupaten,
                'tahun' => $tahun,
                'minggudalamtahun' => $minggudalamtahun,
                'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya,
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal,
            ]);
            if (!$succeed) {
                session()->setFlashdata('error', 'Data tidak berhasil diupdate!');
            }
            session()->setFlashdata('success', 'Data berhasil diupdate!');
            return redirect()->to('/');
        } else {
            $succeed = $this->_myth_datas_puskesmas->save([
                'id_puskesmas' => $id_puskesmas,
                'id_kabupaten' => $id_kabupaten,
                'tahun' => $tahun,
                'minggudalamtahun' => $minggudalamtahun,
                'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya,
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal,
            ]);
            if (!$succeed) {
                session()->setFlashdata('error', 'Data tidak berhasil ditambahkan!');
            }
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to('/');
        }
    }

    public function Prediksi()
    {
        $id_kabupaten = $this->request->getVar('grid-kabupaten3');
        $tahun = $this->request->getVar('grid-tahun-prediksi');
        $minggudalamtahun = $this->request->getVar('grid-minggu-tahun-prediksi');
        $minggudalamtahunselanjutnya = $this->request->getVar('grid-minggu-tahun-selanjutnya-prediksi');
        $positif = $this->request->getVar('grid-positif-prediksi');
        $sembuh = $this->request->getVar('grid-sembuh-prediksi');
        $meninggal = $this->request->getVar('grid-meninggal-prediksi');

        $kabupatenprediksi  = $this->_puskesmas->getKabupatenid($id_kabupaten);

        session()->setFlashdata('tminggudalamtahun', $minggudalamtahun);
        // $dataall = $this->_myth_datas->getAll();
        // print_r(json_encode($dataall));
        // $semuadata = $this->callAPI('POST', 'http://127.0.0.1:5000/test', json_encode($dataall));
        // die();

        $data = [
            "minggu" => (int)$minggudalamtahun,
            "ppkm" => 1,
            "kabupaten" => (int)$id_kabupaten,
            'positif' => (int)$positif,
            'sembuh' => (int)$sembuh,
            'meninggal' => (int)$meninggal,
        ];

        // session()->setFlashdata('prediksiSuccess',$data);
        $dataallPerform = $this->_myth_datas->getAll();
        $performdata = $this->callAPI('POST', 'http://127.0.0.1:5000/performance', json_encode($dataallPerform));

        $regressionpositif = $this->callAPI('POST', 'http://127.0.0.1:5000/regression/positif', json_encode($data));
        $regressionmeninggal = $this->callAPI('POST', 'http://127.0.0.1:5000/regression/meninggal', json_encode($data));
        $regressionsembuh = $this->callAPI('POST', 'http://127.0.0.1:5000/regression/sembuh', json_encode($data));
        $bayesianpositif = $this->callAPI('POST', 'http://127.0.0.1:5000/bayesian/positif', json_encode($data));
        $bayesianmeninggal = $this->callAPI('POST', 'http://127.0.0.1:5000/bayesian/meninggal', json_encode($data));
        $bayesiansembuh = $this->callAPI('POST', 'http://127.0.0.1:5000/bayesian/sembuh', json_encode($data));
        $annpositif = $this->callAPI('POST', 'http://127.0.0.1:5000/ann/positif', json_encode($data));
        $annmeninggal = $this->callAPI('POST', 'http://127.0.0.1:5000/ann/meninggal', json_encode($data));
        $annsembuh = $this->callAPI('POST', 'http://127.0.0.1:5000/ann/sembuh', json_encode($data));
        
        
        $responserp = json_decode($regressionpositif, true);
        $responserm = json_decode($regressionmeninggal, true);
        $responsers = json_decode($regressionsembuh, true);
        $responsebp = json_decode($bayesianpositif, true);
        $responsebm = json_decode($bayesianmeninggal, true);
        $responsebs = json_decode($bayesiansembuh, true);
        $responseap = json_decode($annpositif, true);
        $responseam = json_decode($annmeninggal, true);
        $responseas = json_decode($annsembuh, true);
        $performdataall = json_decode($performdata, true);

        $data = array();
        $data = array(
            "regressionpositif" => $responserp < 1 ? 0 : floor($responserp),
            "regressionmeninggal" => $responserm  < 1 ? 0 : floor($responserm),
            "regressionsembuh" => $responsers  < 1 ? 0 : floor($responsers),
            "bayesianpositif" => $responsebp  < 1 ? 0 : floor($responsebp),
            "bayesianmeninggal" => $responsebm  < 1 ? 0 : floor($responsebm),
            "bayesiansembuh" => $responsebs  < 1 ? 0 : floor($responsebs),
            "annpositif" => $responseap[0]  < 1 ? 0 : floor($responseap[0]),
            "annmeninggal" => $responseam[0]  < 1 ? 0 : floor($responseam[0]),
            "annsembuh" => $responseas[0]  < 1 ? 0 : floor($responseas[0]),
            "performance" => $performdataall,
        );
        // $data['prediksi'] = $response;
        // echo $response;
        if (!$responserp or !$responserm or !$responsers or !$responsers or !$responsebp or !$responsebm or !$responsebs or !$responseap or !$responseam or !$responseas) {
            session()->setFlashdata('error', 'Data tidak berhasil diprediksi!');
        }

        // if ($data['annpositif'] >= 1) {
        //     $num = explode('+', $data['annpositif']);
        //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
        //     $float = number_format($data['annpositif'], $precision);
        //     print_r(number_format((float)$float, 0));
        // } else {
        //     $num = explode('-', $data['annpositif']);
        //     $precision = $num[1] + strlen(filter_var($num[0], FILTER_SANITIZE_NUMBER_INT)) - 1;
        //     $float = number_format($data['annpositif'], $precision);
        //     print_r(round($float));
        // }
        // print_r($data);

        $getsumkab = $this->_myth_datas->getsumkab($id_kabupaten,((int)$minggudalamtahun)-1,((int)$minggudalamtahun)-7);

        $regressionpositifhistory = array();
        $regressionmeninggalhistory = array();
        $regressionsembuhhistory = array();
        foreach ($getsumkab as $gs) {
            $data2 = [
                "minggu" => (int)$minggudalamtahun,
                "ppkm" => 1,
                "kabupaten" => (int)$id_kabupaten,
                'positif' => (int)$gs->positif,
                'sembuh' => (int)$gs->sembuh,
                'meninggal' => (int)$gs->meninggal
            ];
            $regressionpositif = $this->callAPI('POST', 'http://127.0.0.1:5000/regression/positif', json_encode($data2));
            $regressionmeninggal = $this->callAPI('POST', 'http://127.0.0.1:5000/regression/meninggal', json_encode($data2));
            $regressionsembuh = $this->callAPI('POST', 'http://127.0.0.1:5000/regression/sembuh', json_encode($data2));
            $bayesianpositif = $this->callAPI('POST', 'http://127.0.0.1:5000/bayesian/positif', json_encode($data2));
            $bayesianmeninggal = $this->callAPI('POST', 'http://127.0.0.1:5000/bayesian/meninggal', json_encode($data2));
            $bayesiansembuh = $this->callAPI('POST', 'http://127.0.0.1:5000/bayesian/sembuh', json_encode($data2));
            $annpositif = $this->callAPI('POST', 'http://127.0.0.1:5000/ann/positif', json_encode($data2));
            $annmeninggal = $this->callAPI('POST', 'http://127.0.0.1:5000/ann/meninggal', json_encode($data2));
            $annsembuh = $this->callAPI('POST', 'http://127.0.0.1:5000/ann/sembuh', json_encode($data2));

            $regressionpositifhistory[] = json_decode($regressionpositif, true) < 1 ? 0 : floor(json_decode($regressionpositif, true));
            $regressionmeninggalhistory[] = json_decode($regressionmeninggal, true) < 1 ? 0 : floor(json_decode($regressionmeninggal, true));
            $regressionsembuhhistory[] = json_decode($regressionsembuh, true) < 1 ? 0 : floor(json_decode($regressionsembuh, true));

            $bayesianpositifhistory[] = json_decode($bayesianpositif, true) < 1 ? 0 : floor(json_decode($bayesianpositif, true));
            $bayesianmeninggalhistory[] = json_decode($bayesianmeninggal, true) < 1 ? 0 : floor(json_decode($bayesianmeninggal, true));
            $bayesiansembuhhistory[] = json_decode($bayesiansembuh, true) < 1 ? 0 : floor(json_decode($bayesiansembuh, true));

            $annpositifhistory[] = json_decode($annpositif, true)[0] < 1 ? 0 : floor(json_decode($annpositif, true)[0]);
            $annmeninggalhistory[] = json_decode($annmeninggal, true)[0] < 1 ? 0 : floor(json_decode($annmeninggal, true)[0]);
            $annsembuhhistory[] = json_decode($annsembuh, true)[0] < 1 ? 0 : floor(json_decode($annsembuh, true)[0]);
        };
        $hasilrepredik = array(
            "positifreg" => $regressionpositifhistory,
            "meninggalreg" => $regressionmeninggalhistory,
            "sembuhreg" => $regressionsembuhhistory,

            "positifbay" => $bayesianpositifhistory,
            "meninggalbay" => $bayesianmeninggalhistory,
            "sembuhbay" => $bayesiansembuhhistory,

            "positifann" => $annpositifhistory,
            "meninggalann" => $annmeninggalhistory,
            "sembuhann" => $annsembuhhistory
        );

        // print_r($hasilrepredik);
        // die();

        session()->setFlashdata('success', 'Data berhasil diprediksi!');
        session()->setFlashdata('prediksiSuccess', 'Data berhasil diprediksi!');
        session()->setFlashdata('prediksi', $data);
        session()->setFlashdata('reprediksi', $hasilrepredik);


        $getsumkab = $this->_myth_datas->getsumkab($id_kabupaten,((int)$minggudalamtahun)-1,((int)$minggudalamtahun)-7);
        $positif = array();
        $sembuh = array();
        $meninggal = array();
        foreach ($getsumkab as $gs) {
            $positif[] = $gs->positif;
            $sembuh[] = $gs->sembuh;
            $meninggal[] = $gs->meninggal;
        };
        $output = array(
            "positif" => $positif,
            "sembuh" => $sembuh,
            "meninggal" => $meninggal
        );
        session()->setFlashdata('kabupaten', $kabupatenprediksi);
        session()->setFlashdata('nilai', $output);
        session()->setFlashdata('ttahun', $tahun);
        
        // session()->setFlashdata('tminggudalamtahunselanjutnya', $minggudalamtahunselanjutnya);
        return redirect()->to('/');
    }


    public function Data_aktual()
    {
        $minggudalamtahun = $this->request->getVar('minggudalamtahun');
        $id_kab = $this->request->getVar('id_kab');
        $role = $this->request->getVar('role');
        $data = $this->_myth_datas->getTotal();
        $data_jateng = $this->_myth_datas->getTotal(((int)$minggudalamtahun)-1,((int)$minggudalamtahun)-7);
        if($role=='superAdmin'){
            $data_predict = $this->_myth_datas->getTotal(((int)$minggudalamtahun)-1,((int)$minggudalamtahun)-7);
        }else{
            $data_predict = $this->_myth_datas->getsumkab($id_kab,((int)$minggudalamtahun)-1,((int)$minggudalamtahun)-7);
        }

        $positif = array();
        $sembuh = array();
        $meninggal = array();
        $positif_predict = array();
        $sembuh_predict = array();
        $meninggal_predict = array();
        $positif_jateng = array();
        $sembuh_jateng = array();
        $meninggal_jateng = array();
        $minggudalamtahun = array();
        $minggudalamtahun_predict = array();
        foreach ($data as $dataaktual) {
            $positif[] = $dataaktual->positif;
            $sembuh[] = $dataaktual->sembuh;
            $meninggal[] = $dataaktual->meninggal;
            $minggudalamtahun[] = $dataaktual->minggudalamtahun;
        };
        foreach ($data_predict as $datapredik) {
            $positif_predict[] = $datapredik->positif;
            $sembuh_predict[] = $datapredik->sembuh;
            $meninggal_predict[] = $datapredik->meninggal;
            $minggudalamtahun_predict[] = $datapredik->minggudalamtahun;
        };
        foreach ($data_jateng as $datajtg) {
            $positif_jateng[] = $datajtg->positif;
            $sembuh_jateng[] = $datajtg->sembuh;
            $meninggal_jateng[] = $datajtg->meninggal;
        };
        $output = array(
            "positif" => $positif,
            "sembuh" => $sembuh,
            "positif_predict" => $positif_predict,
            "sembuh_predict" => $sembuh_predict,
            "positif_jateng" => $positif_jateng,
            "sembuh_jateng" => $sembuh_jateng,
            "minggudalamtahun" => $minggudalamtahun,
            "minggudalamtahun_predict" => $minggudalamtahun_predict,
            "meninggal" => $meninggal,
            "meninggal_predict" => $meninggal_predict,
            "meninggal_jateng" => $meninggal_jateng
        );
        echo json_encode($output);
    }

    public function dropdownTahun()
    {
        $minggu = $this->request->getVar('minggu');
        $listtahun = $this->_myth_datas->getTahun($minggu);
        $lists = "";
        foreach ($listtahun as $data) {
            $lists .= "<option value='" . $data->tahun . "'>" . $data->tahun . "</option>";
        }
        $callback = array('list_tahun' => $lists);
        echo json_encode($callback);
    }

    public function minggu_aktual()
    {
        $minggu = $this->request->getVar('minggu');
        $tahun = $this->request->getVar('tahun');
        $data = $this->_myth_datas->getTanggalAktual($minggu, $tahun);

        $positif = array();
        $sembuh = array();
        $meninggal = array();
        $minggudalamtahun = array();

        foreach ($data as $dataaktual) {
            $positif[] = $dataaktual->positif;
            $sembuh[] = $dataaktual->sembuh;
            $meninggal[] = $dataaktual->meninggal;
            $minggudalamtahun[] = $dataaktual->minggudalamtahun;
        };
        $output = array(
            "positif" => $positif,
            "sembuh" => $sembuh,
            "minggudalamtahun" => $minggudalamtahun,
            "meninggal" => $meninggal
        );
        echo json_encode($output);
    }
}
