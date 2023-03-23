<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{

    public function __construct()
    {   
        parent::__construct();
        $this->load->model('siswa_model');
    }

    public function index()
    {
        $data['title'] = 'Lowongan';
        $data['siswa'] = $this->siswa_model->get_data('pekerjaan')->result();

        $this->load->view('siswa',$data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Lowongan';
        $this->load->view('tambah_lowongan',$data);
    }





    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() ==FALSE) {
            $this->tambah();
        } else {
            $data = array(

                'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'lokasi' => $this->input->post('lokasi'),
                'gaji' => $this->input->post('gaji'),
            );
            $this->siswa_model->insert_data($data,'pekerjaan');
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-primary" role="alert">
                Selamat anda sudah menambahkan data
             </div>');

          redirect('siswa');
            
        }
    }




    public function _rules()
    {

        $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required', array(
            'required' => '%s harus di isi !!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s harus di isi !!'
        ));
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array(
            'required' => '%s harus di isi !!'
        ));
        $this->form_validation->set_rules('gaji', 'Gaji', 'required', array(
            'required' => '%s harus di isi !!'
        ));
        
    }

    public function edit($id_pekerjaan)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_pekerjaan' => $id_pekerjaan,
                'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'lokasi' => $this->input->post('lokasi'),
                'gaji' => $this->input->post('gaji'),
            );
            
            $this->siswa_model->update_data($data, 'pekerjaan',$id_pekerjaan);
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-primary" role="alert">
                Selamat anda sudah di ubah
             </div>');
             redirect('siswa');
        }
    }

    public function delete($id_pekerjaan)
    {
        $where = array('id_pekerjaan' => $id_pekerjaan);

        $this->siswa_model->delete($where, 'pekerjaan',$id_pekerjaan);
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger" role="alert">
                Data anda sudah di hapus 
             </div>');
             redirect('siswa');
    }

    public function print()
    {
        $data['siswa'] = $this->siswa_model->get_data('pekerjaan')->result();
        $data['title'] = 'Print';
        $this->load->view('print_pekerjaan', $data);
        
        
        
    }
}

?>