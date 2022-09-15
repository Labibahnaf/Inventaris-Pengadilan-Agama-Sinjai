<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    
    private $view   = 'admin/barang/';
    private $url    = 'Dashboard';

    public function __construct() {
		parent::__construct();
		$this->load->model('Modelku', 'crud'); 
        $this->load->model('Request_model', 'rm');

        if ($this->session->userdata('status') !='login') {
            redirect('Auth');
        }
	}

    // ITEM START //
    public function index()
    {
        $data_item = $this->crud->getData("barang")->result_array();
        $data = [
            'datItm' => $data_item,
            'requestg' => $this->rm->getReq()
        ];

        $this->load->view("$this->view/index",$data);
    }

    public function create()
    {
        $nav = [
            'halaman'   => $this->url,
            'address'   => 'Tambah Barang',
            'requestg' => $this->rm->getReq()
        ];

        $data = $nav;

        $this->load->view("$this->view/create",$data);
    }

    public function store()
    {
        $post = $this->input->post();

        $dataInputan = array(
            'nama'      => $post['nama'],
            'idUser'    => $this->session->userdata('id'),
            'status'    => $post['status'],
            'tanggal'   => date('Y-m-d')
        );
        $this->crud->tambah("barang", $dataInputan);
        $idBarang = $this->db->insert_id();

        $dataStok = array(
            'idBarang'  => $idBarang,
            'tanggal'   => date('Y-m-d')
        );
        $this->crud->tambah("barangStok", $dataStok);
        echo "<script>
            alert('Tambah Barang Berhasil');
            window.location='".site_url("$this->view")."'
        </script>";
        // redirect("$this->view");
    }

    public function delitm($id){
        $dataIn = array(
            'id' => $id
        );
        $this->crud->hapus('barang', $dataIn);
        redirect("$this->view");
    }

    public function edit($id){
        
        $data_item = $this->crud->getData_khusus('*','barang', ['id' => $id])->row_array();

        $data = [
            'barang' => $data_item,
            'requestg' => $this->rm->getReq()
        ];

        // echo json_encode($data);
        $this->load->view("$this->view/edit", $data);
    }

    public function updateItem(){
        $post = $this->input->post();
        $dataInputan = array(
            'nama'      => $post['nama'],
            'status'    => $post['status']
        );

        $data_lokasi = $this->crud->edit("barang", $dataInputan, ['id' => $post['id']]);
        echo "<script>
            alert('Edit Barang Berhasil');
            window.location='".site_url("$this->view")."'
        </script>";
        // redirect("$this->view"); 
    }
    // ITEM END //
}