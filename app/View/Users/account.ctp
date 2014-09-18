<div class="page-header"><h1>Mon compte</h1></div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">

				<h4>Informations du compte utilisateur</h4>
				<p>
					<?php
						echo 'Login : '.$account['User']['username'].'<br />';
						echo 'E-mail : '.$account['User']['email'].'<br />';
						echo 'Role : '.$account['User']['role'].'<br /><br />'; 
					?>
				</p>
				
				<?php  if(isset($account['Customer']['id']) && ($account['Customer']['tel']) != '') { ?>
				<h4>Informations du compte client</h4>
				<p>
					<?php
						echo 'Prenom : '.$account['Customer']['firstname'].'<br />';
						echo 'Nom : '.$account['Customer']['lastname'].'<br />';
						echo 'Adresse 1 : '.$account['Customer']['address'].'<br />';
						echo 'Adresse 2 : '.$account['Customer']['address2'].'<br />'; 
						echo 'Code Postal : '.$account['Customer']['zip_code'].'<br />';
						echo 'Ville : '.$account['Customer']['city'].'<br />';
						echo 'Region : '.$account['Customer']['state'].'<br />';
						echo 'Pays : '.$account['Customer']['country'].'<br />';
						echo 'Telephone : '.$account['Customer']['tel'].'<br /><br />';
					?>
				</p>
				<?php } ?>

				<h4>Actions supplémentaires</h4>
					<?php
						echo $this->Html->link(
    						'Supprimer mon compte client',
    						array('controller' => 'customers', 'action' => 'delete'/*, 6*/),
    						array('class'=>'btn btn-primary'),
    						"Etes-vous sur de vouloir supprimer votre compte client ?"
						);
						echo $this->Html->link(
    						'Supprimer mon compte utilisateur',
    						array('controller' => 'users', 'action' => 'delete'/*, 6*/),
    						array('class'=>'btn btn-primary'),
    						"Etes-vous sur de vouloir supprimer votre compte ?"
						);
						//echo $this->Html->link("Supprimer mon compte client", array('action'=>'delete',array('class'=>'btn btn-primary')));
						//echo $this->Html->link("Supprimer mon compte",array('controller'=>'users','action'=>'delete',array('class'=>'btn btn-primary')));
					?>
		</p>
	</div>
</div>