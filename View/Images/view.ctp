<div class="images view">
<h2><?php  echo __('Image');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImageKey'); ?></dt>
		<dd>
			<?php echo h($image['Image']['imageKey']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImageRealName'); ?></dt>
		<dd>
			<?php echo h($image['Image']['imageRealName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($image['Image']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($image['Image']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($image['Image']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($image['Image']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries'), array('controller' => 'galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery'), array('controller' => 'galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Galleries');?></h3>
	<?php if (!empty($image['Gallery'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($image['Gallery'] as $gallery): ?>
		<tr>
			<td><?php echo $gallery['id'];?></td>
			<td><?php echo $gallery['title'];?></td>
			<td><?php echo $gallery['description'];?></td>
			<td><?php echo $gallery['active'];?></td>
			<td><?php echo $gallery['order'];?></td>
			<td><?php echo $gallery['created'];?></td>
			<td><?php echo $gallery['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'galleries', 'action' => 'view', $gallery['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'galleries', 'action' => 'edit', $gallery['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'galleries', 'action' => 'delete', $gallery['id']), null, __('Are you sure you want to delete # %s?', $gallery['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gallery'), array('controller' => 'galleries', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
