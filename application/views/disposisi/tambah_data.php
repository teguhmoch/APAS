<?php
echo form_open('disposisi/post');
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
			<td><div class="col-sm-4"><input type="text" class="form-control" name="agenda" placeholder="No. Agenda"></input></div></td>
		</tr>
				<tr>
			<td width="120">No. Surat</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="nosurat" placeholder="Nomor Surat"></input></div></td>
		</tr>
		<tr>
			<td width="120">Kepada</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="kepada" placeholder="Kepada"></input></div></td>
		</tr>
		<tr>
			<td width="120">Keterangan</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="keterangan" placeholder="Keterangan"></input></div></td>
		</tr>
		<tr>
			<td width="120">Status Surat</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="status" placeholder="Status Surat"></input></div></td>
		</tr>
		<tr>
			<td width="120">Tanggapan</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="tanggapan" placeholder="Tanggapan"></input></div></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submit">Simpan</button>
			<?php echo anchor('disposisi','kembali',array('class'=>'btn btn-warning btn-sm')) ?> </td>
		</tr>
	</table>					
				</div>
			</div>
		</div> 		
 	</div>
 </section>
 </form>
 </form>