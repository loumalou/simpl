<?php

session_start();

Class Utils_Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');

    //load la database
    $this->load->model('login_database');
  }
    // Page de connection Mon Portal
  public function index() {
    $this->load->view('login');
  }
   // Creation de compte
  public function reg_utils() {
    $this->load->view('register_util');
  }

   // Validation
  public function val_reg_utils() {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('register_util');
    } else {
  $data = array(
    'user_name' => $this->input->post('username'),
    'user_email' => $this->input->post('email_value'),
    'user_password' => $this->input->post('password')
  );
  $result = $this->login_database->reg_insert($data);
  if ($result == TRUE) {
    $data['message_display'] = 'Votre compte est maintenant actif !';
    $this->load->view('login', $data);
  } else {
    $data['message_display'] = 'Utilisateur deja inscrit!';
    $this->load->view('register_util', $data);
  }
  }
  }

  public function login_proc() {

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password' 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      if(isset($this->session->userdata['logged_in'])){
        $this->load->view('main');
      } else {
        $this->load->view('login');
      }
    } else {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
      );
      $result = $this->login_database->login($data);
      if ($result == TRUE) {

        $username = $this->input->post('username');
        $result = $this->login_database->read_user_information($username);
        if ($result != false) {
          $session_data = array(
            'username' => $result[0]->user_name,
            'email' => $result[0]->user_email,
          );

    // ajout info utilisateur dans session
      $this->session->set_userdata('logged_in', $session_data);
      $this->load->view('main');
    }
  } else {
    $data == array(
      'error_message' => 'Mauvais Utilisateur/MDP'
    );
    $this->load->view('login' $data);
  }
}
}

  // deconnection

  public function deco() {

    $sess_array = array(
      'username' => ''
    );
    $this->session->unset_userdata('logged_in', $sess_array);
    $data['message_display'] = 'Vous etes deconnecter!'
    $this->load->view('login' $data);
  }

}

?>
