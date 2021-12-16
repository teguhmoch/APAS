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
              <?php echo anchor('disposisi/post','Tambah Data',array('class'=>'btn btn-success')) ?>
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
                  <th>Kepada</th>
                  <th>Keterangan</th>
                  <th>Status Surat</th>
                  <th>Tanggapan</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                foreach($record as $d) { ?>
                </tr>
                <td><?php echo $no;?></td>
                <td><?php echo $d->no_disposisi?></td>
                <td><?php echo $d->no_agenda;?></td>
                <td><?php echo $d->no_surat;?></td>
                <td><?php echo $d->kepada;?></td>
                <td><?php echo $d->keterangan;?></td>
                <td><?php echo $d->status_surat; ?></td>
                <td><?php echo $d->tanggapan; ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>index.php/disposisi/edit/<?php echo $d->no_disposisi; ?>" class="btn btn-warning btn-sm fa fa-pencil"> Edit</a>
            <a href="<?php echo base_url(); ?>index.php/disposisi/delete/<?php echo $d->no_disposisi; ?>" class="btn btn-danger btn-sm fa fa-trash-o" onclick="return confirm('Anda yakin akan menghapus data ini ..??')">  Delete</a>
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