<div class="page-header">
	
<h1>Editer un Album</h1>

</div>



<?php echo $this->Form->create(['Product']); ?>

	<?php echo $this->Form->input('id'); ?>
	
	<?php echo $this->Form->input('name',array('label'=>'Nom')); ?>

	<?php echo $this->Form->input('artist_id',array('label'=>'Nom de l\'artiste')); ?>

	<?php echo $this->Form->input('label_id',array('label'=>'Nom du label')); ?>

<?php echo $this->Form->end('Envoyer'); ?>