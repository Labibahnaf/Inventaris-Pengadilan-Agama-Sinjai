<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $view   = 'admin/dashboard/';
    private $url    = 'Dashboard';

    public function __construct() {
		parent::__construct();
		$this->load->model('Modelku', 'crud'); 
        $this->load->model('Request_model', 'rm');

        if ($this->session->userdata('status') !='login') {
            redirect('Auth');
        }
	}

    // USER START //
    public function index()
    {
        $data_user = $this->crud->getData("user")->result_array();
        $data = array(
            "datUsr" => $data_user,
            'requestg' => $this->rm->getReq()
        );
        $this->load->view('admin/user/index', $data);
    }
    
    public function adduser()
    {
        $data = array(
            'requestg' => $this->rm->getReq()
        );
        $this->load->view('admin/user/create', $data);
    }

    public function tambah_user()
    {

        // $dataInputan = array(
        //     'nama' => $this->input->post('nama'),
        //     'username' => $this->input->post('username'),
        //     'password' => md5($this->input->post('password')),
        //     'alamat' => $this->input->post('alamat'),
        //     'level' => $this->input->post('level')
        // );

        $post = $this->input->post();

        if($post['level'] == 1)
            $bagian = 'Admin';
        else if($post['level'] == 2)
            $bagian = 'Staff';

        $dataInputan = array(
            'nama'      => $post['nama'],
            'username'  => $post['username'],
            'password'  => password_hash($post['password'], PASSWORD_BCRYPT),
            'sandi'    => $post['password'],
            'alamat'    => $post['alamat'],
            'bagian'    => $bagian,
            'level'     => $post['level']
        );

        $this->crud->tambah("user", $dataInputan);
        echo "<script>
            alert('Tambah User Berhasil');
            window.location='".site_url('admin/User')."'
        </script>";
        // redirect('admin/User'); 
    }

    public function deluser($id){
        $dataIn = array(
            'id' => $id
        );
        $this->crud->hapus('user', $dataIn);
        echo "<script>
            alert('Hapus User Berhasil');
            window.location='".site_url('admin/User')."'
        </script>";
        // redirect('admin/User');
    }

    public function ambil_DataWhereUser($id){
        $dataIn = array(
            'id' => $id,
        );
        $data_user = $this->crud->getData_khusus('*', 'user',$dataIn)->row_array();
        $data = array(
            "user" => $data_user
        );
        $this->load->view('admin/user/edit', $data);
    }

    public function updateUser(){

        $post = $this->input->post();

        $dataUbah = [
            'nama'      => $post['nama'],
            'password'  => password_hash($post['password'], PASSWORD_BCRYPT),
            'alamat'    => $post['alamat'],
            'level'     => $post['level'],
        ];
        $data_lokasi = $this->crud->edit("user", $dataUbah, ['id' => $this->session->userdata('id')]);
        
        echo "<script>
            alert('Edit User Berhasil');
            window.location='".site_url('admin/User')."'
        </script>";

    // public function updateUser(){

    //     $post = $this->input->post();

    //     $dataUbah = [
    //         'nama'      => $post['nama'],
    //         'alamat'    => $post['alamat'],
    //         'level'     => $post['level'],
    //     ];
    //     if($post('password')){

    //         $datpas = 'password'  -> password_hash($post['password'], PASSWORD_BCRYPT);
    //         $dataEdit = $dataUbah + $datpas;
    //         $data_lokasi = $this->crud->edit("user", $dataEdit, ['id' => $this->session->userdata('id')]);
    //     }else{
    //         $data_lokasi = $this->crud->edit("user", $dataUbah, ['id' => $this->session->userdata('id')]);
    //     }
        
    //     echo "<script>
    //         alert('Edit User Berhasil');
    //         window.location='".site_url('admin/User')."'
    //     </script>";
        // redirect('admin/User'); 
    } // USER END //

    
}