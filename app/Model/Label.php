<?php 

class Label extends AppModel{

	
		
	/**
	* Stocke les données de la BDD dans link 
	**/

	public function afterFind($data,$primary = false){

			foreach($data as $k=>$d){
				if(isset($d['Label']['id'])){
					$d['Label']['link'] = array(
						'controller'	=> 'products',
						'action'		=> 'label'
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}

}