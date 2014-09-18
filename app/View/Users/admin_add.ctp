
<div class="page-header">
<h1>Ajouter un utilisateur</h1>
</div>
 
<?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('username',array('label'=>'Login')); ?>
        <?php echo $this->Form->input('password',array('label'=>'Mot de passe')); ?>
    	<?php echo $this->Form->input('passwordconfirm',array('label'=>'Confirmer mot de passe','type'=>'password')); ?>
    	<?php echo $this->Form->input('email',array('label'=>"E-mail")); ?>
        <?php echo $this->Form->input('role',array('label'=>"Role")); ?>
        <?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->end('Envoyer'); ?>