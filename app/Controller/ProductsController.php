<?php

App::uses('AppController', 'Controller');

	class ProductsController extends AppController {

		public $uses = array('Product','Album','Artist','ProductCategory','Label');
		public $helpers = array('Text');
		public $components = array('RequestHandler');
		public $name = 'Products';

		

		function menu(){

		
		$products = $this->Product->find('all',array(
			'conditions' 	=> array('online'=>1),
			'fields'		=> array('id','slug','name')

			));
		return $products;
		}

		function show($id = null,$slug =null){

		if(!$id)
			throw new NotFoundException('Aucune page ne correspond à cette ID');

		$product = $this->Product->find('first');

		if(empty($product))
			throw new NotFoundException('Aucune page ne correspond à cette ID');
		
		if($slug != $product['Product']['slug'])
			$this->redirect($post['Product']['link'],301);
		
		$d['product'] = $product;
		$this->set($d);
		

		}

		function resultSearch(){
	    $search = $this->request->data['Product']['search'];
	    $d['products'] = $this->Product->find('all', array(
	        'conditions' => array(
	        'online'=>'1',
	        "OR"=>array('Product.name LIKE'=>	'%'.$search.'%',
	        	'Product.content LIKE'=>'%'.$search.'%',
	        	'Album.name LIKE'=>	'%'.$search.'%',
	        	'Artist.name LIKE'=>	'%'.$search.'%',
	        	'Label.name LIKE'=>	'%'.$search.'%'
	        	))));
	    $this->set($d);
	    $this->render('index');
 
		}

		function productCategory($productCategory){
		
		$cat = $this->Product->ProductCategory->find('first',array(
			'conditions' => array('slug' => $productCategory)));
		if(empty($cat))
			throw new NotFoundException('Aucune catégorie ne correspond à ce nom');
		$d['products'] = $this->Paginate('Product',array('online'=>1,'product_category_id' => $cat['ProductCategory']['id']));
		$this->set($d);
		$this->render('index');
	}

		function index(){

		$this->paginate = array();
		$this->paginate['order'] = array('Product.name'=>'asc'); 	
		$this->paginate['limit'] = 10; 	
		$d['products'] = $this->Paginate('Product',array('online'=>1));
		$this->set($d);

		}	

		function nouveaute(){

		$this->paginate = array();
		$this->paginate['order'] = array('Product.created'=>'desc'); 	
		$this->paginate['limit'] = 10; 
		$d['products'] = $this->Paginate('Product',array('online'=>1));
		$this->set($d);

		}

		function topvente(){
		
		$this->paginate = array();
		$this->paginate['order'] = array('Product.sells'=>'desc'); 	
		$this->paginate['limit'] = 10; 
		$d['products'] = $this->Paginate('Product',array('online'=>1));
		$this->set($d);

		}

		

	/**
	*	//$posts = $this->Paginate('Post',array('type'=>'product','online'=>1));
	*		$postsList = $this->getTableFindList('Post');
	*		$artists = $this->getTableFindList('Artist');
	*		$albums = $this->getTableFindList('Album');
	*		
	*
	*	$posts = $this->getTableData('Post', array('type'=>'product','online'=>1));
 	*
	*	$products = $this->getTableData('Product',array());
	*	//$this->getTableData('Album');
	*	$this->set(compact('posts', 'products','artists','albums','postsList'));
	**/

	



		/**
		* Page administrateur
		**/



		function admin_index(){
 				
			$d['products'] = $this->Product->find('all');
        	

        	$this->set($d); 

		}

		function admin_product($id = null){

			$this->loadModel('Post');
			if($this->request->is('put') || $this->request->is('post') ){
			if($this->Post->save($this->request->data)){

			$this->Session->setFlash('L\'article a bien été modifié','notif');
			$this->redirect(array('action'=>'index'));

			}
			}elseif($id){
				
				$this->Post->id = $id;
				$this->request->data = $this->Post->read();
			}else{
				$this->request->data = $this->Post->getDraft('post');
			}

			$d['categories'] = $this->Post->Category->find('list');
			$this->set($d);


		}

		function admin_edit($id = null){

		if($this->request->is('put') || $this->request->is('post') ){
		
			if($this->Product->save($this->request->data)){

			$this->Session->setFlash('Le produit a bien été modifié','notif');
			$this->redirect(array('action'=>'index'));

			}
			}elseif($id){
				
				$this->Product->id = $id;
				$this->request->data = $this->Product->read();
			}

			$labels = $this->getTableFindList('Label');
			$artists = $this->getTableFindList('Artist');
			$albums = $this->getTableFindList('Album');
			//$productcategories = $this->Product->ProductCategory->find('list');
			$productCategories = $this->getTableFindList('ProductCategory');
			
			//$d['categories'] = $this->Post->Category->find('list');	

			 $this->set(compact('artists', 'albums','productCategories','labels'));	
			
		}

	}