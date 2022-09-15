<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $view   = 'admin/dashboard';
    private $url    = 'Dashboard';

	public function __construct() {
		parent::__construct();
		$this->load->model('Modelku', 'crud'); 
		$this->load->model('Barang', 'br'); 
        $this->load->model('Request_model', 'rm');

        if ($this->session->userdata('status') !='login') {
            redirect('Auth');
        }
	}
	public function index()
	{
        $dataBarang = [
            'requestg' => $this->rm->getReq(),
            'barang'    => $this->br->getInfoBarang(),
        ];

        $nav = [
            'halaman'   => $this->url,
            'address'   => ''
        ];

        $data_stok = $this->crud->getData("mutasi")->result_array();
        $dataStk = array(
            "datStok" => $data_stok, 
        );

        $data = $nav + $dataBarang + $dataStk;

		$this->load->view("$this->view/index", $data);
	}

    public function create_stok($id = null)
    {
        $dataBarang = [
            'barang'    => $this->crud->getData_khusus('*', 'barang', ['id' => $id])->row_array()
        ];

        $nav = [
            'halaman'   => $this->url,
            'address'   => 'Tambah Stok',
            'requestg' => $this->rm->getReq()
        ];

        $data = $nav + $dataBarang;

        // echo json_encode($dataBarang['barang']); die;

        $this->load->view("$this->view/create_stok", $data);
    }

    public function store_stok()
    {

        $post = $this->input->post();

        $dataStok = [
            'idBarang'   => $post['idBarang'],
            // 'jmlStok'   => $post['jmlStok'],
            'tanggal'   => date('Y-m-d')
        ];
        $where['idBarang'] = $dataStok['idBarang'];
        $array = $this->crud->getData_khusus('jmlStok','barangStok',$where)->row_array();
        if($array['jmlStok'] != null){
            $dataStok['jmlStok'] = $post['jmlStok'] + $array['jmlStok'];
        }else{
            $dataStok['jmlStok'] = $post['jmlStok'];
        }

        $this->crud->edit('barangStok',$dataStok, ['idBarang' => $post['idBarang']]);

        $dataMutasi = [
            'idUser'    => $this->session->userdata('id'),
            'idBarang'  => $post['idBarang'],
            'transaksi' => 'Tambah',
            'tanggal'   => date('Y-m-d'),
            'jml'       => $post['jmlStok'],

        ];
        $this->crud->tambah('mutasi',$dataMutasi);

        echo "<script>
            alert('Tambah Stok Berhasil');
            window.location='".site_url("$this->view")."'
        </script>";
        // redirect("$this->view");
        // echo json_encode($dataStok); die;
    }
    
    public function bacaMutasi($id = null)
    {
        $dataMutasi = [
            'mutasi'    => $this->br->getMutasi($id),
            'requestg' => $this->rm->getReq()
        ];
        // echo json_encode($dataMutasi); die;


        $nav = [
            'halaman'   => $this->url,
            'address'   => 'Mutasi Stok'
        ];

        $data = $nav + $dataMutasi;

        // $this->load->view("$this->view/create_stok", $data);
        $this->load->view('admin/mutasi/index', $data);
    }
    // public function delMut($id){
    //     $dataIn = array(
    //         'id' => $id
    //     );
    //     $this->crud->hapus('mutasi', $dataIn);
    //     redirect('admin/Dashboard/bacaMutasi');
    // }

}
