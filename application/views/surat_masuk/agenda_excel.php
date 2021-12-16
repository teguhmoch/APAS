<table border="1">
	<tr>
		<th>No</th><th>ID Masuk</th><th>Jenis Surat</th><th>Tanggal Kirim</th><th>Tanggal Terima</th><th>No Surat</th><th>Pengirim</th><th>Perihal</th><th>Sifat</th>
	</tr>

	<?php
		$no=1;
		foreach ($excel->result() as $r) {
	?>
	<tr>
		<td width="50">$no</td>
		<td width="160"><?php echo $r->id_masuk ?></td>
		<td width="160"><?php echo $r->jenis_surat ?></td>
		<td width="160"><?php echo $r->tanggal_kirim ?></td>
		<td width="160"><?php echo $r->tanggal_terima ?></td>
		<td width="200"><?php echo $r->no_surat ?></td>
		<td width="160"><?php echo $r->pengirim ?></td>
		<td width="160"><?php echo $r->sifat ?></td>
		<td width="160"><?php echo $r->perihal ?></td>

	</tr>
	<?php $no++; }?>



</table>