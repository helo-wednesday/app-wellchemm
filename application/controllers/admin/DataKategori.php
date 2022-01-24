<?php

class DataKategori extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = "Data Kategori";
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataKategori', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Kategori";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataKategori', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahData();
		} else {
			$nama_kategori = $this->input->post('nama_kategori');

			$data = array(
				'nama_kategori' => $nama_kategori
			);

			$this->wellchemModel->insert_data($data, 'data_kategori');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataKategori');
		}
	}

	public function updateData($id)
	{
		$where = array('id_kategori' => $id);
		$data['kategori'] = $this->db->query("SELECT * FROM data_kategori WHERE id_kategori = '$id'")->result();
		$data['title'] = "Update Data Kategori";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataKategori', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->updateData();
		} else {
			$id = $this->input->post('id_kategori');
			$nama_kategori = $this->input->post('nama_kategori');

			$data = array(
				'nama_kategori' => $nama_kategori
			);

			$where = array(
				'id_kategori' => $id
			);

			$this->wellchemModel->update_data('data_kategori', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataKategori');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_kategori' => $id);
		$this->wellchemModel->delete_data($where, 'data_kategori');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataKategori');
	}
}

?>