 <?php if($key):
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                           
                        //open form
                        echo form_open(base_url('i/kategori/edit/'.$key->id));
                        ?>
                    
                        <div class="col-md-8">
                        <div class="form-group">
                        <label> nama kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" value="<?php echo $key->nama_kategori ; ?>"  readonly >
                        </div>
                        </div>
                        
                       <div class="col-md-12">
                        <div class="form-group">
                        <label> catatan</label>
                        <textarea type="text" name="catatan" class="form-control" value=""  required ><?php echo $key->catatan ; ?></textarea>
                        </div>
                        </div>
                        
                     

                        <div class="col-md-12">
                        <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg col-md-12" value="save">
                       
                        </div>
                        </div>
                        <?php endif; ?>
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>
