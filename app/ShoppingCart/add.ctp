<div class="page-header">
	
<h1>Contenu de votre panier :</h1>

<table class="table table-striped"> 
		<tr>
			<th>ID du produit</th>
			<th>Nom</th>
			<th>Prix</th>
			<th>Quantité</th>
			<th>Actions</th>
		</tr>
		<?php foreach($_SESSION['ShoppingCart'] as $k => $v): ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['name']; ?></td>
			<td><?php echo $v['price_ttc']; ?></td>
			<td><?php echo $v['quantity']; ?></td>
			<td><?php echo $this->Html->link("Editer",array('action'=>'edit',$v['id'])); ?> -
			<?php echo $this->Html->link("Supprimer",array('action'=>'delete',$v['id']),null,'voulez vous vraiment supprimer cet article ?'); ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>

<h4>Actions</h4>
<?php

	echo $this->Html->link(
		"Valider le contenu du panier et passer à l'étape suivante",
		array('controller' => 'customers', 'action' => 'delete'),
		array('class'=>'btn btn-primary')
	);

?>