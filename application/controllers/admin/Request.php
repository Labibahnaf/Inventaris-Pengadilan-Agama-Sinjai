<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
    
    private $view   = 'admin/request';
    private $url    = 'Request';

    public function __construct() {
		parent::__construct();
		$this->load->model('Modelku', 'crud'); 
		$this->load->model('Request_model', 'rm'); 

        if ($this->session->userdata('status') !='login') {
            redirect('Auth');
        }
	}

    // REQ START //
    public function index()
    {
        $nav = [
            'halamanreq'   => $this->url,
            'address'   => ''
        ];

        $data = [
            'requestg' => $this->rm->getReq()
        ];
        $this->load->view("$this->view/index", $data);
    }

    public function create()
    {
        $data = [
            'barang' => $this->crud->getData("barang")->result_array(),
            'requestg' => $this->rm->getReq()
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
        $nav = [
            'requestg' => $this->rm->getReq()
        ];
        $data = $nav + $dataReq;
        $this->crud->tambah('request', $data);

        echo "<script>
            alert('Request Barang Berhasil');
            window.location='".site_url("$this->view")."'
        </script>";
        // redirect("$this->view"); 
    }

    public function edit($id = null){

        $nav = [
            'halamanreq'   => $this->url,
            'address'   => 'Request Barang'
        ];

        $dataStatusReq = [
            'status' => $this->crud->getData('request_status')->result_array(),
            'requestg' => $this->rm->getReq()
        ];

        $dataReq = [
            'request' => $this->rm->getReqId($id)
            
        ];
        
        $data = $nav + $dataReq + $dataStatusReq;

        // echo json_encode($data);

        $this->load->view("$this->view/edit", $data);
    }

    public function update(){
        $post = $this->input->post();
        
        if($post['idStatus'] == 2){

            $dataUpdate = [
                'status'    => $post['idStatus'],
                'komentar'  => $post['komentar']
            ];
            
            // $this->crud->edit('request',$dataUpdate, ['id' => $post['idRequest']]);
            
        }else if($post['idStatus'] == 3){

            $dataBarang = $this->crud->getData_khusus('jmlStok', 'barangStok', ['id' => $post['idBarang']])->row_array();

            if($post['jml'] <= $dataBarang['jmlStok']){
                $dataUpdate = [
                    'status'    => $post['idStatus'],
                    'komentar'  => $post['komentar']
                ];

                $dataInputan = [
                    'idUser'    => $post['idUser'],
                    'idBarang'  => $post['idBarang'],
                    'transaksi' => 'Kurang',
                    'tanggal'   => date('Y-m-d'),
                    'jml'       => $post['jml']
                ];
                $this->crud->tambah('mutasi', $dataInputan);
    
                
                $dataStok = $dataBarang['jmlStok'] - $post['jml'];
                $this->crud->edit('barangStok', ['jmlStok' => $dataStok], ['idBarang' => $post['idBarang']]);    
            }else{

                $dataUpdate = [
                    'status'    => '2',
                    'komentar'  => 'Jumlah Permintaan Tidak Cukup Stok'
                ];
            }

        }

        $this->crud->edit('request',$dataUpdate, ['id' => $post['idRequest']]);

        echo "<script>
            alert('Update Status Berhasil');
            window.location='".site_url("$this->view")."'
        </script>";
        // redirect("$this->view"); 
    }
}