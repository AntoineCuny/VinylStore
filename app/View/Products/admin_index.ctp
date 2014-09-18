
<div class="page-header">
	
<h1>Gestion des Produits</h1>
</div>

	<p><?php echo $this->Html->link("Ajouter un Produit",array('action'=>'edit'),array('class'=>'btn btn-primary')); ?><p>

<h3> Gestion des Produits </h3>
<table class="table table-striped"> 
		<tr>
			<th>ID</th>
			<th>Nom du Produit</th>
			<th>Album</th>
			<th>Artiste</th>
			<th>Catégorie du Produit</th>
			<th>Online</th>
			<th>Actions</th>
		</tr>
	
		<?php foreach($products as $e=>$c): ?>
		
		<tr>
			<td><?php echo $c['Product']['id']; ?></td>
			<td><?php echo $c['Product']['name']; ?></td>
			<td><?php echo $c['Album']['name']; ?></td>
			<td><?php echo $c['Artist']['name']; ?></td>
			<td><?php echo $c['ProductCategory']['name']; ?></td>
			<td><?php echo $c['Product']['online']=='0'?'<span class="label label-danger">Hors ligne</span>':'<span class="label label-success">En ligne</span>'; ?></td>
			<td><?php echo $this->Html->link("Editer",array('action'=>'edit',$c['Product']['id'])); ?> -
			<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$c['Product']['id']),null,'voulez vous vraiment supprimer cette page ?'); ?>
			</td>
		</tr>
	<?php endforeach ?>

</table>



