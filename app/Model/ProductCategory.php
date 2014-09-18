<?php 

class ProductCategory extends AppModel{

	public $useTable = 'product_categories';
		
	public $hasMany = array(
		'Product' => array(
		'className' => 'Product',
		'dependent' => false
			));	
	
	/**
	* Stocke les données de la BDD dans link 
	**/

	public function afterFind($data,$primary = false){

			foreach($data as $k=>$d){
				if(isset($d['ProductCategory']['slug']) && isset($d['ProductCategory']['id'])){
					$d['ProductCategory']['link'] = array(
						'controller'	=> 'products',
						'action'		=> 'productCategory',
						'slug'			=> $d['ProductCategory']['slug']
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}

	public function beforeSave($options = array()){

		if(empty($this->data['ProductCategory']['slug']) && isset($this->data['ProductCategory']['slug']) && !empty($this->data['ProductCategory']['name']))
			$this->data['ProductCategory']['slug'] = strtolower(Inflector::slug($this->data['ProductCategory']['name'],'-'));
		return true;
	}

}