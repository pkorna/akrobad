<div class="menuItems view">
<h2><?php  echo __('Menu Item');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Menu Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($menuItem['ParentMenuItem']['id'], array('controller' => 'menu_items', 'action' => 'view', $menuItem['ParentMenuItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Klucz'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['klucz']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Editable'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['editable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu Item'), array('action' => 'edit', $menuItem['MenuItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu Item'), array('action' => 'delete', $menuItem['MenuItem']['id']), null, __('Are you sure you want to delete # %s?', $menuItem['MenuItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('controller' => 'menu_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Menu Item'), array('controller' => 'menu_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Menu Items');?></h3>
	<?php if (!empty($menuItem['ChildMenuItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Label'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Klucz'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th><?php echo __('Editable'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($menuItem['ChildMenuItem'] as $childMenuItem): ?>
		<tr>
			<td><?php echo $childMenuItem['id'];?></td>
			<td><?php echo $childMenuItem['label'];?></td>
			<td><?php echo $childMenuItem['parent_id'];?></td>
			<td><?php echo $childMenuItem['controller'];?></td>
			<td><?php echo $childMenuItem['action'];?></td>
			<td><?php echo $childMenuItem['klucz'];?></td>
			<td><?php echo $childMenuItem['active'];?></td>
			<td><?php echo $childMenuItem['order'];?></td>
			<td><?php echo $childMenuItem['editable'];?></td>
			<td><?php echo $childMenuItem['created'];?></td>
			<td><?php echo $childMenuItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'menu_items', 'action' => 'view', $childMenuItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'menu_items', 'action' => 'edit', $childMenuItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menu_items', 'action' => 'delete', $childMenuItem['id']), null, __('Are you sure you want to delete # %s?', $childMenuItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Menu Item'), array('controller' => 'menu_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
