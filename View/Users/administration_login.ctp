<div class="users form">
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Proszę podać dane do logowania:'); ?></legend>
    <?php
        echo $this->Form->input('User.username', array('label' => __('Login')));
        echo $this->Form->input('User.password', array('label' => __('Hasło')));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Zaloguj'));?>
</div>