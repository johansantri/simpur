
                  <?php
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                        
                        //open form
                        echo form_open(base_url('i/buku/add'));
                        ?>
                        <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                        <label> kode buku</label>
                        <input type="text" name="kode_buku" class="form-control" value="<?php echo set_value ('kode_buku') ?>" placeholder="24782935794" maxlength="20" required>
                        </div>
                        </div>
                        
                       <div class="col-md-9">
                        <div class="form-group">
                        <label> judul buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?php echo set_value ('judul_buku') ?>" placeholder="sistem.." required>
                        </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                        <label> pengarang</label>
                        <input type="text" name="pengarang" class="form-control" value="<?php echo set_value ('pengarang') ?>" placeholder="jokowi" maxlength="50" required>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                        <label> penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="<?php echo set_value ('penerbit') ?>" placeholder="gunung kembar" maxlength="40" required>
                        </div>
                        </div>

                        <div class="col-md-1">
                        <div class="form-group">
                        <label> tahun</label>
                        <input type="text" name="tahun" class="form-control" value="<?php echo set_value ('tahun') ?>" placeholder="0000"  maxlength="4" required>
                        </div>
                        </div>

                          <div class="col-md-3">
                        <div class="form-group">
                        <label> asal buku</label>
                        <input type="text" name="asal_buku" class="form-control" value="<?php echo set_value ('asal_buku') ?>" placeholder="gunung kembar" maxlength="40" required>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                        <label> kategori</label>
                        <select class="form-control" name ="id_kategori" id="kategori" value="<?php echo set_value ('nama_kategori') ?>" required >
                        <option value="">pilih</option>

                        <?php foreach ($kategori as $kategori) {?>
                            
                        <option value="<?php echo $kategori->id?>"><?php echo $kategori->nama_kategori?></option>
                        <?php }?>
                        

                        </select>
                        </div>
                        </div>

                         <div class="col-md-3">
                        <div class="form-group">
                        <label> rak  buku</label>
                        <select class="form-control" name ="id_rak" id="rak" value="<?php echo set_value ('nama_rak') ?>" required >
                        <option value="">pilih</option>
                        
                            
                        <option value=""></option>
                      
                        

                        </select>
                        <div id="loading" style="margin-top: 15px;">
                              <img src="<?php echo base_url()?>assets/loading.gif" width="18"> <small>Loading...</small>
                        </div>
                        </div>
                        </div>

                        <div class ="col-md-3">
                        <div class ="form-group">
                        <label> kondisi buku </label>
                        <select class="form-control" name ="kondisi" value="<?php echo set_value ('kondisi') ?>" required >
                        <option value="">pilih</option>
                        <option value="baru">baru</option>
                        <option value="bekas">bekas </option>
                        

                        </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                        <label> jumlah</label>
                        <input type="number"  name="jumlah" class="form-control" value="<?php echo set_value ('jumlah') ?>" placeholder="0" min=0 max="99" required>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg col-md-12" value="save">
                       
                        </div>
                        </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>
             <script>
      $(document).ready(function(){ 

            
            $("#loading").hide();
            
            $("#kategori").change(function(){ 
                  $("#rak").hide(); 
                  $("#loading").show(); 
            
                  var csfrData = {};
                  csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo
                  $this->security->get_csrf_hash(); ?>';
                  $.ajaxSetup({
                  data: csfrData
                  });

                  $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url("i/buku/rak"); ?>", 
                        data:  {id_kategori :  $("#kategori").val()},
                         
                        dataType: "json",
                        beforeSend: function(e) {
                              if(e && e.overrideMimeType) {

                                    e.overrideMimeType("application/json;charset=UTF-8");
                              }
                        },
                        success: function(response){ 
                              $("#loading").hide(); 

                              
                              $("#rak").html(response.list_rak).show();
                        },
                        error: function (xhr, ajaxOptions, thrownError) { 
                              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
                        },

                  });
            });
      });
      </script>