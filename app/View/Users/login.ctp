
<div class="page-header">
<h1> Se connecter </h1>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
	
	<?php echo $this->Form->create('User'); ?>
		<?php echo $this->Form->input('username',array('label'=>"Login")); ?>

		<?php echo $this->Form->input('password',array('label'=>"Password")); ?>
			
	<?php echo $this->Form->end('Se connecter'); ?>
	</div>
</div>