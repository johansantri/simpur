
<!-- Example DataTables Card-->
<div class="card mb-3">

  <div class="card-header">
    
<a href="<?php echo base_url()?>i/buku/add" class="btn btn-primary btn-sm"> <i class =" fa fa-plus"></i></a></div>
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
                                      <th>kode</th>
                                      <th>judul</th>
                                      <th>pengarang</th>
                                      <th>penerbit</th>
                                      <th>tahun</th>
                                      <th>kondisi</th>
                                      <th>jumlah</th>
                                      <th>aksi</th>
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>id</th>
                                      <th>kode </th>
                                      <th>judul</th>
                                      <th>pengarang</th>
                                      <th>penerbit</th>
                                      <th>tahun</th>
                                      <th>kondisi</th>
                                      <th>jumlah</th>
                                      <th>aksi</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                      <?php $i = 1; foreach ($buku as $buku) {?>
                                      <tr >
                                      <td><?php echo $i ?> </td>
                                      <td><?php echo $buku->kode_buku ?></td>
                                      <td ><?php echo $buku->judul_buku ?>  </td>
                                      <td ><?php echo $buku->pengarang ?></td>
                                      <td ><?php echo $buku->penerbit ?></td>
                                      <td ><?php echo $buku->tahun ?></td>
                                      <td ><?php echo $buku->kondisi ?></td>
                                      <td ><?php echo $buku->jumlah ?></td>
                                      <td ><a href="<?php echo base_url('i/buku/edit/'.$buku->id_buku)?>" class="btn btn-sm btn-warning"><i class =" fa fa-edit"></i></a> <?php 
                                            //delete data
                                            include ('delete.php');
                                            ?></td> 
                                       </td>
                                      
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
