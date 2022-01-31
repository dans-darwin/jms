<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Spk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Spk_model');
    $this->load->library('form_validation');        
    $this->load->library('datatables');
  }

  public function index()
  {
    $this->load->view('spk/spk_list');
  } 

  public function json() {
    header('Content-Type: application/json');
    echo $this->Spk_model->json();
  }

  public function read($id) 
  {
    $row = $this->Spk_model->get_by_id($id);
    if ($row) {
      $data = array(
        'no_spk' => $row->no_spk,
        'nama_client' => $row->nama_client,
        'nama_project' => $row->nama_project,
        'item_project' => $row->item_project,
        'start_date' => $row->start_date,
        'due_date' => $row->due_date,
        'status' => $row->status,
        'last_update_by' => $row->last_update_by,
        'last_update_time' => $row->last_update_time,
        );
      $this->load->view('spk/spk_read', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('spk'));
    }
  }

  public function create() 
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('spk/create_action'),
      'no_spk' => set_value('no_spk'),
      'nama_client' => set_value('nama_client'),
      'nama_project' => set_value('nama_project'),
      'item_project' => set_value('item_project'),
      'start_date' => set_value('start_date'),
      'due_date' => set_value('due_date'),
      'status' => set_value('status'),
      );
    $this->load->view('spk/spk_form', $data);
  }

  public function create_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'nama_client' => $this->input->post('nama_client',TRUE),
        'nama_project' => $this->input->post('nama_project',TRUE),
        'item_project' => $this->input->post('item_project',TRUE),
        'start_date' => $this->input->post('start_date',TRUE),
        'due_date' => $this->input->post('due_date',TRUE),
        'status' => $this->input->post('status',TRUE),
        );

      $this->Spk_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('spk'));
    }
  }

  public function update($id) 
  {
    $row = $this->Spk_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('spk/update_action'),
        'no_spk' => set_value('no_spk', $row->no_spk),
        'nama_client' => set_value('nama_client', $row->nama_client),
        'nama_project' => set_value('nama_project', $row->nama_project),
        'item_project' => set_value('item_project', $row->item_project),
        'start_date' => set_value('start_date', $row->start_date),
        'due_date' => set_value('due_date', $row->due_date),
        'status' => set_value('status', $row->status),
        );
      $this->load->view('spk/spk_form', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('spk'));
    }
  }

  public function update_action() 
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('no_spk', TRUE));
    } else {
      $data = array(
        'nama_client' => $this->input->post('nama_client',TRUE),
        'nama_project' => $this->input->post('nama_project',TRUE),
        'item_project' => $this->input->post('item_project',TRUE),
        'start_date' => $this->input->post('start_date',TRUE),
        'due_date' => $this->input->post('due_date',TRUE),
        'status' => $this->input->post('status',TRUE),
        );

      $this->Spk_model->update($this->input->post('no_spk', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('spk'));
    }
  }

  public function delete($id) 
  {
    $row = $this->Spk_model->get_by_id($id);

    if ($row) {
      $this->Spk_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('spk'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('spk'));
    }
  }

  public function _rules() 
  {
   $this->form_validation->set_rules('nama_client', 'nama client', 'trim|required');
   $this->form_validation->set_rules('nama_project', 'nama project', 'trim|required');
   $this->form_validation->set_rules('item_project', 'item project', 'trim|required');
   $this->form_validation->set_rules('start_date', 'start date', 'trim|required');
   $this->form_validation->set_rules('due_date', 'due date', 'trim|required');
   $this->form_validation->set_rules('status', 'status', 'trim|required');

   $this->form_validation->set_rules('no_spk', 'no_spk', 'trim');
   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

 public function excel()
 {
  $this->load->helper('exportexcel');
  $namaFile = "spk.xls";
  $judul = "spk";
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
  xlsWriteLabel($tablehead, $kolomhead++, "Nama Client");
  xlsWriteLabel($tablehead, $kolomhead++, "Nama Project");
  xlsWriteLabel($tablehead, $kolomhead++, "Item Project");
  xlsWriteLabel($tablehead, $kolomhead++, "Start Date");
  xlsWriteLabel($tablehead, $kolomhead++, "Due Date");
  xlsWriteLabel($tablehead, $kolomhead++, "Status");
  xlsWriteLabel($tablehead, $kolomhead++, "Last Update By");
  xlsWriteLabel($tablehead, $kolomhead++, "Last Update Time");

  foreach ($this->Spk_model->get_all() as $data) {
    $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    xlsWriteNumber($tablebody, $kolombody++, $nourut);
    xlsWriteLabel($tablebody, $kolombody++, $data->nama_client);
    xlsWriteLabel($tablebody, $kolombody++, $data->nama_project);
    xlsWriteLabel($tablebody, $kolombody++, $data->item_project);
    xlsWriteLabel($tablebody, $kolombody++, $data->start_date);
    xlsWriteLabel($tablebody, $kolombody++, $data->due_date);
    xlsWriteLabel($tablebody, $kolombody++, $data->status);
    xlsWriteLabel($tablebody, $kolombody++, $data->last_update_by);
    xlsWriteLabel($tablebody, $kolombody++, $data->last_update_time);

    $tablebody++;
    $nourut++;
  }

  xlsEOF();
  exit();
}

public function word()
{
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=spk.doc");

  $data = array(
    'spk_data' => $this->Spk_model->get_all(),
    'start' => 0
    );

  $this->load->view('spk/spk_doc',$data);
}
public function print_spk($id){
 $row = $this->Spk_model->get_by_id($id);
 if ($row) {

  $data = array(
    'no_spk' => $row->no_spk,
    'nama_client' => $row->nama_client,
    'nama_project' => $row->nama_project,
    'item_project' => $row->item_project,
    'start_date' => $row->start_date,
    'due_date' => $row->due_date,
    'status' => $row->status,
    );
  $this->load->view('spk/spk_print', $data);
}
}

}

/* End of file Spk.php */
/* Location: ./application/controllers/Spk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-22 09:57:12 */
/* http://harviacode.com */