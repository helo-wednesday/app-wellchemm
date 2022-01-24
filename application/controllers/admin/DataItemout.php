<?php

class dataItemout extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Item OUT";
		$data['itemout'] = $this->wellchemModel->get_data('data_itemout')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataItemout', $data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Item OUT";
		$data['customer'] = $this->wellchemModel->get_data('data_customer')->result();
		$data['item'] = $this->wellchemModel->get_data('data_item')->result();
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formTambahItemout', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$no_doc = $this->input->post('no_doc');
			$customer = $this->input->post('customer');
			$item = $this->input->post('item');
			$harga_jual = $this->input->post('harga_jual');
			$kategori = $this->input->post('kategori');
			$jumlah_out = $this->input->post('jumlah_out');
			$date_out = $this->input->post('date_out');

			$data = array(
				'no_doc' => $no_doc,
				'customer' => $customer,
				'item' => $item,
				'harga_jual' => $harga_jual,
				'kategori' => $kategori,
				'jumlah_out' => $jumlah_out,
				'date_out' => $date_out
			);

			$this->wellchemModel->insert_data($data, 'data_itemout');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataItemout');
		}
	}

	public function updateData($id)
	{
		$where = array('id_itemout' => $id);
		$data['title'] = 'Update Data itemin';
		$data['customer'] = $this->wellchemModel->get_data('data_customer')->result();
		$data['item'] = $this->wellchemModel->get_data('data_item')->result();
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$data['itemout'] = $this->db->query("SELECT * FROM data_itemout WHERE id_itemout='$id'")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formUpdateItemout', $data);
		$this->load->view('templates_admin/footer');

	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('id_itemout');
			$no_doc = $this->input->post('no_doc');
			$customer = $this->input->post('customer');
			$item = $this->input->post('item');
			$harga_jual = $this->input->post('harga_jual');
			$kategori = $this->input->post('kategori');
			$jumlah_out = $this->input->post('jumlah_out');
			$date_out = $this->input->post('date_out');

			$data = array(
				'no_doc' => $no_doc,
				'customer' => $customer,
				'item' => $item,
				'harga_jual' => $harga_jual,
				'kategori' => $kategori,
				'jumlah_out' => $jumlah_out,
				'date_out' => $date_out
			);

			$where = array(
				'id_itemout' => $id
			);

			$this->wellchemModel->update_data('data_itemout', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataItemout');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_doc', 'No Doc', 'required');
		$this->form_validation->set_rules('customer', 'Customer', 'required');
		$this->form_validation->set_rules('item', 'Item', 'required');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual Item', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('jumlah_out', 'Jumlah Item OUT', 'required');
		$this->form_validation->set_rules('date_out', 'Date OUT', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_itemout' => $id);
		$this->wellchemModel->delete_data($where, 'data_itemout');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataItemout');
	}
}

?>