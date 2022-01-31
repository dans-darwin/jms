<?php  
class board extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['message_board'] = $this->_getMessage();
		$data['spk'] = $this->_getSurat();
		$data['ticket'] = $this->_getTiket();
		$data['agenda'] = $this->_getAgend();
		$this->load->view('job_board/index' , $data);
	}
	public function index2(){
		$data['ticket'] = $this->_getTiket();
		$data['agenda'] = $this->_getAgend();
		$data['message_board'] = $this->_getMessage();
		$this->load->view('job_board/index2' , $data);
	}
	private function _getMessage(){
		$q = $this->db->get('message_board');
		return $q->result_array();
	}
	private function _getSurat(){
		$this->db->where('status !=', 'Done');
		$q = $this->db->get('spk');
		return $q->result_array();
	}
	private function _getTiket(){
		$this->db->where('status !=', 'Done');
		$this->db->order_by('level', 'ASC');
		$q = $this->db->get('ticket');
		return $q->result_array();
	}
	private function _getAgend(){
		$this->db->where('status !=', 'Cancel');
		$q = $this->db->get('agenda');
		return $q->result_array();	
	}
}
?>		