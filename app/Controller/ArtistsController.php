<?php 

class ArtistsController extends AppController{


	

	function admin_index(){

		$d['artists'] = $this->Artist->find('all');
		$this->set($d);

	}

	function admin_edit($id = null){

		if($this->request->is('post') || $this->request->is('put')){
			$this->Artist->save($this->request->data);
			$this->Session->setFlash('Artiste créé','notif');
			$this->redirect(array('action' =>'index'));
		
		}elseif($id){
			
			$this->Artist->id = $id;
			$this->request->data = $this->Artist->read();
		}
	}

	function admin_delete($id){

		$this->Session->setFlash('Artiste supprimé','notif');
		
		$this->Artist->delete($id);
		$this->redirect($this->referer());

	}
}