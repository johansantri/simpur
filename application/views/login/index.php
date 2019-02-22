<div class="col-lg-12 col-lg-offset-12">
    <h2>masukan email dan password</h2>
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'welcome/login/', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'type'=> 'email',
          'placeholder'=>'Email', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
      <?php echo form_error('email') ?>
    </div>
    <div class="form-group">
      <?php echo form_password(array(
          'name'=>'password', 
          'id'=> 'password', 
          'type'=> 'password',
          'placeholder'=>'Password', 
          'class'=>'form-control', 
          'value'=> set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
    <?php echo form_submit(array('value'=>'masuk', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
   
   
</div>