<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIMPUR</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>assets/tema/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>assets/tema/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url()?>assets/tema/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>assets/tema/css/sb-admin.css" rel="stylesheet">

   <script src="<?php echo base_url()?>assets/tema/vendor/jquery/jquery.min.js"></script>
     <link href="<?php echo base_url()?>assets/select2/dist/css/jquery-ui.min.css" rel="stylesheet" />
     <script src="<?php echo base_url()?>assets/select2/dist/js/jquery-ui.min.js"></script>
  <link href="<?php echo base_url()?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/select2/dist/js/select2.min.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url()?>">SIMPUR</a>


    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      

           <?php if ($this->session->userdata('first_name')) { ?>
         

      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url()?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>

          </a>
        </li>
       

        



       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="anggota">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplebuku" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Buku</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplebuku">
            <li>
              <a href="<?php echo base_url()?>i/buku">list buku</a>
            </li>
                      
         
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="anggota">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Anggota</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="<?php echo base_url()?>i/anggota">list anggota</a>
            </li>
                      
         
          </ul>
        </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="kategori">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplekategori" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">kategori</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplekategori">
            <li>
              <a href="<?php echo base_url()?>i/kategori">list kategori</a>
            </li>
                      
         
          </ul>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="rak">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplerak" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Rak</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplerak">
            <li>
              <a href="<?php echo base_url()?>i/rak">list Rak</a>
            </li>
           
           
         
          </ul>
        </li>  


           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Transaksi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
           
            <li>
              <a href="<?php echo base_url()?>i/transaksi">List</a>
            </li>            
         
          </ul>
        </li>   
    
      </ul>

       <?php } else {  ?>
         

          
         

      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      
       
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Main</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
             <li>
              <a href="<?php echo base_url()?>welcome/login">Login</a>
            </li>
            <li>
              <a href="<?php echo base_url()?>welcome/Register">Register </a>
            </li>
            <li>
              <a href="<?php echo base_url()?>welcome/forgot">Forgot</a>
            </li>            
         
          </ul>
        </li>

    
      </ul>

   

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
         
          
           
        </li>
      </ul>
    </div>


  <?php } ?>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
         
           <?php if ($this->session->userdata('first_name')) { ?>
                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i><?=$this->session->userdata('first_name')?></a>
                <?php } else {  ?>
                         
                     
                <?php } ?>
           
        </li>
      </ul>
    </div>
<!--MAIN REGISTER-->






















  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url()?>">Dashboard </a>
        
        </li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url('i/'.$isi)?>"><?php echo $title;?> </a>   </li>

      </ol>
        <?php
            $arr = $this->session->flashdata(); 
            if(!empty($arr['flash_message'])){
                $html = '<div class="bg-warning container flash-message">';
                $html .= $arr['flash_message']; 
                $html .= '</div>';
                echo $html;
            }
        ?>

