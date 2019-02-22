 <!-- buuton delete-->
 <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $buku->id_buku ?>" title ="Delete buku">
                              <i class="fa fa-trash-o"></i>
                            </button>
                            <div class="modal fade" id="myModal<?php echo $buku->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                       
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus data buku ini
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default " data-dismiss="modal"><i class =" fa fa-rotate-left"></i></button>
                                            <a href ="<?php echo base_url('i/buku/hapus/'.$buku->id_buku) ?>" class="btn btn-danger"><i class =" fa fa-trash-o"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>