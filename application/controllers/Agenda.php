<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('agenda/agenda_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Agenda_model->json();
    }

    public function read($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);
        if ($row) {
            $data = array(
              'no_agenda' => $row->no_agenda,
              'invited_by' => $row->invited_by,
              'judul_agenda' => $row->judul_agenda,
              'deskripsi_agenda' => $row->deskripsi_agenda,
              'tempat' => $row->tempat,
              'tanggal' => $row->tanggal,
              'jam' => $row->jam,
              'attenders' => $row->attenders,
              'status' => $row->status,
              );
            $this->load->view('agenda/agenda_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
    }

    public function create() 
    {
        $data['users'] = $this->_getUsers();
        $data['agenda']= array(
            'button' => 'Create',
            'action' => site_url('agenda/create_action'),
            'no_agenda' => set_value('no_agenda'),
            'invited_by' => set_value('invited_by'),
            'judul_agenda' => set_value('judul_agenda'),
            'deskripsi_agenda' => set_value('deskripsi_agenda'),
            'tempat' => set_value('tempat'),
            'tanggal' => set_value('tanggal'),
            'jam' => set_value('jam'),
            'attenders' => set_value('attenders'),
            'status' => set_value('status'),
            );
        $this->load->view('agenda/agenda_form', $data) ;
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
           // $this->create();
        } else {
            $data = array(
              'invited_by' => $this->input->post('invited_by',TRUE),
              'judul_agenda' => $this->input->post('judul_agenda',TRUE),
              'deskripsi_agenda' => $this->input->post('deskripsi_agenda',TRUE),
              'tempat' => $this->input->post('tempat',TRUE),
              'tanggal' => $this->input->post('tanggal',TRUE),
              'jam' => $this->input->post('jam',TRUE),
              'attenders' => implode(', ', $this->input->post('attend',TRUE)),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Agenda_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agenda'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $data['users'] = $this->_getUsers();
            $data['agenda'] = array(
                'button' => 'Update',
                'action' => site_url('agenda/update_action'),
                'no_agenda' => set_value('no_agenda', $row->no_agenda),
                'invited_by' => set_value('invited_by', $row->invited_by),
                'judul_agenda' => set_value('judul_agenda', $row->judul_agenda),
                'deskripsi_agenda' => set_value('deskripsi_agenda', $row->deskripsi_agenda),
                'tempat' => set_value('tempat', $row->tempat),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'jam' => set_value('jam', $row->jam),
                'attenders' => set_value('attenders', $row->attenders),
                'status' => set_value('status', $row->status),
                );
            $this->load->view('agenda/agenda_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_agenda', TRUE));
        } else {
            $data = array(
              'invited_by' => $this->input->post('invited_by',TRUE),
              'judul_agenda' => $this->input->post('judul_agenda',TRUE),
              'deskripsi_agenda' => $this->input->post('deskripsi_agenda',TRUE),
              'tempat' => $this->input->post('tempat',TRUE),
              'tanggal' => $this->input->post('tanggal',TRUE),
              'jam' => $this->input->post('jam',TRUE),
              'attenders'  => implode(', ', $this->input->post('attend',TRUE)),
              'status' => $this->input->post('status',TRUE),
              );

            $this->Agenda_model->update($this->input->post('no_agenda', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agenda'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $this->Agenda_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agenda'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('invited_by', 'invited by', 'trim|required');
       $this->form_validation->set_rules('judul_agenda', 'judul agenda', 'trim|required');
       $this->form_validation->set_rules('deskripsi_agenda', 'deskripsi agenda', 'trim|required');
       $this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
       $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
       $this->form_validation->set_rules('jam', 'jam', 'trim|required');
       $this->form_validation->set_rules('attenders', 'trim|required');
       $this->form_validation->set_rules('status', 'status', 'trim|required');

       $this->form_validation->set_rules('no_agenda', 'no_agenda', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "agenda.xls";
    $judul = "agenda";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Invited By");
    xlsWriteLabel($tablehead, $kolomhead++, "Judul Agenda");
    xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Agenda");
    xlsWriteLabel($tablehead, $kolomhead++, "Tempat");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
    xlsWriteLabel($tablehead, $kolomhead++, "Jam");
    xlsWriteLabel($tablehead, $kolomhead++, "Attenders");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->Agenda_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->invited_by);
        xlsWriteLabel($tablebody, $kolombody++, $data->judul_agenda);
        xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_agenda);
        xlsWriteLabel($tablebody, $kolombody++, $data->tempat);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
        xlsWriteLabel($tablebody, $kolombody++, $data->jam);
        xlsWriteLabel($tablebody, $kolombody++, $data->attenders);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

public function word()
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=agenda.doc");

    $data = array(
        'agenda_data' => $this->Agenda_model->get_all(),
        'start' => 0
        );

    $this->load->view('agenda/agenda_doc',$data);
}
private function _getUsers(){
        $this->db->where('username !=' , 'admin');
        $this->db->where('username !=' , 'admin_D');
        $q = $this->db->get('users');
        return $q->result_array();
    }

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-16 04:42:22 */
/* http://harviacode.com */