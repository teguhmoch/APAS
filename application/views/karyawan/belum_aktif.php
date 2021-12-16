    <section class="content-header">
      <h1>
        Data Petugas
        <small>Aplikasi Pengrsipan Surat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Lihat Data</a></li>
        <li class="active">Data petugas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Petugas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Petugas</th>
                  <th>Hak</th>
                  <th>Last Login</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
                foreach($record as $p) { ?>
                </tr>
                <td><?php echo $no;?></td>
                <td width="600"><?php echo $p->nama_petugas;?></td>
                <td><?php echo $p->hak;?></td>
                <td><?php echo $p->last_login?></td>
                <td>
            <a href="<?php echo base_url(); ?>index.php/karyawan/aktifkan/<?php echo $p->id_petugas; ?>" class="btn btn-danger btn-sm fa fa-check-o" onclick="return confirm('Anda yakin akan mengaktifkan data ini ..??')">Aktifkan</a>
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