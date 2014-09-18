
<div class="page-header">
	
<h1>Gestion des Labels</h1>
</div>

<p><?php echo $this->Html->link("Ajouter un Label",array('action'=>'edit'),array('class'=>'btn btn-primary')); ?><p>

<table class="table table-striped"> 
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
		<?php foreach($labels as $k=>$v): $v = current($v); ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['name']; ?></td>
			
			<td><?php echo $this->Html->link("Editer",array('action'=>'edit',$v['id'])); ?> -
			<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['id']),null,'voulez vous vraiment supprimer cette page ?'); ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>


