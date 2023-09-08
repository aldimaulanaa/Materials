<?php
class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model'); // Memuat model Supplier_model
    }

    public function index()
    {
        // Menampilkan daftar supplier
        $data['suppliers'] = $this->Supplier_model->get_suppliers();
        $this->load->view('suppliers/supplier_list', $data);
    }

    // Tambahkan fungsi-fungsi lain yang diperlukan sesuai kebutuhan proyek Anda
}
