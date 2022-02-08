<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Structure extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_structure');
    }
 
	public function index()
	{
	    $data['leader'] = $this->M_structure->getDataStructureLeader();
	    // var_dump($data);die;
	    $data['team'] = $this->M_structure->getDataStructureTeam();
	    // var_dump($data);die;
		$this->load->view('structure',$data);
	}


}
