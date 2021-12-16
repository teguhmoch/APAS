    <section class="content-header">
      <h1>
        Data Jenis Surat
        <small>Aplikasi Pengarsipan surat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Lihat Data</a></li>
        <li class="active">Jenis Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Surat Masuk</h3>
              <br>
              <br>
              <?php echo anchor('jenis_surat/post','Tambah Data',array('class'=>'btn btn-success')) ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis Surat</th>
                  <th>Kode Surat</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                foreach($record as $m) { ?>
                </tr>
                <td><?php echo $no;?></td>
                <td><?php echo $m->nama_jenis;?></td>
                <td><?php echo $m->kode_surat;?></td>
                <td>
                  <div class="input-group input-group-sm">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/jenis_surat/edit/<?php echo $m->id_surat; ?>" class=""> Edit</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/jenis_surat/delete/<?php echo $m->id_surat; ?>" class="" onclick="return confirm('Anda yakin akan menghapus data ini ..??')">  Delete</a></li>
                  </ul>
                </div>
                </td>
                <?php $no++; } ?>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <form name="form" class="form-horizontal" action="<?php echo base_url(); ?>index.php/surat_masuk/simpan" method="post">
                <div class="form-group">
                <div class="form-group">
                  <input type="hidden" name="agenda" id="agenda" class="form-control" value="" readonly>
                </div>
                  <input type="hidden" name="$id" class="form-control" value="$id" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Surat dari </label>
                  <div class="col-sm-4">
                  <input type="text" name="pengirim" value="<?php echo $pengirim?>" readonly/>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-4 control-label">No. Surat </label>
                  <div class="col-sm-4">
                  <input type="text" name="nosurat" value=""/>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-4 control-label">Tanggal Surat</label>
                  <div class="col-sm-4">
                  <input type="text" name="tkirim" value="" readonly/>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-4 control-label">Diterima Tanggal</label>
                  <div class="col-sm-4">
                  <input type="text" name="tterima" value="" readonly/>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-4 control-label">Kode Surat</label>
                  <div class="col-sm-4">
                  <input type="text" name="kode" value="" readonly/>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-4 control-label">Sifat</label>
                  <div class="col-sm-4">
                  <input type="text" name="sifat" value="" readonly/>
                </div>
                </div>
                <div class="form-group">
                <label for="" class="col-sm-4 control-label">Perihal</label>
                  <div class="col-sm-4">
                  <input type="text" name="perihal" value="" readonly/>
                </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Disposisi</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->