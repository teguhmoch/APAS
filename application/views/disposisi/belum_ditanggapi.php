<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
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
                  <th>Pengirim</th>
                  <th>Kode Surat</th>
                  <th>Tanggal Kirim</th>
                  <th>Tanggal Terima</th>
                  <th>Sifat</th>
                  <th>Perihal</th>
                  <td>tindakan</td>
                </tr>
                </thead>
                <tbody>
                <?php $no=1;
          foreach($record->result_array() as $i):
          $no_disposisi=$i['no_disposisi'];
          $no_agenda=$i['no_agenda'];
          $no_surat=$i['no_surat'];
          $pengirim=$i['pengirim'];
          $kode_surat=$i['kode_surat'];
          $tanggal_kirim=$i['tanggal_kirim'];
          $tanggal_terima=$i['tanggal_terima'];
          $sifat=$i['sifat'];
          $perihal=$i['perihal'];
      ?>

                </tr>
                <td><?php echo $no;?></td>
                <td><?php echo $no_disposisi?></td>
                <td><?php echo $no_agenda;?></td>
                <td><?php echo $no_surat;?></td>
                <td><?php echo $pengirim;?></td> 
                <td><?php echo $kode_surat;?></td>
                <td><?php echo $tanggal_kirim; ?></td>
                <td><?php echo $tanggal_terima ; ?></td>
                <td><?php echo $sifat; ?></td>
                <td><?php echo $perihal; ?></td>
                <td>
                  <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $no_disposisi;?>"> Edit</a>
                  <a href="<?php echo base_url(); ?>index.php/disposisi/lembar_disposisi/<?php echo $no_disposisi; ?>" class="btn btn-danger btn-sm btn-print-transaction-list"><span class="fa fa-file-pdf-o"></span></a>
                </td>
                         
                        <?php 
                        $no++;
                        endforeach;?> 
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

    <?php 
        foreach($record->result_array() as $i):
            $no_disposisi=$i['no_disposisi'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $no_disposisi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/disposisi/tanggapi'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No Disposisi</label>
                        <div class="col-xs-8">
                            <input name="id" value="<?php echo $no_disposisi;?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kepada</label>
                        <div class="col-xs-8">
                            <input name="kepada" value="" class="form-control" type="text" placeholder="Kepada" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan</label>
                        <div class="col-xs-8">
                            <input name="keterangan" value="" class="form-control" type="text" placeholder="Keterangan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggapan</label>
                        <div class="col-xs-8">
                            <input name="tanggapan" value="" class="form-control" type="text" placeholder="Tanggapan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Catatan</label>
                        <div class="col-xs-8">
                            <input name="catatan" value="" class="form-control" type="text" placeholder="Catatan" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>