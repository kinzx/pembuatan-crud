<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->libary('form_validation');
    } 

    public function index()
    {
        $data['title'] = 'Auth';
        $this->load->view('login',$data);
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_')

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'User Registration';
            $this->load->view('register');
        } else {
            echo "data berhasil di simpan";
        }
    }


}