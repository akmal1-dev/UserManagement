<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_pengguna');
		$this->load->library('upload');

	}

	public function index(){
		$this->load->view('v_login');
	}

	function simpan_pengguna(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '65%';
					$config['width']= 300;
					$config['height']= 300;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$nama=$this->input->post('xnama');
					$jenkel=$this->input->post('xjenkel');
					$username=$this->input->post('xusername');
					$password=$this->input->post('xpassword');
					$konfirm_password= $this->input->post('xpassword2');
					$level=$this->input->post('xlevel');

					 if ($password <> $konfirm_password) {
						 echo $this->session->set_flashdata('msg','error');
						   redirect('login');
					 }else{
						   $this->M_pengguna->simpan_pengguna($nama,$jenkel,$username,$password,$level,$gambar);
						echo $this->session->set_flashdata('msg','success');
						   redirect('login');
						   
					   }
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('login');
			}
			 
		}else{
			$nama=$this->input->post('xnama');
			$jenkel=$this->input->post('xjenkel');
			$username=$this->input->post('xusername');
			$password=md5($this->input->post('xpassword'));
			$konfirm_password=md5($this->input->post('xpassword2'));
			$level=$this->input->post('xlevel');
			if ($password <> $konfirm_password) {
				 echo $this->session->set_flashdata('msg','error');
				   redirect('pengguna');
			 }else{
				   $this->m_pengguna->simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$level);
				echo $this->session->set_flashdata('msg','success');
				   redirect('pengguna');
			   }
		} 

}



	function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", md5($this->input->post('password'))));
        $u=$username;
        $p=$password;
        $cadmin=$this->M_login->cekadmin($u,$p);
        echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['pengguna_level']=='1'){
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['pengguna_id'];
            $user_nama=$xcadmin['pengguna_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
            $this->session->set_userdata('level',$xcadmin['pengguna_level']);
            echo $this->session->set_flashdata('msg','success');
            redirect('dashboard');
         }else{
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['pengguna_id'];
             $user_nama=$xcadmin['pengguna_nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
             $this->session->set_userdata('level',$xcadmin['pengguna_level']);
             echo $this->session->set_flashdata('msg','success');
             redirect('dashboard');
         }

       }else{
         echo $this->session->set_flashdata('msg','error');
         redirect('login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

