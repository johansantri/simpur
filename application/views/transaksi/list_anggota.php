
                  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                      <tr>
                                     
                                      <th >npm-no</th>
                                         <th >telpon</th>
                                      <th >nama</th>
                                      <th >Add</th>
                                      </tr >
                                      </thead>
                                      <tfoot>
                                      <tr>
                                    
                                      <th >npm-no</th>
                                         <th >telpon</th>
                                      <th >nama</th>
                                      <th >Add</th>
                                     
                                      
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                      <?php $i = 1; foreach ($anggota as $anggota) {?>
                                      <tr >
                                    
                                      <td  ><?php echo $anggota->npm_npp ?> </td>
                                      <td> <?php echo $anggota->no_hp ?> </td>
                                      <td>     <?php echo $anggota->nama_depan ?>  <?php echo $anggota->nama_belakang ?> </td>
                                      <td><a href="<?php echo base_url('i/transaksi/pinjam/'.$anggota->id_anggota)?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></td>
                                    
                                     
                                     
                                      
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>