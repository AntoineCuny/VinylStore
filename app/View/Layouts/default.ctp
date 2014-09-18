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
    
    <!-- <link rel="alternate" type="application/rss+xml" title="Mon blog" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'feed', 'ext' => 'rss')); ?>" > -->

    <?php echo $this->Html->script('less'); ?> 
    <?php echo $scripts_for_layout; ?>

  </head>

  <body>

    <div class="navbar navbar-inverse " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <?php echo $this->element('connect'); ?>
          <?php echo $this->element('menu'); ?>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>

  </br>
  </br>

     <div class="container-fluid">
      
       <?php echo $this->Session->flash(); ?>
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $content_for_layout; ?>
    </div>

  <!-- <?php echo $this->element('sql_dump') ?> -->
    
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
</html>
