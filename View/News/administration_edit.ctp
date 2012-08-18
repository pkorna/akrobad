<h1>Galeria</h1>
<hr>

<?=$this->Form->create('News', array('class' => 'form-horizontal')); ?>
<?php
		echo $this->Form->input('id');
		echo $this->UI->input('title', array('label' => __('Tytuł')));
		echo $this->element('markdown');
		echo $this->UI->input('type', array('label' => __('Typ'), 'options' => array('Akrobatyka' => 'Akrobatyka', 'Badminton' => 'Badminton')));
		echo $this->UI->input('active', array('label' => __('Aktywny')));
	?>

<hr>

<div class="form-actions">
<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
<?=$this->Html->link('Anuluj', 'list'); ?>
</div>

<?=$this->Form->end(); ?>
