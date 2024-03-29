<?php 

class Category extends AppModel{

	
		
	/**
	* Stocke les données de la BDD dans link 
	**/

	public function afterFind($data,$primary = false){

			foreach($data as $k=>$d){
				if(isset($d['Category']['slug']) && isset($d['Category']['id'])){
					$d['Category']['link'] = array(
						'controller'	=> 'posts',
						'action'		=> 'category',
						'slug'			=> $d['Category']['slug']
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}

	public function beforeSave($options = array()){

		if(empty($this->data['Category']['slug']) && isset($this->data['Category']['slug']) && !empty($this->data['Category']['name']))
			$this->data['Category']['slug'] = strtolower(Inflector::slug($this->data['Category']['name'],'-'));
		return true;
	}

}