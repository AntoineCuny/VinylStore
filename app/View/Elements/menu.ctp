<?php $pages = $this->requestAction(array('controller'=>'pages','action'=>'menu','admin'=>false)); ?>

<ul class="nav navbar-nav navbar-right">
	<?php foreach($pages as $k=>$v): $v = current($v); ?>
            <li><?php echo $this->Html->link($v['name'],$v['link']); ?></li>

        <?php endforeach ;?>
        <li><?php echo $this->Html->link('News',array('controller'=>'posts','action'=>'index')); ?></li>
        <li><?php echo $this->Html->link('Produits',array('controller'=>'products','action'=>'index')); ?></li>

</ul>