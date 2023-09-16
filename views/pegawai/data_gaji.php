<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

  <table class="table table-striped table-bordered">
  	<tr>
  		<th>Bulan/Tahun</th>
		<!-- <th>Hadir</th> -->
  		<th>Gaji Pokok</th>
  		<th>Tunjangan Kinerja</th>
  		<th>Tunjangan Struktural</th>
  		<th>Total Gaji</th>
  	</tr>

  	<?php foreach ($gaji as $g) :
	 ?>
  	<tr>
  		<td><?php echo $g->bulan ?></td>
  		<td>Rp. <?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
  		<td>Rp. <?php echo number_format($g->tj_kinerja,0,',','.') ?></td>
  		<td>Rp. <?php echo number_format($g->tj_struktural,0,',','.') ?></td>
  		<td>Rp. <?php echo number_format($g->gaji_pokok+$g->tj_kinerja+$g->tj_struktural,0,',','.') ?></td>
  	</tr>
  <?php endforeach; ?>
  </table>

</div>
<!-- /.container-fluid -->