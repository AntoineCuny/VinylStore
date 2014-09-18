

<?php echo $this->element('bar'); ?>

<table class="table table-hover" style="width:auto;"> 
					
						<tr>
							<th style="padding-left: 30px;">Produit</th>
							<th style="padding-left: 30px;">Description</th>
							<th style="padding-left: 30px;">Prix</th>
							<th style="padding-left: 30px;">Ecoute</th>
							<th style="padding-left: 30px;">Stock </th>
							<th style="padding-left: 30px;">Ajout Au panier</th>
						</tr>

						
						<?php foreach($products as $k=>$v):; ?>
						
						
							<tr>
							<td style="padding-left: 30px;">
								<span style="font-weight:bold;"><?php echo $v['Product']['name'];?></span>
								<span style="font-weight:bold;"><?php echo $v['Product']['content']; ?></span>
							</td>
							<td style="padding-left: 30px;">
								<p><span style="font-weight:bold;">Artiste : </span><?php echo $v['Artist']['name'];?></p>
								<p><span style="font-weight:bold;">Album : </span><?php echo $v['Album']['name']; ?></p>
								<p><span style="font-weight:bold;">Label : </span><?php echo $v['Label']['name'];?></p>
								<?php echo $v['Product']['description']; ?>
								<br><span style="font-weight:bold;"> Posté le : </span><?php echo date('d m Y H:i:s',strtotime($v['Product']['created'])); ?>
		
							<td style="padding-left: 30px;"><?php echo $v['Product']['price']; ?>€ </td>
							<td style="padding-left: 30px;"><?php echo $v['Product']['listening']; ?></td>
							<td style="padding-left: 30px;">
							<?php echo $v['Product']['stock']; ?> restant(s)
							</td>
							<td style="padding-left: 30px;">
		
		<?php
			/*
			echo $this->Html->link(
				'Ajouter au panier',
				array('controller' => 'shoppingCart', 'action' => 'add'),
				array('class'=>'btn btn-primary')
			);
			*/
			
			echo $this->Html->link('Ajouter au panier', array(
			    'controller' => 'OrderDetails',
			    'action' => 'add',
				//array('class'=>'btn btn-primary'),
				1,
			    '?' => array('name' => $v['Product']['name'], 'id' => $v['Product']['id'])
			));
			
		?>
	
		</td>
						</tr>

					<?php endforeach ?>
				</table>			
		</div>
		</br>

		
	
	</div>
</div>

