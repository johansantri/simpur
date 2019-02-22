                   
                         

      <?php if($lihat):
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                           
                        //open form
                        echo form_open(base_url('i/transaksi/kembali/'.$lihat->id_transaksi));
                        ?>
                         <div class="row">
                        <div class="col-md-12">
                             
                        <div class="form-group">
                        <label> JUDUL BUKU</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?php echo $lihat->judul_buku ; ?>"  readonly disabled >
                         <input type="hidden" name="status_transaksi" class="form-control" value="kembali"  >
                        </div>
                        </div>

                        
                        
                       <div class="col-md-3">
                        <div class="form-group">
                        <label> TANGGAL PINJAM </label>
                        <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $lihat->tgl_pinjam ; ?> "   readonly disabled >
                        </div>
                        </div>

                          <div class="col-md-3">
                        <div class="form-group">
                        <label> JATUH TEMPO </label>
                        <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $lihat->tgl_kembali ; ?> "   readonly disabled >
                        </div>
                        </div>

                         <?php $awal=date_create($lihat->tgl_kembali);
                          $akhir=date_create();
                         
                         $format="Y-m-d";
                         if(date_format($awal,$format)<date_format($akhir,$format)  ){?>
                         <?php $coba=date_diff($awal, $akhir); ?>
                                      


                        <div class="col-md-3">
                        <div class="form-group">
                        <label> TERLAMBAT </label>
                        <input type="text" name="terlambat" id="terlambat" class="form-control" value="<?php echo $coba->days ?>"  readonly >
                        </div>
                        </div>
                      

                          <?php  $hitung=$coba->days;
                          $nominal=1000;
                          $hasil=$hitung*$nominal;?>
                                     

                        <div class="col-md-3">
                        <div class="form-group">
                        <label> DENDA </label>
                        <input type="text" name="denda" class="form-control" value="<?php echo $hasil;?>" readonly  >
                        </div>
                        </div>

                        <?php }else if(date_format($awal,$format)>date_format($akhir,$format) ){ ?>
                        <div class="col-md-3">
                        <div class="form-group">
                        <label> TERLAMBAT </label>
                        <input type="text" name="terlambat" id="terlambat" class="form-control" value="<?php echo $lihat->terlambat ?>" readonly disabled >
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label> DENDA </label>
                        <input type="text" name="denda" class="form-control" value="<?php echo $lihat->denda;?>" readonly disabled >
                        </div>
                        </div>
                                       
                         <?php } ?>
                           

                         </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg col-md-12" value="save">
                       
                        </div>
                        </div>
                        </div>
                       
                        <?php endif; ?>
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>

                        
                        
                      

                