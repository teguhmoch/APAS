    <section class="content-header">
      <h1>
        Data Surat Masuk
        <small>Aplikasi Pengarsipan surat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Lihat Data</a></li>
        <li class="active">Surat Masuk</li>
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
              <?php echo anchor('surat_masuk/post','Tambah Data',array('class'=>'btn btn-success')) ?>
              <br>
              <br>
              <div class="btn-group">
                  <button type="button" class="btn btn-default"><span class="fa fa-print"></button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('surat_masuk/pdf') ?>">PDF</a></li>
                    <li><a href="<?php echo site_url('surat_masuk/excell') ?>">Excell</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Agenda</th>
                  <th>Jenis Surat</th>
                  <th>Kode Surat</th>
                  <th>Tanggal Kirim</th>
                  <th>Tanggal Terima</th>
                  <th>No. Surat</th>
                  <th>Pengirim</th>
                  <th>Sifat Surat</th>
                  <th>Perihal</th>
                  <th>Lampiran</th>
                  <th>No. Petunjuk</th>
                  <th>tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                foreach($record as $m) { ?>
                </tr>
                <td><?php echo $no;?></td>
                <td><?php echo $m->no_agenda;?></td>
                <td><?php echo $m->jenis_surat;?></td>
                <td><?php echo $m->jenis_surat;?></td>
                <td><?php echo $m->tanggal_kirim;?></td>
                <td><?php echo $m->tanggal_terima;?></td>
                <td><?php echo $m->no_surat;?></td>
                <td><?php echo $m->pengirim; ?></td>
                <td><?php echo $m->sifat?></td>
                <td><?php echo $m->perihal; ?></td>
                <td><?php echo $m->lampiran;?></td>
                <td><?php echo $m->nomor_petunjuk?></td>
                <td>
                  <div class="input-group input-group-sm">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/surat_masuk/edit/<?php echo $m->id_masuk; ?>" class=""> Edit</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/surat_masuk/delete/<?php echo $m->id_masuk; ?>" class="" onclick="return confirm('Anda yakin akan menghapus data ini ..??')">  Delete</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>index.php/surat_masuk/simpan/<?php echo $m->id_masuk; ?>" class="" onclick="return confirm('Anda yakin akan Disposisikan data ini..??')">Disposisi</a></li>
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
    