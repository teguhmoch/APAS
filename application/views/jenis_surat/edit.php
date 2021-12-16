<?php
echo form_open('jenis_surat/edit');
 ?>
 <input name="id" type="hidden" value="<?php echo $record['id_surat']?>"></input>

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
      <td width="120">Jenis Surat</td>
      <td><div class="col-sm-4"><input type="text" class="form-control" name="njenis" placeholder="lampiran" value="<?php echo $record['nama_jenis']?>"></input></div></td>
    </tr>
    <tr>
      <td width="120">Kode Surat</td>
      <td><div class="col-sm-4"><input type="text" class="form-control" name="kode" placeholder="petunjuk" value="<?php echo $record['kode_surat']?>"></input></div></td>
    </tr>
    <tr>
      <td colspan="2"><button type="submit" class="btn btn-success btn-sm" name="submit">Simpan</button>
      <?php echo anchor('jenis_surat','kembali',array('class'=>'btn btn-warning btn-sm')) ?> </td>
    </tr>
  </table>          
        </div>
      </div>
    </div>    
  </div>
 </section>
 </form>
 </form>