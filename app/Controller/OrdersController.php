<?php

App::uses('AppController', 'Controller');

	class OrdersController extends AppController {

		public $uses = array('Product');
		public $name = 'Orders';

		function index() {
			$d['shoppingCart'] = $this->Session->read('shoppingCart');
			$this->set($d);
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

		$this->Session->setFlash('Le produit a bien été ajouté au panier !');

		return $products;
		}

		/* 
		 * 	Supprime un produit du panier et retourne le nouveau contenu du panier
		 *
		*/
		function remove($product_id = null,$quantity =null){

		$products = $this->Product->find('all',array(
			'conditions' 	=> array('online'=>1),
			'fields'		=> array('id','slug','name')

			));
		return $products;
		

		}

		/**
		* Transfert le contenu du panier dans la table order_details de la BDD et affiche le formulaire de livraison
		**/
		function updateCart(){

			$d['order'] = $this->Orders->find('all',array(
				'conditions' 	=> array('order_id'=>$order_id),
				'fields'		=> array('id','label','price_ttc', 'quantity', 'delivery_date'
			);
 				
			$d['order_details'] = $this->OrderDetails->find('all',array(
				'conditions' 	=> array('order_id'=>$order_id),
				'fields'		=> array('id','label','price_ttc', 'quantity', 'delivery_date'
			);
        	

        	$this->set($d); 

		}


		/**
		* Page administrateur
		**/



		function admin_index(){
 				
			$d['products'] = $this->Product->find('all');
        	

        	$this->set($d); 

		}


	}