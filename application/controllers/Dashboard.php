<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		// $this->load->model('m_pengunjung');
        $this->load->model('M_pengguna');
        $this->load->model('M_login');
	}

	function index(){
		if($this->session->userdata('akses')=='1'){
			$this->load->view('admin/v_dashboard');
		}elseif($this->session->userdata('akses')=='2'){
			$this->load->view('admin/v_dashboard');
		}else{
			// redirect('administrator');
		}
	
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */