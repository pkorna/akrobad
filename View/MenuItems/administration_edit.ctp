<h1>Element Menu</h1>
<hr>
<?=$this->Form->create('MenuItem', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<?php
		$parentMenuItems[0] = 'Wybierz kategorię nadrzędną';
		ksort($parentMenuItems);
		echo $this->Form->input('id');
		echo $this->UI->input('label', array('label' => __('Podpis')));
		echo $this->UI->input('parent_id', array('options' => $parentMenuItems));
		echo $this->UI->input('key', array('label' => __('Klucz')));
		echo $this->UI->input('active', array('label' => __('Aktywny')));

		echo $this->Form->input('editable', array('type' => 'hidden', 'value' => 1));
	?>

<hr>

<div class="form-actions">
<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
<?=$this->Html->link('Anuluj', 'index'); ?>
</div>

<?=$this->Form->end(); ?>
