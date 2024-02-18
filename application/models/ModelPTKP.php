<?php defined('BASEPATH') or exit('No direct script access allowed');

class ModelPTKP extends ci_model
{
    // Select All Data
    public function findAll()
    {
        $data = 'SELECT * FROM data_ptkp AS t1 ORDER BY t1.id';
        $query = $this->db->query($data);
        return $query->result();
    }

    public function find($id)
    {
        return $this->db->query("SELECT * FROM data_ptkp WHERE id='$id'")->result();
    }

    // Insert Single Data
    public function insert($data)
    {
        $this->db->insert('data_ptkp', $data);
    }

    // Remove Single Data
    public function remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_ptkp');
    }

    // Edit Single Data
    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('data_ptkp', $data);
    }
}
