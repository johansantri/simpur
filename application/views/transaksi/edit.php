            
                         <script >
                               // Set default datepicker options     
                        $.datepicker.setDefaults({
                            changeMonth: true,
                            changeYear: true,
                            dateFormat: 'yy-mm-dd',
                            defaultDate: +2,
                            minDate: 0,
                            maxDate: '+2y',
                            numberOfMonths: 2,
                            showAnim: 'fadeIn',
                            showButtonPanel: true
                        });

                        function splitDepartureDate(dateText) {
                            var depSplit = dateText.split("-", 3);
                            $('#alt-tgl_kembali-d').val(depSplit[0]);
                            $('#alt-tgl_kembali-m').val(depSplit[1]);
                            $('#alt-tgl_kembali-y').val(depSplit[2]);
                        }


                        // Set arrival datepicker options       
                        $(function() {
                            $('#tgl_pinjam').datepicker({
                                onSelect: function(dateText, instance) {

                                    // Split arrival date in 3 input fields                        
                                    var arrSplit = dateText.split("-");
                                    $('#alt-tgl_pinjam-d').val(arrSplit[0]);
                                    $('#alt-tgl_pinjam-m').val(arrSplit[1]);
                                    $('#alt-tgl_pinjam-y').val(arrSplit[2]);

                                    // Populate departure date field 
                                    var nextDayDate = $('#tgl_pinjam').datepicker('getDate', '+3d');
                                    nextDayDate.setDate(nextDayDate.getDate() + 3);
                                    $('#tgl_kembali').datepicker('setDate', nextDayDate);
                                    splitDepartureDate($("#tgl_kembali").val());
                                },
                                onClose: function() {
                                    $("#tgl_kembali").datepicker("show");
                                }
                            });
                        });


                        // Set departure datepicker options        
                        $(function() {
                            $('#tgl_kembali').datepicker({

                                // Prevent selecting departure date before arrival:
                                beforeShow: customRange,
                                onSelect: splitDepartureDate
                            });
                        });


                        // Prevent selecting departure date before arrival


                        function customRange(a) {
                            var b = new Date();
                            var c = new Date(b.getFullYear(), b.getMonth(), b.getDate());
                            if (a.id == 'tgl_kembali') {
                                if ($('#tgl_pinjam').datepicker('getDate') != null) {
                                    c = $('#tgl_pinjam').datepicker('getDate');
                                }
                            }
                            return {
                                minDate: c
                            }
                        }



                        // CREATE REQUEST URL   
                        $('#fbooking').submit(function() {
                            var baseURL = $('#fbooking').attr("action");
                            var checkAvl = $(this).serialize();
                            alert(baseURL + checkAvl)
                            return false;
                        });
                         </script>

                        <?php if($tran):
                        //validasi input
                        echo validation_errors ('<div class="alert alert-warning">','</div>');
                           
                        //open form
                        echo form_open(base_url('i/transaksi/edit/'.$tran->id));
                        ?>
                         <div class="row">
                        <div class="col-md-2">
                             
                        <div class="form-group">
                        <label> NPM / NPP</label>
                        <input type="text" name="npm_npp" class="form-control" value="<?php echo $tran->npm_npp ; ?>"  readonly disabled >
                        </div>
                        </div>
                        
                       <div class="col-md-4">
                        <div class="form-group">
                        <label> NAMA </label>
                        <input type="text" name="nama_depan" class="form-control" value="<?php echo $tran->nama_depan ; ?> <?php echo $tran->nama_belakang ; ?>"   readonly disabled >
                        </div>
                        </div>

                           <div class="col-md-3">
                        <div class="form-group">
                        <label> Tanggal Pinjam </label>
                        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?php echo set_value ('tgl_pinjam') ?>" placeholder="YYYY-MM-DD"  required >
                        </div>
                        </div>

                          <div class="col-md-3">
                        <div class="form-group">
                        <label> Tanggal Kembali </label>
                        <input type="text" name="tgl_kembali" class="form-control" value="<?php echo set_value ('tgl_kembali') ?>" id="tgl_kembali" placeholder="YYYY-MM-DD"  required >
                        </div>
                        </div>

                         </div>

                         <div class ="row ">
                        <div class ="col-md-8">
                        <div class ="form-group">
                        <label> BUKU </label>
                        <select class="form-control js-example-basic-single" name ="id_buku" >
                        <option value=""> pilih buku</option>
                        <?php foreach ($buku as $buku) {?>
                               
                        <option value="<?php echo $buku->id;?>"><?php echo $buku->kode_buku ?> <strong> <?php echo $buku->judul_buku ?> </strong></option>
                        <?php } ?>

                        </select>
                        </div>
                        </div>

                         <div class ="col-md-4">
                        <div class ="form-group">
                        <label> STATUS TRANSAKSI </label>
                        <select class="form-control js-example-basic-single" name ="status_transaksi" >
                         <option value=""> Pilih status</option>
                               
                        <option value="pinjam"> pinjam</option>
                        <option value="kembali"> kembali</option>
                        <option value="hilang"> hilang</option>
                        <option value="rusak"> rusak</option>
                        

                        </select>
                        </div>
                        </div>

                        </div>
                         
                       
                       

                        <div class="row col-md-12">
                        <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg col-md-12" value="save">
                      
                        </div>
                        </div>
                        <?php endif; ?>
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>

                     

                        <script >
                              
                              // In your Javascript (external .js resource or <script> tag)
                        $(document).ready(function() {
                            $('.js-example-basic-single').select2();
                        });
                        </script>

                       