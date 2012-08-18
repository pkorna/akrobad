<h1>Zdjęcie</h1>
<hr>
<?=$this->Form->create('Image', array('type' => 'file', 'class' => 'form-horizontal')); ?>
<?=$this->UI->input('id', array('label' => FALSE));?>
<?=$this->UI->input('description', array('label' => __('Opis')));?>

<hr>

<div class="form-actions">
<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
<?=$this->Html->link('Anuluj', 'list'); ?>
</div>

<?=$this->Form->end(); ?>
