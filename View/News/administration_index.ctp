<h2>
	Aktualności
	<small>
		<?=$this->Html->link(
			'<i class="icon-white icon-plus"></i> Nowa aktualność</a>', 
			'edit', 
			array('escape' => false, 'class' => 'btn btn-primary pull-right')
		); ?>
	</small>
 </h2>
<hr>

<table class="table table-striped item-list">
	<thead>
		<tr>
			<td><strong>Tytuł</strong></td>
			<td><strong>Typ</strong></td>
			<td style="width:250px;"><strong>Akcje</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($news as $key => $News){?>
	
	<tr>
		<td><?php echo h($News['News']['title']); ?>&nbsp;</td>
		<td><?php echo h($News['News']['type']); ?>&nbsp;</td>
		<td class="actions">
			<div class="article-actions">
				<div class="btn-group remove-material">
		          <button class="btn btn-danger dropdown-toggle btn-small" data-toggle="dropdown">Usuń <span class="caret"></span></button>
		          <ul class="dropdown-menu">
		            <li><?=$this->Html->link('Tak', 'action/' . $News['News']['id'] . '/delete', array(), "Czy napewno usunąć element?"); ?></li>
		            <li><?=$this->Html->link('Nie!', '#'); ?></li>
		          </ul>
		        </div>
		         <?php if($News['News']['active'] == 1){?>
		        		<?=$this->Html->link(
			        	'<i class="icon-eye-open"> </i> Widoczność', 
						'action/' . $News['News']['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small btn-success', 'title' => 'edytuj')
					); ?>
				<?php }else{ ?>
					<?=$this->Html->link(
			        	'<i class="icon-eye-close"> </i> Widoczność', 
						'action/' . $News['News']['id'] . '/active', 
						array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
					); ?>
				<?php } ?>
				
		        <?=$this->Html->link(
		        	'<i class="icon-pencil"> </i> edytuj', 
					'edit/' . $News['News']['id'], 
					array('escape' => false, 'class' => 'btn btn-small', 'title' => 'edytuj')
				); ?>

			</div>	
		</td>
	</tr>    
    <?php } ?>

	</tbody>
</table>


