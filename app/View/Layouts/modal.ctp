<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?php echo $title_for_layout; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->Html->url('/css/bootstrap.less'); ?>"rel="stylesheet/less">
    <?php echo $this->Html->script('less'); ?>
   

  </head>

  <body>

    <div class="container-fluid">
      <?php echo $this->Session->flash(); ?>
     <?php echo $content_for_layout; ?>

    </div>

    
    </body>
     <?php echo $scripts_for_layout; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
</html>
