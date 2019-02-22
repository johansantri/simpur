<div class="col-lg-12 col-lg-offset-12">
    <h2>lupa password..!</h2>
    <p>silahkan masukan email anda, klik <span style="color:blue">cek</span> hasil sudah kami kirim ke email anda</p>
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'welcome/forgot/', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'placeholder'=>'Email', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
      <?php echo form_error('email') ?>
    </div>
    <?php echo form_submit(array('value'=>'cek', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>    
</div>