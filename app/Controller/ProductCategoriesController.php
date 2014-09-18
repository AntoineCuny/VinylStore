<?php 

class ProductCategoriesController extends AppController{

	

	function bar(){
		return $this->ProductCategory->find('all');
	}

	function admin_index(){

		$d['productcategories'] = $this->ProductCategory->find('all');
		$this->set($d);

	}

	function admin_edit($id = null){

		if($this->request->is('post') || $this->request->is('put')){
			$this->ProductCategory->save($this->request->data);
			$this->Session->setFlash('La catégorie a bien été créée','notif');
			$this->redirect(array('action' =>'index'));
		
		}elseif($id){
			
			$this->ProductCategory->id = $id;
			$this->request->data = $this->ProductCategory->read();
		}
	}

	function admin_delete($id){

		$this->Session->setFlash('La catégorie a bien été supprimée','notif');
		
		$this->ProductCategory->delete($id);
		$this->redirect($this->referer());


	}
}