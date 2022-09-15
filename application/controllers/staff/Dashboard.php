<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $view   = 'staff/dashboard';
    private $url    = 'Dashboard';

	public function __construct() {
		parent::__construct();
		$this->load->model('Modelku', 'crud'); 
		$this->load->model('Request_model', 'rm'); 

        if ($this->session->userdata('status') !='login') {
            redirect('Auth');
        }
	}

	public function index()
    {
        $data = [
            'request' => $this->rm->getReqUser($this->session->userdata('id'))
        ];
        // echo json_encode($data);

        $this->load->view("$this->view/index", $data);
    }

    public function create()
    {
        $data = [
            'barang' => $this->crud->getData("barang")->result_array()
        ];
        $this->load->view("$this->view/create", $data);
    }

    public function store()
    {
        $post = $this->input->post();
        

        $dataReq = [
            'idUser'    => $this->session->userdata('id'),
            'idBarang'  => $post['idBarang'],
            'jml'       => $post['jml'],
            'pesan'     => $post['pesan'],
            'komentar'  => 'Belum ada',
            'tanggal'   => date('Y-m-d'),
            'status'    => '1',
        ];

        // $barang = $this->crud->getData("barang")->result_array();
        // foreach($barang as $br)
        // {
        //     $barang_a = $br['id'];
        // }
        
        // $sum = $this->crud->getSum('jml', 'mutasi', ['idBarang' => $barang_a])->row_array();
        // $sum = $this->crud->getData_khusus('jmlStok', 'barangStok', ['idBarang' => $barang_a])->row_array();
        $sum = $this->crud->getData_khusus('jmlStok', 'barangStok', ['idBarang' => $dataReq['idBarang']])->row_array();
        // echo "<script>
        //          alert('".$sum['jmlStok']." & ".$dataReq['jml']."');
        //          window.location='".site_url("$this->view")."'
        //      </script>";
        // if($dataReq['jml'] <= $sum['jml']){ 
        //     $this->crud->tambah('request', $dataReq);
        //     echo "<script>
        //         alert('Request Barang Berhasil');
        //         window.location='".site_url("$this->view")."'
        //     </script>";
        // }else{
        //     echo "<script>
        //         alert('Barang tidak mencukupi');
        //         window.location='".site_url("$this->view")."'
        //     </script>";
        // }
        if($dataReq['jml'] <= $sum['jmlStok']){ 
            $this->crud->tambah('request', $dataReq);
            echo "<script>
                alert('Request Barang Berhasil');
                window.location='".site_url("$this->view")."'
            </script>";
        }else{
            echo "<script>
                alert('Barang tidak mencukupi');
                window.location='".site_url("$this->view/create")."'
            </script>";
        }
        
        // redirect("$this->view"); 
    }
}
