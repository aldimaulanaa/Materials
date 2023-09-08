<?php
class Material extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Material_model'); // Memuat model Material_model
        $this->load->model('Supplier_model'); // Memuat model Supplier_model
    }

    public function create()
    {
        // Mengatur aturan validasi untuk form pembuatan material
        $this->form_validation->set_rules('material_code', 'Material Code', 'required');
        $this->form_validation->set_rules('material_name', 'Material Name', 'required');
        $this->form_validation->set_rules('material_type', 'Material Type', 'required');
        $this->form_validation->set_rules('material_buy_price', 'Material Buy Price', 'required|numeric|greater_than_equal_to[100]');

        if ($this->form_validation->run() === FALSE) {
            // Menampilkan formulir pembuatan material jika validasi gagal
            $data['suppliers'] = $this->Supplier_model->get_suppliers();
            $this->load->view('materials/create_material', $data);
        } else {
            // Menyimpan data material ke database jika validasi berhasil
            $data = array(
                'MaterialCode' => $this->input->post('material_code'),
                'MaterialName' => $this->input->post('material_name'),
                'MaterialType' => $this->input->post('material_type'),
                'MaterialBuyPrice' => $this->input->post('material_buy_price'),
                'SupplierID' => $this->input->post('supplier_id')
            );

            $this->Material_model->create_material($data);
            // Setelah penyimpanan berhasil, arahkan kembali ke daftar material
            redirect('material/index');
        }
    }

    public function index()
    {
        // Menampilkan daftar material dengan informasi pemasok
        $data['materials'] = $this->Material_model->get_materials_with_supplier();
        $this->load->view('materials/material_list', $data);
    }

    public function edit($material_id)
    {
        // Mengatur aturan validasi untuk form pengeditan material
        $this->form_validation->set_rules('material_code', 'Material Code', 'required');
        $this->form_validation->set_rules('material_name', 'Material Name', 'required');
        $this->form_validation->set_rules('material_type', 'Material Type', 'required');
        $this->form_validation->set_rules('material_buy_price', 'Material Buy Price', 'required|numeric|greater_than_equal_to[100]');

        if ($this->form_validation->run() === FALSE) {
            // Menampilkan formulir pengeditan material jika validasi gagal
            $data['material_id'] = $material_id; // Mengirimkan $material_id ke tampilan
            $data['material'] = $this->Material_model->get_material_by_id($material_id);
            $data['suppliers'] = $this->Supplier_model->get_suppliers();
            $this->load->view('materials/edit_material', $data);
        } else {
            // Menyimpan perubahan material ke database jika validasi berhasil
            $data = array(
                'MaterialCode' => $this->input->post('material_code'),
                'MaterialName' => $this->input->post('material_name'),
                'MaterialType' => $this->input->post('material_type'),
                'MaterialBuyPrice' => $this->input->post('material_buy_price'),
                'SupplierID' => $this->input->post('supplier_id')
            );

            $this->Material_model->update_material($data, $material_id);
            // Setelah perubahan berhasil, arahkan kembali ke daftar material
            redirect('material/index');
        }
    }

    public function delete($material_id)
    {
        // Menghapus material dari database
        $this->Material_model->delete_material($material_id);
        // Setelah penghapusan berhasil, arahkan kembali ke daftar material
        redirect('material/index');
    }
}
