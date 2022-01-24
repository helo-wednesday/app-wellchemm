<?php

class dataItemin extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Item IN";
		$data['itemin'] = $this->wellchemModel->get_data('data_itemin')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataItemin', $data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Item IN";
		$data['item'] = $this->wellchemModel->get_data('data_item')->result();
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formTambahItemin', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$no_bpb = $this->input->post('no_bpb');
			$no_sj = $this->input->post('no_sj');
			$item = $this->input->post('item');
			$harga_in = $this->input->post('harga_in');
			$kategori = $this->input->post('kategori');
			$jumlah_in = $this->input->post('jumlah_in');
			$date_in = $this->input->post('date_in');

			$data = array(
				'no_bpb' => $no_bpb,
				'no_sj' => $no_sj,
				'item' => $item,
				'harga_in' => $harga_in,
				'kategori' => $kategori,
				'jumlah_in' => $jumlah_in,
				'date_in' => $date_in
			);

			$this->wellchemModel->insert_data($data, 'data_itemin');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataItemin');
		}
	}

	public function updateData($id)
	{
		$where = array('id_itemin' => $id);
		$data['title'] = 'Update Data itemin';
		$data['item'] = $this->wellchemModel->get_data('data_item')->result();
		$data['kategori'] = $this->wellchemModel->get_data('data_kategori')->result();
		$data['itemin'] = $this->db->query("SELECT * FROM data_itemin WHERE id_itemin='$id'")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formUpdateItemin', $data);
		$this->load->view('templates_admin/footer');

	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('id_itemin');
			$no_bpb = $this->input->post('no_bpb');
			$no_sj = $this->input->post('no_sj');
			$item = $this->input->post('item');
			$harga_in = $this->input->post('harga_in');
			$kategori = $this->input->post('kategori');
			$jumlah_in = $this->input->post('jumlah_in');
			$date_in = $this->input->post('date_in');

			$data = array(
				'no_bpb' => $no_bpb,
				'no_sj' => $no_sj,
				'item' => $item,
				'harga_in' => $harga_in,
				'kategori' => $kategori,
				'jumlah_in' => $jumlah_in,
				'date_in' => $date_in
			);

			$where = array(
				'id_itemin' => $id
			);

			$this->wellchemModel->update_data('data_itemin', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataItemin');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_bpb', 'No BPB', 'required');
		$this->form_validation->set_rules('no_sj', 'No Surat Jalan', 'required');
		$this->form_validation->set_rules('item', 'Item', 'required');
		$this->form_validation->set_rules('harga_in', 'Harga Item IN', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('jumlah_in', 'Jumlah Item IN', 'required');
		$this->form_validation->set_rules('date_in', 'Date IN', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_itemin' => $id);
		$this->wellchemModel->delete_data($where, 'data_itemin');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataItemin');
	}
}

?>