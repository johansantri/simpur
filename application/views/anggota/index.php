
<!-- Example DataTables Card-->
<div class="card mb-3">

  <div class="card-header">
   
<a href="<?php echo base_url()?>i/anggota/add" class="btn btn-sm btn-primary"> <i class =" fa fa-plus"></i></a></div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                      <tr>
                                      <th>id</th>
                                      <th>npm</th>
                                      <th>nama</th>
                                      <th>fakultas</th>
                                      <th>jurusan</th>
                                      <th>contact</th>
                                      <th>status</th>
                                      <th>aksi</th>
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>id</th>
                                      <th>npm</th>
                                      <th>nama</th>
                                      <th>fakultas</th>
                                      <th>jurusan</th>
                                      <th>contact</th>
                                      <th>status</th>
                                      <th>aksi</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                      <?php $i = 1; foreach ($anggota as $anggota) {?>
                                      <tr >
                                      <td><?php echo $i ?> </td>
                                      <td><?php echo $anggota->npm_npp ?></td>
                                      <td ><a href="<?php echo base_url('i/anggota/detail/'.$anggota->id_anggota)?>"><?php echo $anggota->nama_depan ?>  <?php echo $anggota->nama_belakang ?></a></td>
                                      <td ><?php echo $anggota->fakultas ?></td>
                                      <td ><?php echo $anggota->jurusan ?></td>
                                      <td ><?php echo $anggota->no_hp ?></td>
                                      <td ><?php echo $anggota->status ?></td>
                                      <td ><a href="<?php echo base_url('i/anggota/edit/'.$anggota->id_anggota)?>" class="btn btn-sm btn-warning"><i class =" fa fa-edit"></i></a> </td>
                                      
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
