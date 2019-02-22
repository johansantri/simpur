
<!-- Example DataTables Card-->
<div class="card mb-3">

  <div class="card-header">
   
<a href="<?php echo base_url()?>i/kategori/add" class="btn btn-sm btn-primary"> <i class =" fa fa-plus"></i></a></div>
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
                                      <th>nama kategori</th>
                                      <th>catatan</th>
                                      <th>aksi</th>
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>id</th>
                                      <th>nama kategori</th>
                                      <th>catatan</th>
                                      <th>aksi</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                      <?php $i = 1; foreach ($kategori as $kategori) {?>
                                      <tr >
                                      <td><?php echo $i ?> </td>
                                      <td><?php echo $kategori->nama_kategori ?></td>
                                      <td ><?php echo $kategori->catatan ?> </td>
                                    
                                      <td ><a href="<?php echo base_url('i/kategori/edit/'.$kategori->id)?>" class="btn btn-sm btn-warning"><i class =" fa fa-edit"></i></a> </td>
                                      
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
