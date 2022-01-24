<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="row">
  <div class="col-lg">
  <?= $this->session->flashdata('pesan') ?>

  <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?= base_url('admin/dataItem/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Item </a>

  		<table class="table table-bordered table-striped mt-2">
		<tr>
			<th class="text-center" style="width: 7%">No</th>
			<th class="text-center">Item</th>
			<th class="text-center" style="width: 20%">Harga Item</th>
			<th class="text-center" style="width: 15%">Kategori</th>
			<th class="text-center" style="width: 10%">Action</th>
		</tr>

		<?php $no=1; foreach ($item as $i) : ?>
  		<tr>
  			<td class="text-center"><?= $no++ ?></td>
  			<td><?= $i->nama_item ?></td>
  			<td>Rp. <?= number_format($i->harga_item,0,',','.') ?></td>
  			<td><?= $i->kategori ?></td>
        <td>
  				<center>
  					<a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataItem/updateData/'.$i->id_item) ?>"><i class="fas fa-edit"></i></a>
  					<a onclick="return confirm('Yakin Anda ingin menghapus data ini')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataItem/deleteData/'.$i->id_item) ?>"><i class="fas fa-trash"></i></a>
  				</center>
  			</td>
  		</tr>
  	<?php endforeach; ?>
		</table>

</div>
</div>
</div>
</div>




