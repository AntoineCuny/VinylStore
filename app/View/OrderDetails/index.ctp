<?php echo $this->element('bar'); ?>

<table class="table table-hover" style="width:auto;"> 
	<?php echo $this->Form->create(['Shopping']); ?>
	<tr>
		<th style="padding-left: 60px;">Produit</th>
		<th style="padding-left: 60px;">Artiste</th>
		<th style="padding-left: 60px;">Album</th>
		<th style="padding-left: 60px;">Label</th>
		<th style="padding-left: 60px;">Prix</th>
		<th style="padding-left: 60px;">Publication</th>
		<th style="padding-left: 60px;">Ajout Au panier</th>
	</tr>
	<?php foreach($products as $k=>$v):; ?>

	<tr>
		<td style="padding-left: 40px;">
			Produit : <?php echo $v['Product']['name'];?>
			<?php echo $v['Product']['content']; ?>
		</td>
		<td style="padding-left: 60px;">Artiste : <?php echo $v['Artist']['name'];?>
		<td style="padding-left: 60px;"><?php echo $v['Album']['name']; ?></td>
		<td style="padding-left: 60px;"></td>
		<td style="padding-left: 60px;"><?php echo $v['Product']['price']; ?></td>
		<td style="padding-left: 60px;"><?php echo date('d m Y H:i:s',strtotime($v['Product']['created'])); ?></td>
		<td style="padding-left: 60px;">
		
		<?php
			/*
			echo $this->Html->link(
				'Ajouter au panier',
				array('controller' => 'shoppingCart', 'action' => 'add'),
				array('class'=>'btn btn-primary')
			);
			*/
			/*
			echo $this->Html->link('Ajouter au panier', array(
			    'controller' => 'shoppingCart',
			    'action' => 'add',
			    1,
			    '?' => array('name' => $v['Product']['name'], 'product_id' => $v['Product']['id'], 'price'=>$v['Product']['price'])),
				array('class'=>'btn btn-primary')
			);
			*/
			
		?>
		
		
		<?php 
			
			//echo 'product name : '.$v['Product']['name'].'/';
			//echo 'product id : '.$v['Product']['id'].'/';
			//echo 'product price : '.$v['Product']['price'];
			echo $this->Form->create(null, array('url'=> array('controller'=>'OrderDetails', 'action'=>'add')));
				echo $this->Form->input('quantity', array('default'=>1));
		 		echo $this->Form->input('name', array('type'=>'hidden','default'=>$v['Product']['name']));
				echo $this->Form->input('product_id', array('type' => 'hidden','default' => $v['Product']['id']));
				echo $this->Form->input('price', array('type' => 'hidden','default' => $v['Product']['price']));
			echo $this->Form->end('Ajouter');
			
		?>
	
		
		</td>
	</tr>



	<?php endforeach; ?>
</table>
</div>
</br>



</div>
</div>