<?php 
echo form_open('surat_masuk/agenda');
?>
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
              <h3 class="box-title"></h3>
              <div class="col-sm-3">
                <input type="date" name="tanggal1" placeholder="Tanggal Mulai" class="form-control" required>
              </div>
              <div class="col-sm-3">
                <input type="date" name="tanggal2" placeholder="Tanggal Mulai" class="form-control" required>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-sm">Lihat Data</button>
              <button type="submit" name="cetak" class="btn btn-danger btn-sm btn-print-transaction-list">
                <span class="fa fa-file-pdf-o"></span></button>
                <button type="submit" name="excel" class="btn bg-olive btn-sm btn-print-transaction-list">
                <span class="fa fa-file-excel-o"></span></button>
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
                  <th>Perihal</th>
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
                <td><?php echo $m->perihal; ?></td>
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
    </form>