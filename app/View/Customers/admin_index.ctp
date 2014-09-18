
<div class="page-header">
	
<h1>Gestion des Clients</h1>
</div>


<table class="table table-striped"> 
		<tr>
			<th>User ID</th>
			<th>Login</th>
			<th>Role</th>
			<th>E-mail</th>
			<th>Créé le</th>
			<th>Actif</th>
			<th>Customer ID</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Adresse</th>
			<th>Adresse2</th>
			<th>Code Postal</th>
			<th>Ville</th>
			<th>Région</th>
			<th>Pays</th>
			<th>Téléphone</th>
			<th>User ID</th>
			<th>Actions</th>
		</tr>
		<?php foreach($customers as $k=>$v): ?>
		<tr>
			<td><?php echo $v['User']['id']; ?></td>
			<td><?php echo $v['User']['username']; ?></td>
			<td><?php echo $v['User']['role']; ?></td>
			<td><?php echo $v['User']['email']; ?></td>
			<td><?php echo $v['User']['created']; ?></td>
			<td><?php echo $v['User']['active']; ?></td>
			<td><?php echo $v['Customer']['id']; ?></td>
			<td><?php echo $v['Customer']['firstname']; ?></td>
			<td><?php echo $v['Customer']['lastname']; ?></td>
			<td><?php echo $v['Customer']['address']; ?></td>
			<td><?php echo $v['Customer']['address2']; ?></td>
			<td><?php echo $v['Customer']['zip_code']; ?></td>
			<td><?php echo $v['Customer']['city']; ?></td>
			<td><?php echo $v['Customer']['state']; ?></td>
			<td><?php echo $v['Customer']['country']; ?></td>
			<td><?php echo $v['Customer']['tel']; ?></td>
			<td><?php echo $v['Customer']['user_id']; ?></td>
			
			<td><?php echo $this->Html->link("Editer",array('action'=>'edit',$v['Customer']['id'])); ?> -
			<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['Customer']['id']),null,'voulez vous vraiment supprimer ce client ?'); ?>
			</td>
		
		</tr>
	<?php endforeach ?>
</table>


<?php //echo $this->Paginator->numbers(); ?>
