<div class="page-header">
	
<h1>Editer un Label</h1>

</div>



<?php echo $this->Form->create(['Product']); ?>

	<?php echo $this->Form->input('id'); ?>
	
	<?php echo $this->Form->input('name',array('label'=>'Nom du Label')); ?>

<?php echo $this->Form->end('Envoyer'); ?>