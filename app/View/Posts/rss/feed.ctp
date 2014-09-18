<?php

$this->set('channelData', array(
    'title' => 'Les derniers articles',
    'link' => $this->Html->url('controller' => 'posts', 'action' => 'index', true),
    'description' => 'Mon premier flux RSS',
    'language' => 'fr-fr')
);

foreach ($posts as $v=>$v) { 

	$post = current($v);
	  
     echo  $this->Rss->item(array(), array(
        'title' => $post['name'],
        'link' => $this->Html->url($post['link'],true),
        'guid' => array('url' => $this->Html->url($post['link'],true), 'isPermaLink' => 'true'),
        'description' => $post['content'],
        'pubDate' => $post['created']
    ));
 }
