<?php $this->set('title_for_layout',"Me contacter"); ?>


<?php echo $this->Form->create('Contact'); ?>
	<?php echo $this->Form->input('name',array('label' => "Vore Nom")); ?>
	<?php echo $this->Form->input('email',array('label' => "Votre email")); ?>
	<?php echo $this->Form->input('content',array('label' => "Votre message", 'type' => "textarea")); ?>
<?php echo $this->Form->end('Envoyer'); ?>
