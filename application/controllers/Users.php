<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model');
    $this->load->library('form_validation');        
    $this->load->library('datatables');
    if($this->session->userdata('status') != "login"){
      redirect(base_url("login"));
    }
  }

  public function index()
  {
    $this->load->view('users/users_list');
  } 

  public function json() {
    header('Content-Type: application/json');
    echo $this->Users_model->json();
  }

  public function read($id) 
  {
    $row = $this->Users_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id' => $row->id,
        'username' => $row->username,
        'password' => $row->password,
        'user_mail' => $row->user_mail,
        'user_fullname' => $row->user_fullname,
        'user_level' => $row->user_level,
        );
      $this->load->view('users/users_read', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('users'));
    }
  }

  public function create() 
  {
    if ($this->session->userdata('level') != 'Superuser') {
     $this->load->view('user_permision'); 
   } else {
    $data = array(
      'button' => 'Create',
      'action' => site_url('users/create_action'),
      'id' => set_value('id'),
      'username' => set_value('username'),
      'password' => set_value('password'),
      'user_mail' => set_value('user_mail'),
      'user_fullname' => set_value('user_fullname'),
      'user_level' => set_value('user_level'),
      );
    $this->load->view('users/users_form', $data);
  }


}

public function create_action() 
{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->create();
  } else {
    $data = array(
      'username' => $this->input->post('username',TRUE),
      'password' => $this->input->post('password',TRUE),
      'user_mail' => $this->input->post('user_mail',TRUE),
      'user_fullname' => $this->input->post('user_fullname',TRUE),
      'user_level' => $this->input->post('user_level',TRUE),
      );

    $this->Users_model->insert($data);
    $this->session->set_flashdata('message', 'Create Record Success');
    redirect(site_url('users'));
  }
}

public function update($id) 
{
 $row = $this->Users_model->get_by_id($id);
 if ($this->session->userdata('level') != 'Superuser') {
   $this->load->view('user_permision'); 
 }
 elseif($row) {
  $data = array(
    'button' => 'Update',
    'action' => site_url('users/update_action'),
    'id' => set_value('id', $row->id),
    'username' => set_value('username', $row->username),
    'password' => set_value('password', $row->password),
    'user_mail' => set_value('user_mail', $row->user_mail),
    'user_fullname' => set_value('user_fullname', $row->user_fullname),
    'user_level' => set_value('user_level', $row->user_level),
    );
  $this->load->view('users/users_form', $data);
} else {
  $this->session->set_flashdata('message', 'Record Not Found');
  redirect(site_url('users'));
}
}

public function update_action() 
{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->update($this->input->post('id', TRUE));
  } else {
    $data = array(
      'username' => $this->input->post('username',TRUE),
      'password' => $this->input->post('password',TRUE),
      'user_mail' => $this->input->post('user_mail',TRUE),
      'user_fullname' => $this->input->post('user_fullname',TRUE),
      'user_level' => $this->input->post('user_level',TRUE),
      );

    $this->Users_model->update($this->input->post('id', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('users'));
  }
}

public function delete($id){
  $row = $this->Users_model->get_by_id($id);
  if ($this->session->userdata('level') != 'Superuser') {
   $this->load->view('user_permision'); 
 }elseif ($row) {
  $this->Users_model->delete($id);
  $this->session->set_flashdata('message', 'Delete Record Success');
  redirect(site_url('users'));
} else {
  $this->session->set_flashdata('message', 'Record Not Found');
  redirect(site_url('users'));
}
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

public function excel()
{
  $this->load->helper('exportexcel');
  $namaFile = "users.xls";
  $judul = "users";
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
  xlsWriteLabel($tablehead, $kolomhead++, "Username");
  xlsWriteLabel($tablehead, $kolomhead++, "Password");
  xlsWriteLabel($tablehead, $kolomhead++, "User Mail");
  xlsWriteLabel($tablehead, $kolomhead++, "User Fullname");
  xlsWriteLabel($tablehead, $kolomhead++, "User Level");

  foreach ($this->Users_model->get_all() as $data) {
    $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    xlsWriteNumber($tablebody, $kolombody++, $nourut);
    xlsWriteLabel($tablebody, $kolombody++, $data->username);
    xlsWriteLabel($tablebody, $kolombody++, $data->password);
    xlsWriteLabel($tablebody, $kolombody++, $data->user_mail);
    xlsWriteLabel($tablebody, $kolombody++, $data->user_fullname);
    xlsWriteLabel($tablebody, $kolombody++, $data->user_level);

    $tablebody++;
    $nourut++;
  }

  xlsEOF();
  exit();
}

public function word()
{
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=users.doc");

  $data = array(
    'users_data' => $this->Users_model->get_all(),
    'start' => 0
    );

  $this->load->view('users/users_doc',$data);
}
}

// D2CA3E30