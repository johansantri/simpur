 <?php if($key):
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                           
                        //open form
                        echo form_open(base_url('i/buku/edit/'.$key->id_buku));
                        ?>
                        <div class="row">
                        <div class="col-md-2">
                        <div class="form-group">
                        <label> kode buku</label>
                        <input type="text" name="kode_buku" class="form-control" value="<?php echo $key->kode_buku ; ?>" maxlength="20" readonly >
                        </div>
                        </div>

                        <div class="col-md-10">
                        <div class="form-group">
                        <label> judul buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?php echo $key->judul_buku ; ?>"  required >
                        </div>
                        </div>
                        </div>

                        <div class="row">
                         <div class="col-md-4">
                        <div class="form-group">
                        <label> pengarang</label>
                        <input type="text" name="pengarang" class="form-control" value="<?php echo $key->pengarang ; ?>" maxlength="50" readonly >
                        </div>
                        </div>

                         <div class="col-md-4">
                        <div class="form-group">
                        <label> penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="<?php echo $key->penerbit ; ?>" maxlength="50" readonly >
                        </div>
                        </div>

                         <div class="col-md-1">
                        <div class="form-group">
                        <label> tahun </label>
                        <input type="text" name="tahun" class="form-control" value="<?php echo $key->tahun ; ?>" maxlength="4" required >
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label>asal buku</label>
                        <input type="text" name="asal_buku" class="form-control" value="<?php echo $key->asal_buku ; ?>" maxlength="100" required >
                        </div>
                        </div>
                          </div>
                        
                       <div class="row">

                        <div class="col-md-3">
                        <div class="form-group">
                        <label> kategori</label>                        
                         <select class="form-control" name ="id_kategori" value="<?php echo $key->id_kategori; ?>"  readonly > 
                         <option value="<?php echo $key->id_kategori; ?>"><?php echo $key->nama_kategori; ?></option> 
                                       
                        </select>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label> rak  buku</label>
                        <select class="form-control" name ="id_rak" id="rak" value="<?php echo $key->id_rak; ?>" readonly >
                        
                         <option value="<?php echo $key->id_rak; ?>"><?php echo $key->nama_rak; ?></option>                    
                            
                       
                      
                        

                        </select>
                        
                        </div>
                        </div>

                         <div class ="col-md-3">
                        <div class ="form-group">
                        <label> kondisi buku </label>
                        <select class="form-control" name ="kondisi" value="#" required >
                        <option value="<?php echo $key->kondisi; ?>"><?php echo $key->kondisi; ?></option>
                        <option value="baru">baru</option>
                        <option value="bekas">bekas </option>
                        </select>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label> jumlah</label>
                        <input type="number"  name="jumlah" class="form-control" value="<?php echo $key->jumlah; ?>" placeholder="0" min=0 max="99" required>
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
                        <?php endif; ?>
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>

                     