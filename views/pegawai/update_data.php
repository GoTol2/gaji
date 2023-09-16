<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

</div>
<!-- /.container-fluid -->

<div class="card" style="width: 60% ; margin-bottom: 100px">
	<div class="card-body">

		<?php foreach ($pegawai as $p) : ?>
			<form method="POST" action="<?php echo base_url('pegawai/Dashboard/update_data_aksi') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $p->username ?>">
					<?php echo form_error('username', '<div class="text-small text-danger"> </div>') ?>
				</div>

				<input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $p->id_pegawai ?>">
				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="nama_pegawai" class="form-control" value="<?php echo $p->nama_pegawai ?>">
					<?php echo form_error('nama_pegawai', '<div class="text-small text-danger"> </div>') ?>
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control" value="<?php echo $p->id_pegawai ?>">
						<option value="<?php echo $p->jenis_kelamin ?>"><?php echo $p->jenis_kelamin ?></option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"> </div>') ?>
				</div>

				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control">
						<option value="<?php echo $p->jabatan ?>"><?php echo $p->jabatan ?></option>
						<?php foreach ($jabatan as $j) : ?>
							<option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $p->tanggal_masuk ?>">
					<?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"> </div>') ?>
				</div>

				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="<?php echo $p->status ?>"><?php echo $p->status ?></option>
						<option value="">--Pilih Status--</option>
						<option value="Guru Honorer">Guru Honorer</option>
						<option value="Guru ASN">Guru ASN</option>
					</select>
					<?php echo form_error('status', '<div class="text-small text-danger"> </div>') ?>
				</div>

				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control">
				</div>

				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="<?php echo base_url('pegawai/Dashboard') ?>" class="btn btn-warning">Kembali</a>

			</form>
		<?php endforeach; ?>
	</div>
</div>