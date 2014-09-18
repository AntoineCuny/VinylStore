<?php

App::uses('AppController', 'Controller');

	class ShoppingCartController extends AppController {

		public $uses = array('Product');
		public $name = 'ShoppingCart';

		function index() {
			$d['shoppingCart'] = $this->Session->read('shoppingCart');
			$this->set($d);
			debug($_SESSION);
		}

		/* 
		 * 	Ajout un produit au panier et retourne le nouveau contenu du panier
		 *
		*/
		function add() {
		//debug(count($this->Session->read('ShoppingCart'));
		$i = intval(count($this->Session->read('ShoppingCart'))) + 1;

		if($this->request->is('get')){
			//debug($this->request);
			$product_id = $_GET['product_id'];
			$quantity= 1;
			$product_name = $_GET['name'];
			$price_ht = 0;
			$price_ttc = $_GET['price'];
			$created = '';  
        }

		$this->Session->write('ShoppingCart.Product'.$i.'.id', $product_id);
		$this->Session->write('ShoppingCart.Product'.$i.'.name', $product_name);
		$this->Session->write('ShoppingCart.Product'.$i.'.price_ht', $price_ht);
		$this->Session->write('ShoppingCart.Product'.$i.'.price_ttc', $price_ttc);
		$this->Session->write('ShoppingCart.Product'.$i.'.quantity', $quantity);
		$this->Session->write('ShoppingCart.Product'.$i.'.created', $created);

		$products = $this->Product->find('all',array(
			'conditions' 	=> array('online'=>1),
			'fields'		=> array('id','slug','name')

			));

		$this->Session->setFlash('Le produit a bien été ajouté au panier !','notif');

		return $products;
		}

		/* 
		 * 	Supprime un produit du panier et retourne le nouveau contenu du panier
		 *
		*/
		function delete($id = null,$quantity =null){


		$this->Session->delete('ShoppingCart');
		$this->redirect($this->referer());
		$this->Session->setFlash('L\'artcile a bien été supprimé','notif');

		}


		/**
		* Page administrateur
		**/



		function admin_index(){
 				
			$d['products'] = $this->Product->find('all');
        	

        	$this->set($d); 

		}


	}