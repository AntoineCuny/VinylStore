<?php

App::uses('AppController', 'Controller');

class OrderDetailsController extends AppController {

	public $name = 'OrderDetails';
	public $uses = array('Product', 'OrderDetails');

	function index() {
		$d['shoppingCart'] = $this->OrderDetails->find('all');
		$this->set($d);
	}

	function add() {
		//debug(count($this->Session->read('ShoppingCart'));
		$getName = h($_GET['name']);
		$getId = h($_GET['id']);

		if(isset($_GET['name']) && isset($_GET['id']) && $_GET['name'] != '' && $_GET['id'] != '') {
			$productInfo = $this->Product->find('first', array('conditions' => array('Product.id' => $getId), 'fields' => array('Product.id', 'Product.name', 'Product.price', 'Product.price_promo', 'Album.name', 'Artist.name', 'ProductCategory.name'
				)));
			//debug($productInfo);
			if ($productInfo['Product']['name'] == $getName) {

				
				$label = $productInfo['Product']['name'];
				if(isset($productInfo['Product']['price_promo'])&&$productInfo['Product']['price_promo']!=0) {
					$price = $productInfo['Product']['price_promo'];
				} else $price = $productInfo['Product']['price'];
				$quantity = 1 ; // !
				$delivery_date = '2014-02-16 17:17:17';
				$product_id = $productInfo['Product']['id'];
				$order_id = 90000 ;//+ $productInfo['customer_id']; // 90 000 + customer_id
				$price_ht = 0;


				$data = array(
				    'OrderDetails' => array(
				        'label' => $label,
				        'price_ttc' => $price,
				        'price_ht' => $price_ht,
				        'quantity' => $quantity,
				        'delivery_date' => $delivery_date,
				        'product_id' => $product_id,
				        'order_id' => $order_id
				    )
				);
				// prepare the model for adding a new entry
				$this->OrderDetails->create();
				// save the data
				$this->OrderDetails->save($data);

				$this->set($productInfo);
				
			} else {
				echo 'Les données du produit à ajouter au panier ne sont pas valides.';
			}
		}	
		else {
			echo 'Les données du produit à ajouter au panier ne sont pas valides.';
		}
	}
}