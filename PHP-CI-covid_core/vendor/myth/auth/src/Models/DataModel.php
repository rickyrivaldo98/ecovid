<?php

namespace Myth\Auth\Models;

use CodeIgniter\Model;
use Faker\Generator;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;

/**
 * @method User|null first()
 */
class DataModel extends Model
{
    protected $table          = 'data_aktual';
    protected $primaryKey     = 'id';
    protected $returnType     = User::class;
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'id_puskesmas', 'id_kabupaten', 'tahun', 'minggudalamtahun', 'minggudalamtahunselanjutnya',
        'positif', 'sembuh', 'meninggal',
    ];
    protected $useTimestamps   = true;
    // protected $validationRules = [
    //     'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
    //     'username'      => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
    //     'password_hash' => 'required',
    // ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $afterInsert        = ['addToGroup'];

    /**
     * The id of a group to assign.
     * Set internally by withGroup.
     *
     * @var int|null
     */
    protected $assignGroup;

    /**
     * Logs a password reset attempt for posterity sake.
     */
    public function logResetAttempt(string $email, ?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_reset_attempts')->insert([
            'email'      => $email,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Logs an activation attempt for posterity sake.
     */
    public function logActivationAttempt(?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_activation_attempts')->insert([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Sets the group to assign any users created.
     *
     * @return $this
     */
    public function withGroup(string $groupName)
    {
        $group = $this->db->table('auth_groups')->where('name', $groupName)->get()->getFirstRow();

        $this->assignGroup = $group->id;

        return $this;
    }

    public function isData(
        int $idkabupaten,
        int $idpuskesmas,
        int $tahun,
        int $minggudalamtahun,
        int $minggudalamtahunselanjutnya
    ) {
        $like = array('id_kabupaten' => $idkabupaten, 'id_puskesmas' => $idpuskesmas, 'tahun' => $tahun, 'minggudalamtahun' => $minggudalamtahun, 'minggudalamtahunselanjutnya' => $minggudalamtahunselanjutnya);
        $data = $this->db->table('data_aktual')->like($like)->get()->getFirstRow();

        return $data;
    }


    /**
     * Clears the group to assign to newly created users.
     *
     * @return $this
     */
    public function clearGroup()
    {
        $this->assignGroup = null;

        return $this;
    }

    /**
     * If a default role is assigned in Config\Auth, will
     * add this user to that group. Will do nothing
     * if the group cannot be found.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    protected function addToGroup($data)
    {
        if (is_numeric($this->assignGroup)) {
            $groupModel = model(GroupModel::class);
            $groupModel->addUserToGroup($data['id'], $this->assignGroup);
        }

        return $data;
    }

    /**
     * Faked data for Fabricator.
     */
    public function fake(Generator &$faker): User
    {
        return new User([
            'email'    => $faker->email,
            'username' => $faker->userName,
            'password' => bin2hex(random_bytes(16)),
        ]);
    }

    public function getTotal($mingguterakhir=null,$mingguselisih=null)
    {
        $db = \Config\Database::connect();
        if(!$mingguterakhir || !$mingguselisih){
            $sql = '
            select * from ( select
            sum(positif) as positif, sum(sembuh) as sembuh, sum(meninggal) as meninggal, tahun, minggudalamtahun
            FROM `data_aktual`
            group by tahun, minggudalamtahun
            order by tahun desc, minggudalamtahun desc
            limit 7) as a
            order by minggudalamtahun;
        ';
        }else{
            $sql = '
            select * from ( select
            sum(positif) as positif, sum(sembuh) as sembuh, sum(meninggal) as meninggal, tahun, minggudalamtahun
            FROM `data_aktual`
            where minggudalamtahun BETWEEN ' . $mingguselisih . ' AND ' . $mingguterakhir . '
            group by tahun, minggudalamtahun
            order by tahun desc, minggudalamtahun desc
            limit 7) as a
            order by minggudalamtahun;
        ';
        }
       
        
        $data = $this->db->query($sql)->getResult();
        // ->get()->getResult();
        return $data;
    }

    public function getMinggu()
    {
        $db = \Config\Database::connect();
        $sql = '
        select distinct minggudalamtahun
        from `data_aktual`;
        ';
        $data = $this->db->query($sql)->getResult();
        // ->get()->getResult();
        return $data;
    }

    public function getTahun($minggu)
    {
        $db = \Config\Database::connect();
        $sql = '
        select distinct tahun
        from `data_aktual`
        where minggudalamtahun= ' . $minggu . ';
        ';
        $data = $this->db->query($sql)->getResult();
        // ->get()->getResult();
        return $data;
    }

    public function getTanggalAktual($minggu, $tahun)
    {
        $db = \Config\Database::connect();
        $sql = '
        select minggudalamtahun,tahun, sum(positif) as positif, sum(Sembuh) as sembuh, sum(meninggal) as meninggal 
        from `data_aktual`
        where (minggudalamtahun between ' . $minggu . ' and ' . $minggu . ' +6 ) and tahun = ' . $tahun . '
        group by minggudalamtahun, tahun 
        order by tahun,minggudalamtahun;
        ';
        $data = $this->db->query($sql)->getResult();
        // ->get()->getResult();
        return $data;
    }


    public function getAll()
    {
        $db = \Config\Database::connect();
        $sql = '
        select 
        cast(id_kabupaten as signed) as id_kabupaten,
        cast(minggudalamtahun as signed) as minggudalamtahun,
        cast(sembuh as signed) as sembuh,
        cast(positif as signed) as positif,
        cast(meninggal as signed) as meninggal
        from `data_aktual`;;
        ';
        $data = $this->db->query($sql)->getResult();
        // ->get()->getResult();
        return $data;
    }

    public function getsumkab($id,$mingguterakhir=null,$mingguselisih=null)
    {
        $db = \Config\Database::connect();
        $sql = '
            select * from ( select
            sum(positif) as positif, sum(sembuh) as sembuh, sum(meninggal) as meninggal, tahun, minggudalamtahun
            FROM `data_aktual`
            where id_kabupaten = ' . $id . ' 
            and minggudalamtahun BETWEEN ' . $mingguselisih . ' AND ' . $mingguterakhir . '
            group by tahun, minggudalamtahun
            order by tahun desc, minggudalamtahun desc
            limit 7) as a
            order by minggudalamtahun;
        ';
        $data = $this->db->query($sql)->getResult();
        // ->get()->getResult();
        return $data;
    }
}
