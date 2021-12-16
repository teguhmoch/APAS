<?php
echo form_open('surat_keluar/edit');
 ?>
 <input type="hidden" name="id" value="<?php echo $record['id_keluar']?>"></input>

 <section class="content">
 	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Input</h3>
			</div>

			<form class="form-horizontal">
			<div class="box-body">
				<div class="form-group">
	<table class="table table-bordered">
		<tr>
			<td width="120">No. Agenda</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="agenda" placeholder="No. Agenda" value="<?php echo $record['no_agenda']?>"></input></div></td>
		</tr>
		<tr>
      <td width="120">Jenis Surat</td>
      <td><div class="col-sm-4"><select name="jenis" class="form-control"><?php 
      foreach ($jenis as $j)
      {
              echo "<option value='$j->kode_surat'";
              echo $record['jenis_surat']==$j->id_surat?'selected':'';
              echo">$j->nama_jenis</option>";
      }

    ?>
    </select></div></td>
    </tr>
		<tr>
			<td width="120">Tanggal Kirim</td>
			<td><div class="col-sm-4"><input type="date" class="form-control" name="tkirim" placeholder="Tanggal Kirim" value="<?php echo $record['tanggal_kirim']?>"></input></div></td>
		</tr>
		<tr>
			<td width="120">No. Surat</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="nosurat" placeholder="Nomor Surat" value="<?php echo $record['no_surat']?>"></input></div></td>
		</tr>
		<tr>
			<td width="120">Pengirim</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="pengirim" placeholder="Pengirim" value="<?php echo $record['pengirim']?>"></input></div></td>
		</tr>
		<tr>
			<td width="120">Perihal</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="perihal" placeholder="Perihal" value="<?php echo $record['perihal']?>"></input></div></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submit">Simpan</button>
			<?php echo anchor('surat_keluar','kembali',array('class'=>'btn btn-warning btn-sm')) ?> </td>
		</tr>
	</table>					
				</div>
			</div>
		</div> 		
 	</div>
 </section>
 </form>
 </form>