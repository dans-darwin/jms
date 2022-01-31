<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message_board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Message_board_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('message_board/message_board_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Message_board_model->json();
    }

    public function read($id) 
    {
        $row = $this->Message_board_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'message' => $row->message,
		'authors' => $row->authors,
	    );
            $this->load->view('message_board/message_board_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('message_board'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('message_board/create_action'),
	    'id' => set_value('id'),
	    'message' => set_value('message'),
	    'authors' => set_value('authors'),
	);
        $this->load->view('message_board/message_board_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'message' => $this->input->post('message',TRUE),
		'authors' => $this->input->post('authors',TRUE),
	    );

            $this->Message_board_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('message_board'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Message_board_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('message_board/update_action'),
		'id' => set_value('id', $row->id),
		'message' => set_value('message', $row->message),
		'authors' => set_value('authors', $row->authors),
	    );
            $this->load->view('message_board/message_board_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('message_board'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'message' => $this->input->post('message',TRUE),
		'authors' => $this->input->post('authors',TRUE),
	    );

            $this->Message_board_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('message_board'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Message_board_model->get_by_id($id);

        if ($row) {
            $this->Message_board_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('message_board'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('message_board'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('message', 'message', 'trim|required');
	$this->form_validation->set_rules('authors', 'authors', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "message_board.xls";
        $judul = "message_board";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Message");
	xlsWriteLabel($tablehead, $kolomhead++, "Authors");

	foreach ($this->Message_board_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->message);
	    xlsWriteLabel($tablebody, $kolombody++, $data->authors);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=message_board.doc");

        $data = array(
            'message_board_data' => $this->Message_board_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('message_board/message_board_doc',$data);
    }

}

/* End of file Message_board.php */
/* Location: ./application/controllers/Message_board.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-09 04:37:19 */
/* http://harviacode.com */