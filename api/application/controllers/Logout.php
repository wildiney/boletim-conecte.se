<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

}
