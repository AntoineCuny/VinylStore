
 <?php echo $this->element('brandBarArticle'); ?>

	 <div class="container">
	 	<div class="row">
	 		<div class="col-md-8 col-md-offset-3" >

	 <h1> Blog </h1>

	<?php foreach($posts as $k=>$v): $v = current($v); ?>
		<h2><?php echo $v['name']; ?> </h2>
		<?php echo $this->Text->truncate($v['content'],100,array('exact'=>false,'html'=>true)); ?>
		<a href="<?php echo $this->Html->url($v['link']); ?>" class="btn">lire la suite</a>
		<div class="cb"></div>

	<?php endforeach ?>
	
		</div>	
	</div>


<?php echo $this->Paginator->numbers(); ?>

</div>