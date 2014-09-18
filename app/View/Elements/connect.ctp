<?php
	if(!isset($_SESSION['Auth']['User'])) { // si l'utilisateur n'est pas connecté
?>
<ul class="nav navbar-nav navbar-right">	
       	<li><?php echo $this->Html->link('Connexion',array('controller'=>'users','action'=>'login', 'admin' => false)); ?></li>
		<li><?php echo $this->Html->link('Inscription',array('controller'=>'users','action'=>'register', 'admin' => false)); ?></li>
</ul>

<?php
	}
	else { // si l'utilisateur est connecté
?>
<ul class="nav navbar-nav navbar-right">	
       	<li><?php 	
       	echo $this->Html->link('Mon compte('.$_SESSION['Auth']['User']['username'].')',array('controller' => 'users','action' => 'account', 'admin' => false)); ?></li>
		<li><?php echo $this->Html->link('Déconnexion',array('controller' => 'users','action' => 'logout', 'admin' => false)); ?></li>
</ul>
<?php
	}
?>