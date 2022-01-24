<?php

class Dashboard extends CI_Controller 
{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') !='1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert" tyle="width: 60%">
			  	<strong>Anda belum login!</strong>
			 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>');
				redirect('welcome');
		}
	}
	public function index()
	{
		$data['title'] = "Dashboard";
		$pegawai = $this->db->query("SELECT *  FROM data_pegawai");
		$admin = $this->db->query("SELECT *  FROM data_pegawai 	WHERE jabatan = 'Admin'");
		$jabatan = $this->db->query("SELECT *  FROM data_jabatan");
		$supplier = $this->db->query("SELECT *  FROM data_supplier");
		$customer = $this->db->query("SELECT *  FROM data_customer");
		$item = $this->db->query("SELECT *  FROM data_item");
		$itemin = $this->db->query("SELECT *  FROM data_itemin");
		$itemout = $this->db->query("SELECT *  FROM data_itemout");
		$data['pegawai']=$pegawai->num_rows();
		$data['admin']=$admin->num_rows();
		$data['jabatan']=$jabatan->num_rows();
		$data['supplier']=$supplier->num_rows();
		$data['customer']=$customer->num_rows();
		$data['item']=$item->num_rows();
		$data['itemin']=$itemin->num_rows();
		$data['itemout']=$itemout->num_rows();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}

?>