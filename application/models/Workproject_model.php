<?php

class Workproject_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_workproject() {
        $this->db->order_by('name');
        $query = $this->db->get('workproject');
        return $query->result_array();
    }

    public function get_title($id) {
        $query = $this->db->get_where('workproject', array('id' => $id));
        return $query->row();
    }

    public function create_workproject() {

        $data = array(
            'name' => $this->input->post('name'),
            'worktime' => $this->input->post('worktime'),
            'content' => $this->input->post('content'),

        );
        return $this->db->insert('workproject', $data);
    }

    public function update_workproject() {

        $data = array(
            'name' => $this->input->post('name'),
            'worktime' => $this->input->post('worktime'),
            'content' => $this->input->post('content'),

        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('workproject', $data);
    }

    public function delete_workproject($id) {
        $this->db->where('id', $id);
        $this->db->delete('workproject');
        return true;
    }
}