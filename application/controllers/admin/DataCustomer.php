<?php

class DataCustomer extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = "Data Customer";
		$data['customer'] = $this->wellchemModel->get_data('data_customer')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataCustomer', $data);
		$this->load->view('templates_admin/footer');

	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Customer";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataCustomer', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahData();
		} else {
			$npwp_c = $this->input->post('npwp_c');
			$nama_customer = $this->input->post('nama_customer');
			$no_telpon_c = $this->input->post('no_telpon_c');
			$alamat_customer = $this->input->post('alamat_customer');

			$data = array(
				'npwp_c' => $npwp_c,
				'nama_customer' => $nama_customer,
				'no_telpon_c' => $no_telpon_c,
				'alamat_customer' => $alamat_customer
			);

			$this->wellchemModel->insert_data($data, 'data_customer');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataCustomer');
		}
	}

	public function updateData($id)
	{
		$where = array('id_supplier' => $id);
		$data['customer'] = $this->db->query("SELECT * FROM data_customer WHERE id_customer = '$id'")->result();
		$data['title'] = "Update Data Customer";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataCustomer', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->updateData();
		} else {
			$id = $this->input->post('id_customer');
			$npwp_c = $this->input->post('npwp_c');
			$nama_customer = $this->input->post('nama_customer');
			$no_telpon_c = $this->input->post('no_telpon_c');
			$alamat_customer = $this->input->post('alamat_customer');

			$data = array(
				'npwp_c' => $npwp_c,
				'nama_customer' => $nama_customer,
				'no_telpon_c' => $no_telpon_c,
				'alamat_customer' => $alamat_customer
			);

			$where = array(
				'id_customer' => $id
			);

			$this->wellchemModel->update_data('data_customer', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataCustomer');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('npwp_c', 'Npwp', 'required');
		$this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
		$this->form_validation->set_rules('no_telpon_c', 'No Telpon', 'required');
		$this->form_validation->set_rules('alamat_customer', 'Alamat Customer', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_customer' => $id);
		$this->wellchemModel->delete_data($where, 'data_customer');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataCustomer');
	}
}
?>