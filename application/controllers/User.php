<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('UserModel');
	}
	
	//<-Function which used in User Page ->
	public function addUser(){
		$data['username'] = $this->input->post('u_username'); 
		$data['password'] = md5($this->input->post('u_password'));
        $data['name'] = $this->input->post('u_name');
        $data['level'] = $this->input->post('u_level');

		$result = $this->UserModel->addUser($data);
		if($result){
		    redirect('page/data_user');
		}else{
		    redirect('page/data_user');
		}
	}
	
	public function deleteByID(){
		$user_id = $this->input->post('u_id');

        $result = $this->UserModel->deleteUser($user_id);
		if($result){
		    redirect('page/data_user');
		}else{
		    redirect('page/data_user');
		}
	}

	public function deleteAll(){
        $result = $this->UserModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_user');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_user');
		}
	}

	public function updateUser(){
		$data['id_user'] = $this->input->post('u_id');
		$data['username'] = $this->input->post('u_username'); 
		$data['password'] = md5($this->input->post('u_password'));
        $data['name'] = $this->input->post('u_name');
        $data['level'] = $this->input->post('u_level');
		   
		$result = $this->UserModel->updateUser($data);
		$level = $this->session->userdata('level');

		if($result){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			if($level == 'admin'){
			  redirect('page/data_user');
			}
			else if($level == 'regular'){
			  redirect('page/profile');
			}

		}else{
		    redirect('page/data_user');
		}
	}
	//<-Function which used in User Page ->
}