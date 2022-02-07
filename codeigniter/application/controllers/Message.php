<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_message','messages');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('v_message',null);
    }
 
    public function ajax_list()
    {
        $list = $this->messages->get_datatables();
        $data = array();
        $no = 1;
        // var_dump($no);
        foreach ($list as $messages) {
            // var_dump($messages);die;
            // $no++;
            $row = array();
            $row[] = $no++;
            $row[] = $messages->nama_pengirim;
            $row[] = $messages->pesan;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_message('."'".$messages->id_message."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_message('."'".$messages->id_message."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->messages->count_all(),
                        "recordsFiltered" => $this->messages->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add()
    {
        $data = array(
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'pesan' => $this->input->post('pesan'),
                );
        // var_dump($data);die;

        $insert = $this->messages->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        // var_dump($id);die;
        $data = $this->messages->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {

        // var_dump($_POST);die;
        $data = array(
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'pesan' => $this->input->post('pesan'),
            );
        $this->messages->update(array('id_message' => $this->input->post('id_message')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->messages->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 

    public function logout()
    {
        //hapus session
        $this->session->sess_destroy();

        redirect('/login');
    }

}