<?php
class Adminbackend extends CI_Controller{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('Users_model');
		$this->load->library('form_validation');        
		$this->load->library('datatables');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['page'] = 'Login';
		$this->load->view('backend/loginbackend', $data);
	}

	public function report()
	{
		$data['spk'] = $this->_getSpk();
		$data['ticket'] = $this->_getTicket();
		$data['agenda'] = $this->_getAgenda();
		$this->load->view('backend/adminbackend', $data);
	}
	public function profil($id = null){
		$dataUser = $this->session->all_userdata();
		$row = $this->Users_model->get_by_id($dataUser['id']);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('adminbackend/profil_process'),
				'id' => set_value('id', $row->id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'user_mail' => set_value('user_mail', $row->user_mail),
				'user_fullname' => set_value('user_fullname', $row->user_fullname),
				'user_level' => set_value('user_level', $row->user_level),
				);
			$this->load->view('backend/profil' , $data);

		}
	}
	public function profil_process(){
		$this->_rules();

		$data = array(
			'user_fullname' => $this->input->post('user_fullname',TRUE),
			'user_mail' => $this->input->post('user_mail',TRUE),
			'password' => $this->input->post('password',TRUE) ,
			);

		$this->Users_model->update($this->input->post('id', TRUE), $data);
		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('users'));
	}

	public function _rules() 
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('user_mail', 'user mail', 'trim|required');
		$this->form_validation->set_rules('user_fullname', 'user fullname', 'trim|required');
		$this->form_validation->set_rules('user_level', 'user level', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	function change_status($status=null, $id = null){
		if(($status != null) and ($id != null))
		{
			$data_update = array(
				'last_update_by' => $this->session->userdata('fullname'),
				'last_update_time' => date('Y-m-d H:i:s'),
				'status' => $status
				);
			$this->db->where('no_spk', $id);
			$this->db->update('spk',$data_update);

			$this->session->set_flashdata('message','<div class="alert alert-success">Status telah diupdate</div>');
		}
		redirect('adminbackend/report');
	}
	function change_status_t($status=null, $id = null){
		if(($status != null) and ($id != null))
		{
			$data_update = array(
				'status' => $status
				);
			$this->db->where('no_spk', $id);
			$this->db->update('ticket',$data_update);

			$this->session->set_flashdata('message','<div class="alert alert-success">Status telah diupdate</div>');
		}
		redirect('adminbackend/report');
	}
	function change_status_a($status=null, $id = null){
		if(($status != null) and ($id != null))
		{
			$data_update = array(
				'status' => $status
				);
			$this->db->where('no_agenda', $id);
			$this->db->update('agenda',$data_update);

			$this->session->set_flashdata('message','<div class="alert alert-success">Status telah diupdate</div>');
		}
		redirect('adminbackend/report');
	}
	public function report_spk(){
		$data['spk'] = $this->_getSpk();
		$data['ticket'] = $this->_getTicket();
		$this->load->view('backend/report_spk' , $data);
	}
	private function _getSpk(){
		$this->db->where('status !=', 'Done');
		$q = $this->db->get('spk');
		return $q->result_array();
	}
	private function _getTicket(){
		$this->db->where('status !=', 'Done');
		$this->db->order_by('level', 'ASC');
		$q = $this->db->get('ticket');
		return $q->result_array();
	}
	private function _getAgenda(){
		$q = $this->db->get('agenda');
		return $q->result_array();
	}
	private function _getUsers(){
		$q = $this->db->get('users');
		return $q->result_array();
	}


}
?>