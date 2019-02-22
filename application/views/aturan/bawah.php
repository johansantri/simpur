</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small> Copyright © <a href="https://johansantri.blogspot.com/">johan santri</a></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Name : <strong><?=$this->session->userdata('first_name')?> <?=$this->session->userdata('last_name')?></strong> </div>
          
            <div class="modal-body">Email : <strong><?=$this->session->userdata('email')?></strong> </div>
             <div class="modal-body">last login : <strong><?=$this->session->userdata('last_login')?></strong> </div>
             
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           <a class="btn btn-primary " href="<?php echo base_url('welcome/logout')?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
   
    <script src="<?php echo base_url()?>assets/tema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>assets/tema/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!--<script src="<?php echo base_url()?>assets/tema/vendor/chart.js/Chart.min.js"></script>-->
    <script src="<?php echo base_url()?>assets/tema/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>assets/tema/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>assets/tema/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url()?>assets/tema/js/sb-admin-datatables.min.js"></script>
 

  
  </div>
</body>

</html>
