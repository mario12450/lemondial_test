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
        $this->load->helper('url');
 
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
            if($messages->foto)
                $row[] = '<a href="'.base_url('upload/'.$messages->foto).'" target="_blank"><img src="'.base_url('./assets/uploads/'.$messages->foto).'" class="img-responsive" style="width:50%;"/></a>';
            else
                $row[] = '(No photo)';
     
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

    private function _do_upload()
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        // var_dump($config);die;
        $this->load->library('upload', $config);
    
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function ajax_add()
    {
        // var_dump($_FILES);die;
        $data = array(
                'nama_pengirim' => $this->input->post('nama_pengirim'),
                'pesan' => $this->input->post('pesan'),
                );
        // var_dump($data);die;
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            $data['foto'] = $upload;
        }
 
        $insert = $this->messages->save($data);
        // var_dump($insert);die;
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

        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('./assets/uploads/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('./assets/uploads/'.$this->input->post('remove_photo'));
            $data['photo'] = '';
        }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file

            $messages = $this->messages->get_by_id($this->input->post('id_message'));
            // var_dump($messages);die;
            if(file_exists('./assets/uploads/'.$messages->foto) && $messages->foto)
                unlink('./assets/uploads/'.$messages->foto);
 
            $data['foto'] = $upload;
        }
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