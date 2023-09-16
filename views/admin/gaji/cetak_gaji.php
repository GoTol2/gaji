<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h1>SMA Islam Mishbahul Ulum</h1>
		<h2>Daftar Gaji Pegawai</h2>
	</center>

	<?php
	if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	?>
	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo $bulan?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo $tahun?></td>
		</tr>
	</table>
	<table class="table table-bordered table-triped">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">NIK</th>
				<th class="text-center">Nama Pegawai</th>
				<th class="text-center">Jenis Kelamin</th>
				<th class="text-center">Jabatan</th>
				<th class="text-center">Hadir</th>
				<th class="text-center">Gaji Pokok</th>
				<th class="text-center">Tunjangan kinerja</th>
				<th class="text-center">Tunjangan Struktural</th>
				<th class="text-center">Total Gaji</th>
			</tr>
		
			<?php $no=1; foreach($cetak_gaji as $g): 
				$total = ($g->tj_kinerja / 20) * $g->hadir;
				if ($total>=300000) {
					$total = 300000;
				}
				if ($g->hadir != 0) {
			?>
	
			<tr>
				<td class="text-center"><?php echo $no++ ?></td>
				<td class="text-center"><?php echo $g->nik ?></td>
				<td class="text-center"><?php echo $g->nama_pegawai ?></td>
				<td class="text-center"><?php echo $g->jenis_kelamin ?></td>
				<td class="text-center"><?php echo $g->nama_jabatan ?></td>
				<td class="text-center"><?php echo $g->hadir ?></td>
				<td class="text-center">Rp. <?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
				<td class="text-center">Rp. <?php echo number_format($total,0,',','.') ?></td>
				<td class="text-center">Rp. <?php echo number_format($g->tj_struktural,0,',','.') ?></td>
				<td class="text-center">Rp. <?php echo number_format($g->gaji_pokok + $total + $g->tj_struktural,0,',','.') ?></td>
			</tr>
			<?php } endforeach ;?>
	
		</table>

		<table width="100%">
			<tr>
				<td></td>
				<td width="200px">
					<p>Bendahara, <?php echo date("d M Y") ?> <br> SMA Islam Mishbahul Ulum</p>
					<br>
					<br>
					<p>_____________________</p>
				</td>
			</tr>
		</table>
</body>
</html>

<script type="text/javascript">
	window.print();
</script>