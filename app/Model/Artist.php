<?php 

class Artist extends AppModel{

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
				if(isset($d['Artist']['id'])){
					$d['Artist']['link'] = array(
						'controller'	=> 'products',
						'action'		=> 'artist'
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}



}