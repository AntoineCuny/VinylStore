<?php 

class Album extends AppModel{

	public $hasMany = array(
		'Product' => array(
            'className' => 'Product',
            'dependent' => false
        ));

	public $belongsTo = array(
        'Artist' => array(
            'className' => 'Artist',
            'foreignKey' => 'artist_id'
        ),
        'Label' => array(
        	'className' => 'Label',
        	'foreignKey' => 'label_id')
        );

	/**
	* Stocke les données de la BDD dans link 
	**/

	public function afterFind($data,$primary = false){

			foreach($data as $k=>$d){
				if(isset($d['Album']['id'])){
					$d['Album']['link'] = array(
						'controller'	=> 'albums',
						'action'		=> 'album'
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}



}