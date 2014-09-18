<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CustomersController extends AppController {


    
/**
 * This controller does not use a model
 *
 * @var array
 */
    public $uses = array('User','Customer');

    /**
    * Page administrateur
    **/

    function admin_index(){

        $d['customers'] = $this->User->find('all');
        
        $this->set($d); 

    }

    function admin_add(){

        if($this->request->is('post') || $this->request->is('put') ){
            $d = $this->request->data['Customer'];
            if($d['password'] != $d['passwordconfirm']){
                $this->Session->setFlash("Les mots de passes ne correspondent pas","notif",array('type'=>'error'));
            }else{
                if(empty($d['password']))
                    unset($d['password']);
                if($this->User->save($d)){
                    $this->Session->setFlash("L'utilisateur a bien été enregistré","notif");
                }
            }
        }
        $d = array(); 
        $d['roles'] = array(
            'admin' => 'admin',
            'user'  => 'membre'
        );
        $this->set($d);
    } 


    function admin_edit($id = null){

        if($this->request->is('put') || $this->request->is('post') ){

            $this->User->save($this->request->data);
            $this->Session->setFlash('Le client a bien été modifié','notif');
            $this->redirect(array('action' =>'index'));

            
            }elseif(isset($id)){
                
                $this->User->id = $id;
                $this->request->data = $this->User->read();
            }

            $labels = $this->getTableFindList('Label');  

            $this->set('labels'); 
            
        }

    function admin_delete($id){

        $this->Session->setFlash('Le client a bien été supprimée','notif');
        
        $this->Customer->delete($id);
        $this->redirect($this->referer());


    }
}
