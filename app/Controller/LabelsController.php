<?php 

class LabelsController extends AppController{


	function admin_index(){

		$d['labels'] = $this->Label->find('all');
		$this->set($d);

	}

	function admin_edit($id = null){

		if($this->request->is('post') || $this->request->is('put')){
			$this->Label->save($this->request->data);
			$this->Session->setFlash('Le Label a bien été créé','notif');
			$this->redirect(array('action' =>'index'));
		
		}elseif($id){
			
			$this->Label->id = $id;
			$this->request->data = $this->Label->read();
		}
	}

	function admin_delete($id){

		$this->Session->setFlash('Le Label a bien été supprimé','notif');
		
		$this->Label->delete($id);
		$this->redirect($this->referer());

	}
}