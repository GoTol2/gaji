<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];
		$bulantahun = $bulan . $tahun;
	} else {
		$bulan = date('m');
		$tahun = date('Y');
		$bulantahun = $bulan . $tahun;
	}
	?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="card mb-3">
		<div class="card-header bg-primary text-white">
			Input Absensi Pegawai
		</div>
		<div class="card-body">
			<form class="form-inline" action="" method="get">

				<div class="form-group mb-2">
					<label for="staticEmail2">Hari</label>
					<select class="form-control ml-3" name="hari">
						<option value=""> Pilih Hari </option>
						<?php
						$hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
						var_dump($hari);
						for ($i = 1; $i <= $hari; $i++) { ?>
							<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php } ?>
					</select>
				</div>

				<input type="hidden" name="bulan" value="<?= $_GET['bulan'] ?>">
				<input type="hidden" name="tahun" value="<?= $_GET['tahun'] ?>">

				<button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate Form</button>
			</form>
		</div>
	</div>

	<div class="alert alert-info">
		Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
	</div>
	<?php
	$hari = isset($_GET['hari']) ? $_GET['hari'] : '';

	if (!empty($hari)) { ?>
		<form method="POST">
			<button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan</button>
			<table class="table table-bordered table-striped">
				<tr>
					<td class="text-center">No</td>
					<td class="text-center">NIK</td>
					<td class="text-center">Nama Pegawai</td>
					<td class="text-center">Jenis Kelamin</td>
					<td class="text-center">Jabatan</td>
					<td class="text-center" width="8%">Hadir</td>
				</tr>
				<?php $no = 1;
				foreach ($input_absensi as $a) :
				if ($a->nama_jabatan != 'Admin') {
					# code...
				}
				?>
					<tr>
						<input type="hidden" name="bulan[]" class="form-control" value="<?php echo "$hari$bulantahun" ?>">
						<input type="hidden" name="nik[]" class="form-control" value="<?php echo $a->nik ?>">
						<input type="hidden" name="nama_pegawai[]" class="form-control" value="<?php echo $a->nama_pegawai ?>">
						<input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?php echo $a->jenis_kelamin ?>">
						<input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $a->nama_jabatan ?>">


						<td><?php echo $no++ ?></td>
						<td><?php echo $a->nik ?></td>
						<td><?php echo $a->nama_pegawai ?></td>
						<td><?php echo $a->jenis_kelamin ?></td>
						<td><?php echo $a->nama_jabatan ?></td>
						<!-- <td><input type="number" name="hadir[]" class="form-control" min="0" value="0" onchange="checkAttendance(this)"> </td> -->
						<td>
							<select class="form-control" name="hadir[]">
								<option value="0"> Tidak </option>
								<option value="1"> Ya </option>
							</select>
						</td>
					</tr>
				<?php endforeach; ?>
			</table><br></br><br></br>
		</form>
	<?php } ?>
</div>

<!-- /.container-fluid -->
<!-- <script>
    var attendedEmployees = {};

    function checkAttendance(input) {
        var nik = input.nextElementSibling.value; // Ambil nilai nik
        var attendanceCount = parseInt(input.value);

        if (attendanceCount > 1) {
            alert("Anda hanya boleh memasukkan satu kehadiran.");
            input.value = 1;
        }

        // Simpan data kehadiran pegawai
        attendedEmployees[nik] = attendanceCount;
    }
</script> -->