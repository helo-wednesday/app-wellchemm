<?php

class dataPegawai extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Pegawai";
		$data['pegawai'] = $this->wellchemModel->get_data('data_pegawai')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataPegawai', $data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Pegawai";
		$data['jabatan'] = $this->wellchemModel->get_data('data_jabatan')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formTambahPegawai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nik = $this->input->post('nik');
			$nama_pegawai = $this->input->post('nama_pegawai');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jabatan = $this->input->post('jabatan');
			$tgl_masuk = $this->input->post('tgl_masuk');
			$status = $this->input->post('status');
			$hak_akses = $this->input->post('hak_akses');

			$data = array(
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'username' => $username,
				'password' => $password,
				'jenis_kelamin' => $jenis_kelamin,
				'jabatan' => $jabatan,
				'tgl_masuk' => $tgl_masuk,
				'status' => $status,
				'hak_akses' => $hak_akses
			);

			$this->wellchemModel->insert_data($data, 'data_pegawai');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil ditambahkan!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataPegawai');
		}
	}

	public function updateData($id)
	{
		$where = array('id_pegawai' => $id);
		$data['title'] = 'Update Data Pegawai';
		$data['jabatan'] = $this->wellchemModel->get_data('data_jabatan')->result();
		$data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/formUpdatePegawai', $data);
		$this->load->view('templates_admin/footer');

	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('id_pegawai');
			$nik = $this->input->post('nik');
			$nama_pegawai = $this->input->post('nama_pegawai');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jabatan = $this->input->post('jabatan');
			$tgl_masuk = $this->input->post('tgl_masuk');
			$status = $this->input->post('status');
			$hak_akses = $this->input->post('hak_akses');

			$data = array(
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'username' => $username,
				'password' => $password,
				'jenis_kelamin' => $jenis_kelamin,
				'jabatan' => $jabatan,
				'tgl_masuk' => $tgl_masuk,
				'status' => $status,
				'hak_akses' => $hak_akses
			);

			$where = array(
				'id_pegawai' => $id
			);

			$this->wellchemModel->update_data('data_pegawai', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil diupdate!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
			redirect('admin/dataPegawai');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	}

	public function deleteData($id)
	{
		$where = array('id_pegawai' => $id);
		$this->wellchemModel->delete_data($where, 'data_pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data berhasil dihapus!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
		redirect('admin/dataPegawai');
	}
}

?>