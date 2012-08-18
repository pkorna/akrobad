<h2>
	Elementy menu
	<small>
		<?=$this->Html->link(
			'<i class="icon-white icon-plus"></i> Nowy element</a>', 
			'edit', 
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
	</small>
 </h2>
<hr>

<table class="table table-striped item-list">
	<thead>
		<tr>
			<td><strong>Element</strong></td>
			<td style="width:350px;"><strong>Akcje</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($menuItems as $key => $value){?>
	<tr>
		<td><?php echo $value['MenuItem']['label']; ?>&nbsp;</td>
		<td class="actions">
			<div class="article-actions">
				<div class="btn-group remove-material">
		          <button class="btn btn-danger dropdown-toggle btn-small" data-toggle="dropdown">Usuń <span class="caret"></span></button>
		          <ul class="dropdown-menu">
		            <li><?=$this->Html->link('Tak', 'action/' . $value['MenuItem']['id'] . '/delete', array(), "Czy napewno usunąć element?"); ?></li>
		            <li><?=$this->Html->link('Nie!', '#'); ?></li>
		          </ul>
		        </div>
		         <?php if($value['MenuItem']['active'] == 1){?>
		        		<?=$this->Html->link(
			        	'<i class="icon-eye-open"> </i> Widoczność', 
						'action/' . $value['MenuItem']['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small btn-success', 'title' => 'edytuj')
					); ?>
				<?php }else{ ?>
					<?=$this->Html->link(
			        	'<i class="icon-eye-close"> </i> Widoczność', 
						'action/' . $value['MenuItem']['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
					); ?>
				<?php } ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-arrow-up"> </i>', 
					'order/' . $value['MenuItem']['id'] . '/up', 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'przesuń do góry')
				); ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-arrow-down"> </i>', 
					'order/' . $value['MenuItem']['id'] . '/down', 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'przesuń w dół')
				); ?>
				
				<?php if($value['MenuItem']['editable'] == 1){?>
		        <?=$this->Html->link(
		        	'<i class="icon-pencil"> </i> edytuj', 
					'edit/' . $value['MenuItem']['id'], 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
				); ?>
				<?php } ?>
			</div>	
		</td>
	</tr>    
	<?php if(count($value['ChildMenuItem']) > 0){?>
		<?php foreach($value['ChildMenuItem'] as $key2 => $value2){?>
			<tr>
		<td> -> <?php echo $value2['label']; ?>&nbsp;</td>
		<td class="actions">
			<div class="article-actions">
				<div class="btn-group remove-material">
		          <button class="btn btn-danger dropdown-toggle btn-small" data-toggle="dropdown">Usuń <span class="caret"></span></button>
		          <ul class="dropdown-menu">
		            <li><?=$this->Html->link('Tak', 'action/' . $value2['id'] . '/delete', array(), "Czy napewno usunąć element?"); ?></li>
		            <li><?=$this->Html->link('Nie!', '#'); ?></li>
		          </ul>
		        </div>
		         <?php if($value2['active'] == 1){?>
		        		<?=$this->Html->link(
			        	'<i class="icon-eye-open"> </i> Widoczność', 
						'action/' . $value2['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small btn-success', 'title' => 'edytuj')
					); ?>
				<?php }else{ ?>
					<?=$this->Html->link(
			        	'<i class="icon-eye-close"> </i> Widoczność', 
						'action/' . $value2['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
					); ?>
				<?php } ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-arrow-up"> </i>', 
					'order/' . $value2['id'] . '/up', 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'przesuń do góry')
				); ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-arrow-down"> </i>', 
					'order/' . $value2['id'] . '/down', 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'przesuń w dół')
				); ?>
				
				<?php if($value2['editable'] == 1){?>
		        <?=$this->Html->link(
		        	'<i class="icon-pencil"> </i> edytuj', 
					'edit/' . $value2['id'], 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
				); ?>
				<?php } ?>
			</div>	
		</td>
	</tr> 
		<?php } ?>
	<?php } ?>
    <?php } ?>

	</tbody>
</table>



