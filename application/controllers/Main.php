<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function __construct(){
    parent::__construct(); // subclass
    $this->load->model('Model_todo');
  }

	public function index(){
    $data["list"] = $this->Model_todo->select();
		$this->load->view('v_main', $data);
	}

  public function edit($id){
    $query = $this->Model_todo->select($id);

    $data['id'] = NULL;
    $data['item'] = NULL;

    foreach ($query->result() as $row) {
      $data['id'] = $row->id;
      $data['item'] = $row->item;
    }

    $this->load->view('v_edit', $data);
  }

  public function delete($id){
    $this->Model_todo->delete($id);
    header("Location: ".site_url());
  }

  public function data_add(){
    $data["id"] = NULL;
    $data["item"] = $this->input->post("todoItem");

    $this->Model_todo->insert();
    header("Location: ".site_url());
  }

  public function data_update(){
    $this->Model_todo->update();
    header("Location: ".site_url());
  }
}
