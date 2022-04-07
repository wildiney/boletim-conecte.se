<div id="login-container">
    <?php 
        if(validation_errors()){
            echo "<div class='error'>" . validation_errors() . "</div>";
        } 
    ?>
    <?php echo form_open('login/recover',array('id'=>'form-recover', 'role'=>'form', 'class'=>'form-horizontal')); ?>
        <?php echo form_input(array('name'=>'email', 'class'=>'form-control', 'placeholder'=>'E-MAIL')); ?>
        <?php echo form_button(array('name'=>'enviar','type'=>'submit', 'class'=>'btn btn-success'),'enviar'); ?>
    <?php echo form_close(); ?>
</div>