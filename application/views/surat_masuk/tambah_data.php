<?php
echo form_open('surat_masuk/post');
 ?>

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
			<td><div class="col-sm-4"><input type="number" class="form-control" name="agenda" placeholder="No. Agenda"></input></div></td>
		</tr>
		<tr>
			<td width="120">Jenis Surat</td>
			<td><div class="col-sm-4"><select name="jenis" class="form-control"><?php 
      foreach ($record as $j)
      {
        echo "<option value='$j->kode_surat'>$j->nama_jenis</option>";
      }

    ?>
		</select></div></td>
		</tr>
		<tr>
			<td width="120">Tanggal Kirim</td>
			<td><div class="col-sm-4"><input type="date" class="form-control" name="tkirim" placeholder="Tanggal Kirim"></input></div></td>
		</tr>
		<tr>
			<td width="120">Tanggal Terima</td>
			<td><div class="col-sm-4"><input type="date" class="form-control" name="tterima" placeholder="Tanggal Terima"></input></div></td>
		</tr>
		<tr>
			<td width="120">No. Surat</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="nosurat" placeholder="Nomor Surat"></input></div></td>
		</tr>
		<tr>
			<td width="120">Pengirim</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="pengirim" placeholder="Pengirim"></input></div></td>
		</tr>
		<tr>
			<td width="120">Sifat Surat</td>
			<td><div class="col-sm-4"><input type="radio" name="sifat" id="optionsRadios1" value="sangat segera"> sangat segera</input>
									  <input type="radio" name="sifat" id="optionsRadios2" value="rahasia"> Rahasia</input>
									  <input type="radio" name="sifat" id="optionsRadios3" value="segera"> Segera</input></div></td>
		</tr>
		<tr>
			<td width="120">Perihal</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="perihal" placeholder="Perihal"></input></div></td>
		</tr>
		<tr>
			<td width="120">lampiran</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="lampiran" placeholder="lampiran"></input></div></td>
		</tr>
		<tr>
			<td width="120">Petunjuk</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="petunjuk" placeholder="petunjuk"></input></div></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submit">Simpan</button>
			<?php echo anchor('surat_masuk','kembali',array('class'=>'btn btn-warning btn-sm')) ?> </td>
		</tr>
	</table>					
				</div>
			</div>
		</div> 		
 	</div>
 </section>
 </form>
 </form>