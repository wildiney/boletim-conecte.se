<div id="login-container">
    <?php 
        if(validation_errors()){
            echo "<div class='error'>" . validation_errors() . "</div>";
        } 
    ?>
    <?php echo form_open('login',array('id'=>'form-login', 'role'=>'form', 'class'=>'form-horizontal')); ?>
        <?php echo form_input(array('name'=>'email', 'class'=>'form-control', 'placeholder'=>'E-MAIL')); ?>
        <?php echo form_password(array('name'=>'senha', 'class'=>'col-lg-2 form-control', 'placeholder'=>'SENHA'));?>
        <?php echo form_button(array('name'=>'enviar','type'=>'submit', 'class'=>'btn btn-success'),'enviar'); ?>
    <?php echo form_close(); ?>
</div>