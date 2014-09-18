
<div class="page-header">
	
<h1>Gestion des Utilisateurs</h1>
</div>

<p><?php echo $this->Html->link("Ajouter un Utilisateur",array('action'=>'edit'),array('class'=>'btn btn-primary')); ?><p>


<table class="table table-striped"> 
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>E-mail</th>
			<th>Rôle</th>
			<th>Action</th>
		</tr>
		<?php foreach($users as $k=>$v): $v = current($v); ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['username']; ?></td>
			<td><?php echo $v['email']; ?></td>
			<td><?php echo $v['role']; ?></td>
			<td><?php echo $this->Html->link("Editer",array('action'=>'edit',$v['id'])); ?> -
			<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['id']),null,'Voulez-vous vraiment supprimer cet utilisateur ?'); ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>