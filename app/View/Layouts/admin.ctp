<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?php echo $title_for_layout; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="<?php echo $this->Html->url('/css/bootstrap.less'); ?>"rel="stylesheet/less">
    <?php echo $this->Html->script('less'); ?>
   

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed" role="navigation" style="margin-bottom:20px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Administration</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li><?php echo $this->Html->link("Voir le site",'/'); ?></li>
            <li><?php echo $this->Html->link('se déconnecter',array('controller' => 'users','action' => 'logout', 'admin' => false)); ?></li>

            
          </ul>
          
        </div><!--/.nav-collapse -->
        
      </div>
   </div>

<div class="container">
  <div class="row">

    <div class="col-md-3" style="margin-top:10%; margin-right:3%;">
  <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Gestion des produits <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
                <li><a href="#"><i class="glyphicon glyphicon-music"></i></a> <?php echo $this->Html->link("Produits",array('action'=>'index','controller'=>'products')); ?></li>
                <li><a href="#"><i class="glyphicon glyphicon-edit"></i></a> 
                  <?php echo $this->Html->link("Artistes",array('action'=>'index','controller'=>'artists')); ?></li>
                <li><a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                 <?php echo $this->Html->link("Albums",array('action'=>'index','controller'=>'albums')); ?></li>
                <li><a href="#"><i class="glyphicon glyphicon-edit"></i></a> 
                  <?php echo $this->Html->link("Labels",array('action'=>'index','controller'=>'labels')); ?></li>
                
                <li><a href="#"><i class="glyphicon glyphicon-edit"></i></a> 
                <?php echo $this->Html->link("Categories Produits",array('action'=>'index','controller'=>'productCategories')); ?></li>
                
            </ul>
        </li>
        <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Gestion des articles <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
          <ul class="list-unstyled collapse in" id="userMenu">
              <li><a href="#"><i class="glyphicon glyphicon-book"></i></a> 
                <?php echo $this->Html->link("Articles",array('action'=>'index','controller'=>'posts')); ?></li>
                <li><a href="#"><i class="glyphicon glyphicon-edit"></i></a> 
                <?php echo $this->Html->link("Categories",array('action'=>'index','controller'=>'categories')); ?></li>
          </ul>
        </li>

        <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Gestion des Utilisateur <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
          <ul class="list-unstyled collapse in" id="userMenu">
              <li><a href="#"><i class="glyphicon glyphicon-user"></i></a> 
               <?php echo $this->Html->link("Utilisateurs",array('action'=>'index','controller'=>'users') ); ?></li>
               <li><a href="#"><i class="glyphicon glyphicon-user"></i></a> 
               <?php echo $this->Html->link("Clients",array('action'=>'index','controller'=>'customers') ); ?></li>
          </ul>
        </li>


        <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Gestion des Pages<i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
          <ul class="list-unstyled collapse in" id="userMenu">
              <li><a href="#"><i class="glyphicon glyphicon-plus"></i></a> 
               <?php echo $this->Html->link("Pages",array('action'=>'index','controller'=>'pages')); ?></li>
          </ul>
    </div>
  
 

  </br>
  </br>
    
        <div class="col-md-8">
      <?php echo $this->Session->flash(); ?>
      <?php echo $content_for_layout; ?>
        </div>
       </div>
    </div>

    <!-- <?php echo $this->element('sql_dump') ?> -->
    </body>
     <?php echo $scripts_for_layout; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
</html>
