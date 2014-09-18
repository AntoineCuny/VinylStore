<div class="page-header">
	
<h1>Editer un Client</h1>


<div class="form-group">
<?php echo $this->Form->create(['Customer']); ?>

	<?php echo $this->Form->input('id'); ?>

	<?php echo $this->Form->input('firstname',array('label'=>'Nom')); ?>

	<?php echo $this->Form->input('lastname',array('label'=>"prenom")); ?>

	<?php echo $this->Form->input('address',array('label'=>"Adresse")); ?>

	<?php echo $this->Form->input('address2',array('label'=>"Deuxième adresse")); ?>

	<?php echo $this->Form->input('zip_code',array('label'=>"Code postale")); ?>

	<?php echo $this->Form->input('city',array('label'=>"Ville")); ?>

	<?php echo $this->Form->input('state',array('label'=>"Etat")); ?>

	<?php echo $this->Form->input('country',array('label'=>"Pays")); ?>

	<?php echo $this->Form->input('tel',array('label'=>"Téléphone")); ?>

	<?php echo $this->Form->input('user_id',array('label'=>"Prix promotion")); ?>

<?php echo $this->Form->end('Envoyer'); ?>

</div>
