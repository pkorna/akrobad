<div class="news form">
<?php echo $this->Form->create('News');?>
	<fieldset>
		<legend><?php echo __('Add News'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('markdown');
		echo $this->Form->input('type');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index'));?></li>
	</ul>
</div>
