<h2>
	Galerie zdjęć
	<small>
		<?=$this->Html->link(
			'<i class="icon-white icon-plus"></i> Nowa galeria</a>', 
			'edit', 
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
	</small>
 </h2>
<hr>

<table class="table table-striped item-list">
	<thead>
		<tr>
			<td><strong>Id</strong></td>
			<td><strong>Tytuł</strong></td>
			<td style="width:450px;"><strong>Akcje</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($galleries as $key => $gallery){?>
	
	<tr>
		<td><?php echo h($gallery['Gallery']['id']); ?>&nbsp;</td>
		<td><?php echo h($gallery['Gallery']['title']); ?>&nbsp;</td>
		<td class="actions">
			<div class="article-actions">
				<div class="btn-group remove-material">
		          <button class="btn btn-danger dropdown-toggle btn-small" data-toggle="dropdown">Usuń <span class="caret"></span></button>
		          <ul class="dropdown-menu">
		            <li><?=$this->Html->link('Tak', 'action/' . $gallery['Gallery']['id'] . '/delete', array(), "Czy napewno usunąć element?"); ?></li>
		            <li><?=$this->Html->link('Nie!', '#'); ?></li>
		          </ul>
		        </div>
		         <?php if($gallery['Gallery']['active'] == 1){?>
		        		<?=$this->Html->link(
			        	'<i class="icon-eye-open"> </i> Widoczność', 
						'action/' . $gallery['Gallery']['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small btn-success', 'title' => 'edytuj')
					); ?>
				<?php }else{ ?>
					<?=$this->Html->link(
			        	'<i class="icon-eye-close"> </i> Widoczność', 
						'action/' . $gallery['Gallery']['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
					); ?>
				<?php } ?>
				
		        <?=$this->Html->link(
		        	'<i class="icon-pencil"> </i> edytuj', 
					'edit/' . $gallery['Gallery']['id'], 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
				); ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-arrow-up"> </i>', 
					'order/' . $gallery['Gallery']['id'] . '/up', 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'przesuń do góry')
				); ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-arrow-down"> </i>', 
					'order/' . $gallery['Gallery']['id'] . '/down', 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'przesuń w dół')
				); ?>
				
				<?=$this->Html->link(
		        	'<i class="icon-download"> </i> Zdjęcia galerii', 
					'images/' . $gallery['Gallery']['id'], 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'zdjęcia')
				); ?>

			</div>	
		</td>
	</tr>    
    <?php } ?>

	</tbody>
</table>

