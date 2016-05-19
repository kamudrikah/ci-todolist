<?php
class Model_todo extends CI_Model {

  public function insert(){
    $this->id = NULL;
    $this->item = $this->input->post('todoItem');
    $this->status = 'undone';

    $this->db->insert('list', $this);
  }

  public function select($id = NULL){
    if($id == NULL){
      $query = $this->db->get('list');
    }else{
      $this->db->select('*');
      $this->db->from('list');
      $this->db->where('id', $id);
      $query = $this->db->get();
    }
    return $query;
  }

  public function update(){
    $data = array(
      'item' => $this->input->post('item')
    );

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('list', $data);
  }

  public function update_status($id, $status){
    $data = array(
      'status' => $status
    );

    $this->db->where('id', $id);
    $this->db->update('list', $data);
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('list');
  }
}
?>
