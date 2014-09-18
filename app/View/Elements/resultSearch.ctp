
	 

		  <span class="navbar-form navbar-right">
		      <?php echo $this->Form->create('Post',array('id' => 'textBox', 'type' => 'post','url' => array('controller' => 'posts', 'action' => 'resultSearch'))); ?>
		    <?php echo $this->Form->input('search', array('label'=>"",'placeholder'=>'Search...','id'=>'searchbar')); ?>
		      <?php echo $this->Form->end(); ?> 
		 </span>

