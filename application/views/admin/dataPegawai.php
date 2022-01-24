<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <?= $this->session->flashdata('pesan') ?>

  <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?= base_url('admin/dataPegawai/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Pegawai </a>

  		<table class="table table-bordered table-striped mt-2">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">NIK</th>
			<th class="text-center">Nama Karyawan</th>
			<th class="text-center">Jenis Kelamin</th>
			<th class="text-center">Jabatan</th>
			<th class="text-center">Tanggal Masuk</th>
			<th class="text-center">Status</th>
      <th class="text-center">Hak Akses</th>
			<th class="text-center">Action</th>
		</tr>

		<?php $no=1; foreach ($pegawai as $p) : ?>
  		<tr>
  			<td class="text-center"><?= $no++ ?></td>
  			<td><?= $p->nik ?></td>
  			<td><?= $p->nama_pegawai ?></td>
  			<td><?= $p->jenis_kelamin ?></td>
  			<td><?= $p->jabatan ?></td>
  			<td class="text-center"><?= $p->tgl_masuk ?></td>
  			<td><?= $p->status?></td>
          <?php if($p->hak_akses=='1') { ?>
            <td>Admin</td>
          <?php } else{ ?>
            <td>Pegawai</td>
          <?php } ?>
        <td>
  				<center>
  					<a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPegawai/updateData/'.$p->id_pegawai) ?>"><i class="fas fa-edit"></i></a>
  					<a onclick="return confirm('Yakin Anda ingin menghapus data ini')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPegawai/deleteData/'.$p->id_pegawai) ?>"><i class="fas fa-trash"></i></a>
  				</center>
  			</td>
  		</tr>
  	<?php endforeach; ?>
		</table>

</div>
</div>




