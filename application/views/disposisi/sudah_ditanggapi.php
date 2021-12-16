    <section class="content-header">
      <h1>
        Data Disposisi
        <small>Aplikasi Pengarsipan surat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Lihat Data</a></li>
        <li class="active">Data Disposisi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Disposisi</h3>
              <br>
              <br>
              <div class="btn-group">
                  <button type="button" class="btn btn-default">Print</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('disposisi/pdf') ?>">PDF</a></li>
                    <li><a href="<?php echo site_url('surat_keluar/excell') ?>">Excell</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Disposisi</th>
                  <th>No. Agenda</th>
                  <th>No. Surat</th>
                  <th>Pengirim</th>
                  <th>Kode Surat</th>
                  <th>Tanggal Kirim</th>
                  <th>Tanggal Terima</th>
                  <th>Sifat</th>
                  <th>Perihal</th>
                  <th>Kepada</th>
                  <th>Keterangan</th>
                  <th>Tanggapan</th>
                  <th>Catatan</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
          foreach($record as $d){
      ?>

                </tr>
                <td><?php echo $no;?></td>
                <td><?php echo $d->no_disposisi?></td>
                <td><?php echo $d->no_agenda;?></td>
                <td><?php echo $d->no_surat;?></td>
                <td><?php echo $d->pengirim;?></td> 
                <td><?php echo $d->kode_surat;?></td>
                <td><?php echo $d->tanggal_kirim; ?></td>
                <td><?php echo $d->tanggal_terima ; ?></td>
                <td><?php echo $d->sifat; ?></td>
                <td><?php echo $d->perihal; ?></td>
                <td><?php echo $d->kepada; ?></td>
                <td><?php echo $d->keterangan; ?></td>
                <td><?php echo $d->tanggapan; ?></td>
                <td><?php echo $d->catatan; ?></td>
                <td><a href="<?php echo base_url(); ?>index.php/disposisi/delete/<?php echo $d->no_disposisi; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin akan Menghapus Data Ini?')"><span class="fa fa-trash-o"></a></td>
                         
                        <?php 
                        $no++;
                         };?> 
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