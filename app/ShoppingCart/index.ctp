

<div class="page-header">
	
<h1><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier :</h1>

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

<?php echo $this->Html->link(
		"Retour à la boutique",
		array('controller' => 'products', 'action' => 'index'),
		array('class'=>'btn btn-primary')); ?>


<h4>Actions</h4>
<?php

		echo $this->Form->create(null, array('url'=> array('controller'=>'shoppingCart', 'action'=>'add')));
		echo $this->Form->input('quantity', array('default'=>1));
		echo $this->Form->input('name', array('type'=>'hidden','default'=>$v['Product']['name']));
		echo $this->Form->input('product_id', array('type' => 'hidden','default' => $v['Product']['id']));
		echo $this->Form->input('price', array('type' => 'hidden','default' => $v['Product']['price']));
		echo $this->Form->end("Valider le contenu du panier et passer à l'étape suivante");

		echo $this->Html->link(
		"Valider le contenu du panier et passer à l'étape suivante",
		array('controller' => 'shoppingCarts', 'action' => 'updateCart'),
		array('class'=>'btn btn-primary')
	);

?>
