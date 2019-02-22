 <?php if($key):
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                           
                        //open form
                        echo form_open(base_url('i/anggota/edit/'.$key->id_anggota));
                        ?>
                        <div class="row">
                        <div class="col-md-2">
                        <div class="form-group">
                        <label> NPM / Npp</label>
                        <input type="text" name="npm_npp" class="form-control" value="<?php echo $key->npm_npp ; ?>"  readonly >
                        </div>
                        </div>
                        
                       <div class="col-md-4">
                        <div class="form-group">
                        <label> Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" value="<?php echo $key->nama_depan ; ?>"  readonly >
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" value="<?php echo $key->nama_belakang ; ?>"  readonly >
                        </div>
                        </div>

                        <div class="col-md-2">
                        <div class="form-group">
                        <label> Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" value="<?php echo $key->fakultas ; ?>"  readonly >
                        </div>
                        </div>
                         </div>

                         <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="<?php echo $key->jurusan ; ?>" readonly >
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Nomor Hp</label>
                        <input type="number"  name="no_hp" class="form-control" value="<?php echo $key->no_hp ; ?>"  readonly >
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Status</label>
                        
                         <select class="form-control" name ="status" value=""  required > 
                         <option value="<?php echo $key->status ; ?>"><?php echo $key->status ; ?></option>
                        <option value="tidak aktif">tidak aktif</option>
                        </select>
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
