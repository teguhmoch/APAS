<?php
echo form_open('karyawan/post');
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
			<td width="120">Nama Lengkap</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"></input></div></td>
		</tr>
		<tr>
			<td width="120">Usename</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="username" placeholder="Username"></input></div></td>
		</tr>
		<tr>
			<td width="120">Password</td>
			<td><div class="col-sm-4"><input type="password" class="form-control" name="pass" placeholder="Password"></input></div></td>
		</tr>
		<tr>
			<td width="120">Hak Akses</td>
			<td><div class="col-sm-4"><select name="hak" class="form-control"><option>admin</option></select></div></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submit">Simpan</button>
			<?php echo anchor('karyawan','kembali',array('class'=>'btn btn-warning btn-sm')) ?> </td>
		</tr>
	</table>					
				</div>
			</div>
		</div> 		
 	</div>
 </section>
 </form>
 </form>