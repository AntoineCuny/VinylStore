<?php 

class MediasController extends AppController{

		public function beforFilter(){

			parent::beforeFilter();
			$this->layout = 'modal';
		}

		function admin_index($post_id){


		if($this->request->is('post')){ //test si données ont été postées
			$data = $this->request->data['Media'];
			if(isset($date['url'])){
				$this->redirect(array('action'=>'show','?class=&alt=&src='.urlencode($data['url'])));
			}
			$dir = IMAGES.date('Y');
			if(!file_exists($dir)) //si le fichier de l'année n'éxiste pas on le crée
				mkdir($dir,0777);
			$dir .= DS.date('m');
			if(!file_exists($dir)) //si le fichier du mois n'éxiste pas on le crée
				mkdir($dir,0777);
			$f = explode('.', $data['file']['name']); // on met le nom du fichier dans la variable f
			$ext = '.'.end($f); //on récupère l'extention
			$filename = Inflector::slug(implode('.',array_slice($f,0,-1)),'-');

			//Sauvegarde BDD 

			$success = $this->Media->save(array(
				'name'	=> $data['name'],
				'url'	=> date('Y').'/'.date('m').'/'.$filename.$ext,
				'post_id'=> $post_id,
				));
			if($success){
				move_uploaded_file($data['file']['tmp_name'],  $dir.DS.$filename.$ext);

			}else{
				$this->Session->setFlash("L'image n'est pas au bon format","notif",array('type'=>'error'));
			}

		}

		$d['medias'] = $this->Media->find('all',array('conditions' => array('post_id' => $post_id)));
		$this->set($d);

}	

function admin_product($product_id){


		if($this->request->is('post')){ //test si données ont été postées
			$data = $this->request->data['Media'];
			if(isset($date['url'])){
				$this->redirect(array('action'=>'show','?class=&alt=&src='.urlencode($data['url'])));
			}
			$dir = IMAGES.date('Y');
			if(!file_exists($dir)) //si le fichier de l'année n'éxiste pas on le crée
				mkdir($dir,0777);
			$dir .= DS.date('m');
			if(!file_exists($dir)) //si le fichier du mois n'éxiste pas on le crée
				mkdir($dir,0777);
			$f = explode('.', $data['file']['name']); // on met le nom du fichier dans la variable f
			$ext = '.'.end($f); //on récupère l'extention
			$filename = Inflector::slug(implode('.',array_slice($f,0,-1)),'-');

			//Sauvegarde BDD 

			$success = $this->Media->save(array(
				'name'	=> $data['name'],
				'url'	=> date('Y').'/'.date('m').'/'.$filename.$ext,
				'product_id'=> $product_id,
				));
			if($success){
				move_uploaded_file($data['file']['tmp_name'],  $dir.DS.$filename.$ext);

			}else{
				$this->Session->setFlash("L'image n'est pas au bon format","notif",array('type'=>'error'));
			}

		}

		$d['medias'] = $this->Media->find('all',array('conditions' => array('product_id' => $product_id)));
		$this->set($d);

}	

		function admin_delete($id){
			$this->Media->delete($id);
			$this->Session->setFlash("L'image a bien été supprimée",'notif');
			$this->redirect($this->referer());
	}

		function admin_show($id = null){

			$d = array();
			if($this->request->is('post')){
				$this->set($this->request->data['Media']);
				$this->layout = false;
				$this->render('tinymce');
				return;
			}

			if($id){
				$this->Media->id = $id;
				$media = current($this->Media->read());
				$d['src'] = Router::url('/img/'.$media['url']);
				$d['alt'] = $media['name'];
				$d['class'] = 'alignLeft';

			}else{

				$d = $this->request->query;
				$d['src'] = urldecode($d['src']);
			
			}
			$this->set($d);

		}
}