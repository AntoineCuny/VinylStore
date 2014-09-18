<?php 

class Media extends AppModel{
	
	public $useTable = 'medias';
	public $validate = array(
		'url' 	=> array(
			'rule' 			=> '/^.*\.(jpg|png|jpeg)$/',
			'allowEmpty'	=> true,
			'message'		=> "Le fichier n'est pas une image valide"
			
		));

	public function beforeDelete($cascade = true){

		$file= $this->field('url');
		unlink(IMAGES.DS.$file);
		$f = explode('.',$file);
		$ext = '.'.end($f);
		$file = implode('.',array_slice($f,0,-1));
		foreach(glob(IMAGES.DS.$file.'_*.jpg') as $v){
			unlink($v);
		}
		
	
		return true;
	}
}