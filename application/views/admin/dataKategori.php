<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="row">
  <div class="col-lg-5">
  <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/dataKategori/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data Kategori</a>
  <?= $this->session->flashdata('pesan') ?>

  <table class="table table-bordered table-striped mt-2">
  	<tr>
  		<th class="text-center" style="width: 10%">No</th>
  		<th class="text-center">Kategori</th>
  		<th class="text-center">Action</th>
  	</tr>

  	<?php $no=1; foreach ($kategori as $k) : ?>
  		<tr>
  			<td class="text-center"><?= $no++ ?></td>
  			<td><?= $k->nama_kategori ?></td>
  			<td>
  				<center>
  					<a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataKategori/updateData/'.$k->id_kategori) ?>"><i class="fas fa-edit"></i></a>
  					<a onclick="return confirm('Yakin Anda ingin menghapus data ini')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataKategori/deleteData/'.$k->id_kategori) ?>"><i class="fas fa-trash"></i></a>
  				</center>
  			</td>
  		</tr>
  	<?php endforeach; ?>
  </table>
</div>
</div>
</div>
</div>



