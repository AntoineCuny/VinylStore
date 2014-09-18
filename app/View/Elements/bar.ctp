
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"> <?php echo $this->Html->link("All",array('action'=>'index'),array('class'=>'navbar-brand')); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php $productCategories = $this->requestAction(array('controller'=>'productCategories','action'=>'bar','admin'=>false)); ?>
        <?php foreach($productCategories as $k=>$v): $v = current($v); ?>
                <li><?php echo $this->Html->link($v['name'].' ('.$v['product_count'].')',$v['link']); ?></li>
            <?php endforeach ;?>
        
        
      </ul>
      <span class="navbar-form navbar-left" >
       
          <?php echo $this->Form->create('Product',array('id' => 'textBox','url' => array('controller' => 'products', 'action' => 'resultSearch'))); ?>
        <?php echo $this->Form->input('search', array('label'=>"",'placeholder'=>'Search...','id'=>'searchbar')); ?>
          <?php echo $this->Form->end(); ?> 
      </span>
      <ul class="nav navbar-nav navbar-right">
        <li> <?php echo $this->Html->link('<span class="glyphicon glyphicon-heart"> Top ventes',array('action'=>'topvente'), array('escape' => false)); ?></li>
       <li> <?php echo $this->Html->link('<span class="glyphicon glyphicon-star"> Nouveautés',array('action'=>'nouveaute'), array('escape' => false)); ?></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

