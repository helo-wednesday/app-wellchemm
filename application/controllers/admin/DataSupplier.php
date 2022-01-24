<?php

class DataSupplier extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = "Data Supplier";
		$data['supplier'] = $this->wellchemModel->get_data('data_supplier')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataSupplier', $data);
		$this->load->view('templates_admin/footer');

	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Supplier";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataSupplier', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahData();
		} else {
			$npwp = $this->input->post('npwp');
			$nama_supplier = $this->input->post('nama_supplier');
			$no_telpon = $this->input->post('no_telpon');
			$alamat_supplier = $this->input->post('alamat_supplier');

			$data = array(
				'npwp' => $npwp,
				'nama_supplier' => $nama_supplier,
				'no_telpon' => $no_telpon,
				'alamat_supplier' => $alamat_supplier
			);

			$this->wellchemModel->insert_data($data, 'data_supplier');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataSupplier');
		}
	}

	public function updateData($id)
	{
		$where = array('id_supplier' => $id);
		$data['supplier'] = $this->db->query("SELECT * FROM data_supplier WHERE id_supplier = '$id'")->result();
		$data['title'] = "Update Data Supplier";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataSupplier', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->updateData();
		} else {
			$id = $this->input->post('id_supplier');
			$npwp = $this->input->post('npwp');
			$nama_supplier = $this->input->post('nama_supplier');
			$no_telpon = $this->input->post('no_telpon');
			$alamat_supplier = $this->input->post('alamat_supplier');

			$data = array(
				'npwp' => $npwp,
				'nama_supplier' => $nama_supplier,
				'no_telpon' => $no_telpon,
				'alamat_supplier' => $alamat_supplier
			);

			$where = array(
				'id_supplier' => $id
			);

			$this->wellchemModel->update_data('data_supplier', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataSupplier');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('npwp', 'Npwp', 'required');
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required');
		$this->form_validation->set_rules('alamat_supplier', 'Alamat Supplier', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_supplier' => $id);
		$this->wellchemModel->delete_data($where, 'data_supplier');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataSupplier');
	}
}
?>