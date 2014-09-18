

 <div class="container-fluid">
 	<div class="row">

		<div class="col-md-3 col-md-pull-9" style="background-color:#eee;height:auto; ">
				</br>
				</br>
				<h2>SideBar </h2>
				<?php $categories = $this->requestAction(array('controller'=>'categories','action'=>'sidebar','admin'=>false)); ?>
			<div class="jumbotron">
				<div class="container">
		<ul class="nav nav-pills nav-stacked">
			<?php foreach($categories as $k=>$v): $v = current($v); ?>
		            <li><?php echo $this->Html->link($v['name'].' ('.$v['post_count'].')',$v['link']); ?></li>
		        <?php endforeach ;?>
		        
		</ul>
	</div>
	</div>
		</div>
	</div>
</div>