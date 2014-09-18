
<div class="page-header">
	<h1> <?php echo $page['Post']['name']; ?> </h1>
</div>
<?php echo $page['Post']['content']; ?>

<?php foreach($pages as $k=>$v): $v = current($v); ?>
	<?php echo $this->Html->link($v['name'],$v['link']); ?>
<?php endforeach; ?>