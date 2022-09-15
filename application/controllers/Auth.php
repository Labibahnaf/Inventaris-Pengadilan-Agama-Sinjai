<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	public function __construct() {
		parent::__construct();
		$this->load->model('Modelku', 'crud'); 
	}
    
	public function index()
	{
		// check_already_login();
		$this->load->view('auth/login');
	}

	public function proccess(){

        if ($this->input->method() == 'post')
        {
            // Request
            $post   = $this->input->post();

            // Check Users
            $users  = $this->crud->getData_khusus('*', 'user', ['username' => $post['username']])->row_array();

            if ($users == null) {
                    echo "<script>
                        alert('Akun tidak ditemukan, periksa username dan password');
                        window.location='".site_url('Auth')."'
				    </script>";

                    // redirect('Auth');
            }else{
                if (!password_verify($post['password'], $users['password'])) {
                    echo "<script>
					    alert('Password Salah');
					    window.location='".site_url('Auth')."'
				    </script>";
                    
                    // redirect('Auth');
                }else{

                    $dataUsers = [
                        'id'        => $users['id'],
                        'nama'      => $users['nama'],
                        'user'      => $users['username'],
                        'level'     => $users['level'],
                        'bagian'    => $users['bagian'],
                        'status'    => 'login',
                    ];

                    $this->session->set_userdata($dataUsers);

                    if ($users['level'] == 1)
                        echo "<script>
                            alert('Login Berhasil');
                            window.location='".site_url('admin/Dashboard')."'
                        </script>";
                        // redirect('admin/Dashboard');
                    else if ($users['level'] == 2)
                        echo "<script>
                            alert('Login Berhasil');
                            window.location='".site_url('staff/Dashboard')."'
                        </script>";
                        // redirect('staff/Dashboard');
                }
            }
            
        }else{
            // $response['code'] = '400';
            // $response['message'] = 'Masukkan Username dan Password';

            redirect('Auth');
        }

        // $this->output
        // ->set_content_type('application/json')
        // ->set_output(json_encode($response, JSON_PRETTY_PRINT));
	}


	public function logout()
	{
		$params = array('userid','level','status','idUser');
		$this->session->unset_userdata($params);
		redirect('auth');
	}

    public function registrasi()
	{
        $post       = $this->input->post();

        $post['username']   = 'Admin';
        $post['password']   = 'nopal';
        $post['nama']       = 'Bang Nopal Asoy';
        $post['alamat']     = 'Pemalang';
        $post['bagian']     = 'Admin';
        $post['level']      = '1'; 

        if(isset($post['username']) && isset($post['password'])){
            $cekUsername = count($this->crud->getData_khusus('id', 'user',['username' => $post['username']])->result_array());
            if($cekUsername == 0){
                $dataUsers = [
                    // rand(1000, 9999)
                    'username'      => $post['username'],
                    'password'      => password_hash($post['password'], PASSWORD_BCRYPT),
                    'sandi'         => $post['password'],
                    'nama'          => $post['nama'],
                    'alamat'        => $post['alamat'],
                    'bagian'        => $post['bagian'],
                    'level'         => $post['level']
                ];
        
                $this->crud->tambah('user', $dataUsers);
                
                $response['code'] = '201';
                $response['message'] = 'Akun berhasil didaftarkan';
            }else{
                $response['code'] = '401';
                $response['message'] = 'Username Sudah Ada';
            }
        }else{
            $response['code'] = '400';
            $response['message'] = 'Isian tidak sesuai';
        }

        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT));
	}

}

