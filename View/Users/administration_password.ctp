<h2>
	Zmiana hasła
 </h2>
<hr>
<?php 
echo $this->Session->flash();
echo $this->Form->create('User', array('class' => 'form-horizontal'));
echo $this->Form->input('id');
echo $this->UI->input('password', array('label' => 'Stare Hasło'));
echo $this->UI->input('password1', array('label' => 'Nowe Hasło'));
echo $this->UI->input('password2', array('label' => 'Powtórz Hasło'));
?>

<div class="form-actions">
<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
<?=$this->Html->link('Anuluj', 'list'); ?>
</div>

<?php echo $this->Form->end();?>