<table border="1">
	<tr><td>No</td><td>No Agenda</td><td>Jenis Surat</td><td>Tanggal Kirim</td><td>Tanggal Terima</td><td>No Surat</td><td>Pengirim</td><td>Perihal</td></tr>
	<?php
	$no=1;
	$total=0; 
	foreach ($record->result() as $m)
	{

	 echo "<tr>
	 <td width='50'>$no</td>
	 <td width='160'>$m->no_agenda</td>
	 <td width='160'>$m->jenis_surat</td>
	 <td width='160'>$m->tanggal_kirim</td>
	 <td width='160'>$m->tanggal_terima</td>
	 <td width='200'>$m->no_surat</td>
	 <td width='160'>$m->pengirim</td>
	 <td width='160'>$m->perihal</td>
	 </tr>";
	 $no++;
	}
	?>
	<tr></tr>
</table>