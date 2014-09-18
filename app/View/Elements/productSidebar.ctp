<div class="container">
  <div class="row">
    <div class="col-md-3">
  <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Categories <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
               <?php foreach($categories as $k=>$v): $v = current($v); ?>
                <li><a href="#"><i class="glyphicon glyphicon-music"></i></a> 
                  <?php echo $this->Html->link($v['name'].' ('.$v['product_count'].')',$v['link']); ?></li></li>
                <endforeach>
            </ul>

        </li>
    </div>
  </div>
 </div>