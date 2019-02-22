
                  <?php
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                        
                        //open form
                        echo form_open(base_url('i/rak/add'));
                        ?>
                        <div class="row">
                        <div class ="col-md-6">
                        <div class ="form-group">
                        <label> BUKU </label>
                        <select class="form-control js-example-basic-single" name ="id_kategori" required >
                        <option value=""> pilih kategori</option>
                        <?php foreach ($kategori as $kategori) {?>
                               
                        <option value="<?php echo $kategori->id;?>"> <strong> <?php echo $kategori->nama_kategori ?> </strong></option>
                        <?php } ?>

                        </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label> nama rak</label>
                        <input type="text" name="nama_rak" class="form-control" value="<?php echo set_value ('nama_rak') ?>"  required>
                        </div>
                        </div>
                        
                       <div class="col-md-12">
                        <div class="form-group">
                        <label> catatan</label>
                        <textarea type="text" name="catatan" class="form-control" value=""  required><?php echo set_value ('catatan') ?></textarea>
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
                         <script >
                              
                              // In your Javascript (external .js resource or <script> tag)
                        $(document).ready(function() {
                            $('.js-example-basic-single').select2();
                        });
                        </script>