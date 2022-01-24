<?php

class dataItem extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Item";
		$data['item'] = $this->wellchemModel->get_data('data_item')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataItem', $data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Item";
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formTambahItem', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nama_item = $this->input->post('nama_item');
			$harga_item = $this->input->post('harga_item');
			$kategori = $this->input->post('kategori');

			$data = array(
				'nama_item' => $nama_item,
				'harga_item' => $harga_item,
				'kategori' => $kategori,
			);

			$this->wellchemModel->insert_data($data, 'data_item');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataItem');
		}
	}

	public function updateData($id)
	{
		$where = array('id_item' => $id);
		$data['title'] = 'Update Data Item';
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$data['item'] = $this->db->query("SELECT * FROM data_item WHERE id_item='$id'")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formUpdateItem', $data);
		$this->load->view('templates_admin/footer');

	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('id_item');
			$nama_item = $this->input->post('nama_item');
			$harga_item = $this->input->post('harga_item');
			$kategori = $this->input->post('kategori');

			$data = array(
				'nama_item' => $nama_item,
				'harga_item' => $harga_item,
				'kategori' => $kategori
			);

			$where = array(
				'id_item' => $id
			);

			$this->wellchemModel->update_data('data_item', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataItem');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_item', 'Item', 'required');
		$this->form_validation->set_rules('harga_item', 'Harga Item', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_item' => $id);
		$this->wellchemModel->delete_data($where, 'data_item');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataItem');
	}
}

?>