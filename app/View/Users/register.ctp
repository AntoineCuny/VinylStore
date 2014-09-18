<div class="page-header"><h1>Inscription</h1></div>
<div class="col-md-6 col-md-offset-3">

<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username',array(
			'label'=>"Login"
		)); 
	echo $this->Form->input('password',array(
			'label'=>"Password"
		));
	echo $this->Form->input('passwordconfirm',array(
			'label'=>"Retype password",
			'type'=>'password'
		)); 
	echo $this->Form->input('email',array(
			'label'=>"E-mail"
		));
	echo $this->Form->input('role',array(
			//'hiddenField' => true,
			'type'=>'hidden',
			'value'=>'membre'
			//'label'=>'Rôle'
		));
	echo $this->Form->end('S\'inscrire');
?>

</div>
