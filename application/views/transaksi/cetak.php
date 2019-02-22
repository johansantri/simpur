
<!-- Example DataTables Card-->
<div class="card mb-3">

  <div class="card-header">
 
<a href="<?php echo base_url()?>i/transaksi/add" class="btn btn-sm btn-primary"> <i class =" fa fa-plus"></i></a></div>
 <?php 

    if ($this->session->flashdata('sukses')) {

        echo  '<div class ="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
        # code...
    }
    ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                      <tr>
                                      <th>id</th>
                                       <th>npm</th>
                                      <th>nama </th>
                                      <th>pinjam</th>
                                      <th>kembali</th>
                                        <th>status</th>
                                      
                                    
                                    
                                      <th>more</th>
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>id</th>
                                       <th>npm</th>
                                      <th>nama </th>
                                      <th>pinjam</th>
                                      <th>kembali</th>
                                      <th>status</th>
                                      
                                      
                                      
                                     
                                      <th>more</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                      <?php $i = 1; foreach ($transaksi as $transaksi) {?>
                                      <tr >
                                      <td><?php echo $i ?> </td>
                                      <td><?php echo $transaksi->npm_npp ?> </td>
                                      <td><?php echo $transaksi->nama_depan ?> <?php echo $transaksi->nama_belakang ?> <sup style="background-color:yellow"><?php echo $transaksi->total ?></sup> <strong>buku</strong></td>
                                      <td ><?php echo date('d-m-Y',strtotime($transaksi->tgl_pinjam)) ?> </td>
                                      <td ><?php echo date('d-m-Y',strtotime($transaksi->tgl_kembali)) ?> </td>
                                      <td><?php echo $transaksi->status_transaksi ?> </td>

                              
                                     
                                      <td ><a href="<?php echo base_url('i/transaksi/detail/'.$transaksi->id_anggota)?>" class="btn btn-secondary btn-sm"> <i class =" fa fa-list-alt"></i></a> </td>
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>








