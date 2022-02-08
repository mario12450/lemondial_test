<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
    {
        //load view form register
        $this->load->view('register');
    }

    public function simpan()
    {
        // var_dump($_POST);die;
        
       $config = array(
                'upload_path' => "./assets/uploads",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", 
                 );
        // var_dump($config);die;
        $this->load->library('upload',$config);
        // var_dump($test);die;         
        $this->load->model('m_user');
      
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username'       => $this->input->post('username'),
            'password'       => password_hash($this->input->post('password'), PASSWORD_DEFAULT),  
            
        );
        // var_dump($data);die;
        //insert data via model
        $register = $this->m_user->simpan_register($data);

        //cek apakah data berhasil tersimpan
        if($register) {

            echo "success";

        } else {

            echo "error";

        }

    }

    

}