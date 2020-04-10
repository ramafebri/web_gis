<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MapModel');
		$this->load->library('form_validation');
	}

	public function bangunan_json()
	{
		$data=$this->db->get('bangunan')->result();
		echo json_encode($data);
	}

	//<-Function which used in Map -> 
	public function addMarker(){
		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
        $data['keterangan'] = $this->input->post('l_info');

		$result = $this->MapModel->addMarkers($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function deleteMarker($bangunan_id){
        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function updateMarker(){
		$data['bangunan_id'] = $this->input->post('l_id');
		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		
		var_dump($data);
		   
		$result = $this->MapModel->updateMarkers($data);
		if($result){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home'); 
		}
	}
	//<-Function which used in Map ->
	
	//<-Function which used in Landmark Page ->
	public function addMarker1(){
		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
        $data['keterangan'] = $this->input->post('l_info');

		$result = $this->MapModel->addMarkers($data);
		if($result){
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}
	
	public function deleteByID(){
		$bangunan_id = $this->input->post('l_id');

        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function deleteAll(){
        $result = $this->MapModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function updateMarker1(){
		$data['bangunan_id'] = $this->input->post('l_id');
		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		   
		$result = $this->MapModel->updateMarkers($data);
		if($result){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	//<-Function which used in Landmark Page ->
}