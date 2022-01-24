<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 60%; margin-bottom: 50px">
  	<div class="card-body">

  		<form method="POST" action="<?= base_url('admin/dataPegawai/tambahDataAksi') ?>">
  			
  			<div class="from-group">
  				<label>NIK</label>
  				<input type="number" name="nik" class="form-control">
  				<?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

  			<div class="from-group">
  				<label>Username</label>
  				<input type="text" name="username" class="form-control">
  				<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

        <div class="from-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Nama Pegawai</label>
          <input type="text" name="nama_pegawai" class="form-control">
          <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

  			<div class="from-group">
  				<label>Jenis Kelamin</label>
  				<select name="jenis_kelamin" class="form-control">
  					<option value="">--Pilih Jenis Kelamin--</option>
  					<option value="Laki-Laki">Laki-Laki</option>
  					<option value="Perempuan">Perempuan</option>
  				</select>
  				<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

  			<div class="from-group">
  				<label>Jabatan</label>
  				<select name="jabatan" class="form-control">
  					<option value="">--Pilih Jabatan--</option>
  					<?php foreach($jabatan as $j) : ?>
  					<option value="<?= $j->nama_jabatan ?>"><?= $j->nama_jabatan ?></option>
  					<?php endforeach; ?>
  				</select>
  				<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

  			<div class="from-group">
  				<label>Tanggal Masuk</label>
  				<input type="date" name="tgl_masuk" class="form-control">
  				<?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

  			<div class="from-group">
  				<label>Status</label>
  				<select name="status" class="form-control">
  					<option value="">--Pilih Status--</option>
  					<option value="Pegawai Tetap">Pegawai Tetap</option>
  					<option value="Pegawai Kontrak">Pegawai Kontrak</option>
  				</select>
  				<?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

        <div class="from-group">
          <label>Hak Akses</label>
          <select name="hak_akses" class="form-control">
            <option value="">--Pilih Hak Akses--</option>
            <option value="1">Admin</option>
            <option value="2">Pegawai</option>
          </select>
          <?= form_error('hak_akses', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

  			<br>

  			<button type="submit" class="btn btn-primary">Simpan</button>

  		</form>
  		
  	</div>
  </div>
</div>
</div>



