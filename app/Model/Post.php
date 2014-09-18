<?php 

class Post extends AppModel{

	public $hasMany = array(
		'Media' => array(
			'dependent' => true
			));

	public $belongsTo = array(
		'Category' => array(
			'counterCache' => array('post_count' => array('Post.online' => 1)))
		);

	public $recursive = -1;

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

	public $order = 'Post.created DESC';


	/**
	* permet de génerer / récuperer un brouillon
	**/

		public function getDraft($type){

			$post = $this->find('first',array(
				'conditions' => array('online' => -1,'type' => $type)));
			if(empty($post)){
				$this->save(array(
					'type' => $type,
					'online' => -1
					),false);
				$post = $this->read();
			}
			$post['Post']['online'] = 0;
			return $post;
		}
	/**
	* Stocke les données de la BDD dans link 
	**/

	public function afterFind($data,$primary = false){

			foreach($data as $k=>$d){
				if(isset($d['Post']['slug']) && isset($d['Post']['id']) && isset($d['Post']['type'])){
					$d['Post']['link'] = array(
						'controller'	=> Inflector::pluralize($d['Post']['type']),
						'action'		=> 'show',
						'id'			=> $d['Post']['id'],
						'slug'			=> $d['Post']['slug']
						);

				}
				$data[$k] = $d;
			}
			return $data;

	}

	public function beforeSave($options = array()){

		if(empty($this->data['Post']['slug']) && isset($this->data['Post']['slug']) && !empty($this->data['Post']['name']))
			$this->data['Post']['slug'] = strtolower(Inflector::slug($this->data['Post']['name'],'-'));
		return true;
	}

}