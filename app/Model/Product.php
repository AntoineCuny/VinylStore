<?php 

class Product extends AppModel{


	public $order = 'Product.created DESC';

	
	
	public $hasMany = array(
		'Media' => array(
			'className' => 'Media',
			'dependent' => true
			));

	public $belongsTo = array(
		'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'album_id',
        
        ),
        'Artist' => array(
        'className' => 'Artist',
        'foreignKey' => 'artist_id',
 
        ),

        'Label' => array(
        'className' => 'Label',
        'foreignKey' => 'label_id',
 
        ),

        'ProductCategory' => array(
        'className' => 'ProductCategory',
        'foreignKey' => 'product_category_id',

        'counterCache' => array('product_count' => array('Product.online' => 1))
        )
        );


	public $validate = array(
		'slug' => array(
			'rule' 			=> '/^[a-z0-9\-]+$/',
			'allowEmpty'	=> true,
			'message'		=> "L'url n'est pas valide"
			),
		'name' => array(
			'rule'			=> 'notEmpty',
			'message'		=> "Vous devez préciser un titre"
			)

		);


	/**
	* Stocke les données de la BDD dans link 
	**/

	public function afterFind($data,$primary = false){

			foreach($data as $k=>$d){
				if(isset($d['Product']['id']) ){
					$d['Product']['link'] = array(
						'action'		=> 'show',
						'id'			=> $d['Product']['id']//,
					//	'slug'			=> $d['Product']['slug']
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}

	public function beforeSave($options = array()){

		if(empty($this->data['Product']['slug']) && isset($this->data['Product']['slug']) && !empty($this->data['Product']['name']))
			$this->data['Product']['slug'] = strtolower(Inflector::slug($this->data['Product']['name'],'-'));
		return true;
	}

}