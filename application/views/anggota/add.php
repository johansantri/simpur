
                  <?php
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                        
                        //open form
                        echo form_open(base_url('i/anggota/add'));
                        ?>
                        <div class="row">
                        <div class="col-md-2">
                        <div class="form-group">
                        <label> NPM / Npp</label>
                        <input type="text" name="npm_npp" class="form-control" value="<?php echo set_value ('npm_npp') ?>" maxlength="10" required>
                        </div>
                        </div>
                        
                       <div class="col-md-4">
                        <div class="form-group">
                        <label> Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" value="<?php echo set_value ('nama_depan') ?>" maxlength="50" required>
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Nama Belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" value="<?php echo set_value ('nama_belakang') ?>" maxlength="50" required>
                        </div>
                        </div>

                         <div class="col-md-2">
                        <div class="form-group">
                        <label> Nomor Hp</label>
                        <input type="text"  name="no_hp" class="form-control" value="<?php echo set_value ('no_hp') ?>" maxlength="13" required>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" value="<?php echo set_value ('fakultas') ?>" maxlength="30"  required>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                        <label> Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="<?php echo set_value ('jurusan') ?>" maxlength="40"  required>
                        </div>
                        </div>

                       

                        <div class ="col-md-4">
                        <div class ="form-group">
                        <label> status </label>
                        <select class="form-control" name ="status" value="<?php echo set_value ('status') ?>" required>
                        <option value="">pilih status</option>
                        <option value="mahasiswa">mahasiswa</option>
                        <option value="karyawan">karyawan </option>
                        <option value="dosen">dosen</option>
                        <option value="alumni">alumni</option>
                    
                        

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
                        
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>
             