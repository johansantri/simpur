<h3>Welcome <strong><?php echo $this->session->userdata('first_name');?> <?php echo $this->session->userdata('last_name');?></strong></h3>

<p>Your are now inside the application</p></br>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                      <tr>
                                      <th>id</th>
                                       <th>npm</th>
                                      <th>nama </th>
                                     
                                        <th>status</th>
                                      
                                    
                                    
                                      <th>more</th>
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>id</th>
                                       <th>npm</th>
                                      <th>nama </th>
                                    
                                      <th>status</th>
                                      
                                      
                                      
                                     
                                      <th>more</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                      <?php $i = 1; foreach ($pinjam as $transaksi) {?>
                                      <tr >
                                      <td><?php echo $i ?> </td>
                                      <td><?php echo $transaksi->npm_npp ?> </td>
                                      <td><?php echo $transaksi->nama_depan ?> <?php echo $transaksi->nama_belakang ?> <sup style="background-color:yellow"><?php echo $transaksi->total ?></sup> <strong>buku</strong></td>
                                      
                                      <td><?php echo $transaksi->status_transaksi ?> </td>

                              
                                     
                                      <td ><a href="<?php echo base_url('i/transaksi/detail/'.$transaksi->id_anggota)?>" class="btn btn-secondary btn-sm"> <i class =" fa fa-list-alt"></i></a> </td>
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>

