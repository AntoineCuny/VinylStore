<?php $this->set('title_for_layout',$post['Post']['name']); ?>

<?php echo $this->element('brandBarArticle'); ?>
<div class="container-fluid">
	<div class="row">
		
		 <div class="col-md-9 col-md-push-3">
			<div class="page-header">
				<h1><?php echo $post['Post']['name']; ?> <small><?php echo $post['Category']['name']; ?></small></h1>
			</div>
		
			<?php echo $post['Post']['content']; ?>

			<p> Publié <?php echo date('d m Y H:i:s',strtotime($post['Post']['created'])); ?> </p>
			
		</div>
		</br>
		
	
	</div>
</div>

