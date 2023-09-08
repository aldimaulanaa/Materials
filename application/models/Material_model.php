<?php
class Material_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_material($data)
    {
        // Menyimpan data material ke dalam tabel
        $this->db->insert('materials', $data);
        return $this->db->insert_id();
    }

    public function get_materials_with_supplier()
    {
        // Mengambil data material dengan informasi supplier
        $this->db->select('materials.*, suppliers.SupplierName');
        $this->db->from('materials');
        $this->db->join('suppliers', 'suppliers.SupplierID = materials.SupplierID');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_materials()
    {
        // Mengambil semua data material
        $query = $this->db->get('materials');
        return $query->result_array();
    }

    public function get_material_by_id($material_id)
    {
        // Mengambil data material berdasarkan ID
        $query = $this->db->get_where('materials', array('MaterialID' => $material_id));
        return $query->row_array();
    }

    public function update_material($data, $material_id)
    {
        // Memperbarui data material berdasarkan ID
        $this->db->where('MaterialID', $material_id);
        $this->db->update('materials', $data);
    }

    public function delete_material($material_id)
    {
        // Menghapus data material berdasarkan ID
        $this->db->delete('materials', array('MaterialID' => $material_id));
    }
}
