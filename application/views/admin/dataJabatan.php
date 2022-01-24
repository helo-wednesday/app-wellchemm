<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="row">
  <div class="col-lg-7">
  <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/dataJabatan/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data Jabatan</a>
  <?= $this->session->flashdata('pesan') ?>

  <table class="table table-bordered table-striped mt-2">
  	<tr>
  		<th class="text-center" style="width: 10%">No</th>
  		<th class="text-center">Nama Jabatan</th>
  		<th class="text-center">Action</th>
  	</tr>

  	<?php $no=1; foreach ($jabatan as $j) : ?>
  		<tr>
  			<td class="text-center"><?= $no++ ?></td>
  			<td><?= $j->nama_jabatan ?></td>
  			<td>
  				<center>
  					<a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataJabatan/updateData/'.$j->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
  					<a onclick="return confirm('Yakin Anda ingin menghapus data ini')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
  				</center>
  			</td>
  		</tr>
  	<?php endforeach; ?>
  </table>
</div>
</div>
</div>
</div>



