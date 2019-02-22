
<!-- Example DataTables Card-->
<div class="card mb-3">

 <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                      <tr>
                                      <th>id</th>
                                       
                                      <th>judul buku </th>
                                      <th>pinjam</th>
                                      <th>kembali</th>
                                        <th>status</th>
                                       <th>terlambat</th>
                                      <th>denda</th>
                                    
                                     
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>id</th>
                                     
                                      <th>judul buku </th>
                                      <th>pinjam</th>
                                      <th>kembali</th>
                                      <th>status</th>
                                       <th>terlambat</th>
                                       <th>denda</th>
                                                                           
                                      
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                        
                                      <?php $i = 1; foreach ($lis as $transaksi) {?>
                                      <tr >
                                      <td><?php echo $i ?> </td>
                                   
                                      <td><?php echo $transaksi->judul_buku ?>  </td>
                                      <td ><?php echo date('d-m-Y',strtotime($transaksi->tgl_pinjam)) ?> </td>
                                      <td ><?php echo date('d-m-Y',strtotime($transaksi->tgl_kembali)) ?> </td>
                                      <td><?php echo $transaksi->status_transaksi ?> </td>

                                      <?php $awal=date_create($transaksi->tgl_kembali);
                                      $akhir=date_create();
                                     
                                     $format="Y-m-d";
                                     if(date_format($awal,$format)<date_format($akhir,$format)  ){?>
                                     <?php $coba=date_diff($awal, $akhir); ?>
                                       <td > <span style="background-color:yellow"> <?php echo $coba->days ?> hari </span>   </td>
                                      <?php  $hitung=$coba->days;
                                      $nominal=1000;
                                      $hasil=$hitung*$nominal;?>
                                       <td ><span style="background-color:yellow"> Rp. <?php echo $hasil;?> </span> </td>
                                     <?php }else if(date_format($awal,$format)>date_format($akhir,$format) ){ ?>
                                      <td > 0 hari  </td>
                                        <td >  Rp. 0  </td>
                                     <?php } ?>
                                      
                                    
                                    
                                    
                                     
                                      </tr>
                                      <?php $i++; }?>
         
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted text-center"></div>
</div>


