<?php
class Supplier_model extends CI_Model {
    public function get_suppliers() {
        return $this->db->get('Suppliers')->result_array();
    }
}
