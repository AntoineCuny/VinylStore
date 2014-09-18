
<div class="page-header">
	
<h1>Gestion des articles</h1>
</div>

<p><?php echo $this->Html->link("Ajouter un article",array('action'=>'edit'),array('class'=>'btn btn-primary')); ?><p>

<table class="table table-striped"> 
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>En ligne</th>
			<th>Actions</th>
		</tr>
		<?php foreach($posts as $k=>$v): $v = current($v); ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['name']; ?></td>
			<td><?php echo $v['online']=='0'?'<span class="label label-danger">Hors ligne</span>':'<span class="label label-success">En ligne</span>'; ?></td>
			<td><?php echo $this->Html->link("Editer",array('action'=>'edit',$v['id'])); ?> -
			<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['id']),null,'voulez vous vraiment supprimer cette page ?'); ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>


<?php echo $this->Paginator->numbers(); ?>
