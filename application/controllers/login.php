<?php 
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		
		function __construct()
		{
				parent::__construct();
					$this->load->model('M_login');
		}


		function index(){
			$data['page'] = "Login";
			$this->load->view('backend/loginbackend');
		}
		function proses_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_login->cek_login("users",$where)->num_rows();
		$cek2 = $this->M_login->cek_login("users",$where)->row_array();
		if($cek > 0){

			$data_session = array(
				'id' => $cek2['id'], 
				'nama' => $username,
				'fullname' => $cek2['user_fullname'],
				'level' => $cek2['user_level'],
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("adminbackend/report"));

		}else{
			echo "<script>
				alert('Password Dan Username Anda Salah');
				window.location = 'http://localhost/jm_project/adminbackend';
			</script>";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

 ?>