<?php 

class AlbumsController extends AppController{

	public $name = 'Albums';
	public $useTable = 'albums';
	


	function admin_index(){
		
		$this->loadModel('Label');
		$artists = $this->Label->find('list');
		$this->loadModel('Artist');
		$artists = $this->Artist->find('list');
		$this->loadModel('Album');
		$albums = $this->Album->find('all');
		//$this->set($d);
		$this->set(compact('artists', 'labels','albums'));

	}

	function admin_edit($id = null){

		$this->loadModel('Album');
		if($this->request->is('put') || $this->request->is('post') ){
			if($this->Album->save($this->request->data)){

			$this->Session->setFlash('L\'album a bien été modifié','notif');
			$this->redirect(array('action'=>'index'));

			}
			}elseif($id){
				
				$this->Album->id = $id;
				$this->request->data = $this->Album->read();
			}
			

			$this->loadModel('Artist');
			$artists = $this->Artist->find('list');
			$this->loadModel('Label');
			$labels = $this->Label->find('list');
			$this->set(compact('artists', 'labels'));


	}

	function admin_delete($id){

		$this->loadModel('Album');
		$this->Session->setFlash('Album supprimé','notif');
		
		$this->Album->delete($id);
		$this->redirect($this->referer());


	}
}