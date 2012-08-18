<h1>Galeria</h1>
<hr>
<?=$this->Form->create('Gallery', array('type' => 'file', 'class' => 'form-horizontal')); ?>
<?=$this->UI->input('Gallery.title', array('label' => __('Tytuł')));?>
<?=$this->UI->input('Gallery.description', array('label' => __('Opis')));?>
<?=$this->UI->input('Gallery.active', array('label' => __('Aktywny'))); ?>

<hr>

<div class="form-actions">
<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
<?=$this->Html->link('Anuluj', 'list'); ?>
</div>

<?=$this->Form->end(); ?>