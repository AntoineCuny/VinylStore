<?php

class UsersController extends AppController{

    function admin_index(){
        $d['users'] = $this->User->find('all');
        $this->set($d);
    }


    function login(){
        if(!$this->Auth->loggedIn()){
            if($this->request->is('post')){
                if($this->Auth->login()){
                    $this->Session->setFlash("Vous êtes désormais connecté","notif",
                        array('type' => 'error'),'auth');
                    return $this->redirect($this->Auth->redirect());
                }else{
                    $this->Session->setFlash("Votre login ou votre mot de passe ne correspond pas","notif",
                        array('type' => 'error'),'auth');
                }
            }
        }
        else {
            $this->Session->setFlash("Vous êtes déjà authentifié !","notif");
        }
    }

    function logout(){
        $this->Auth->logout();
        $this->Session->setFlash("Vous êtes maintenant déconnecté","notif");
        $this->redirect('/');
    }


    function account() {
        
        $id = $_SESSION['Auth']['User']['id'];


        $d['account'] = $this->User->find('first',array(
            'conditions' => array('User.id'=>$id),
            ));
        
        $this->set($d);
        
    }

    function register() {
        if(!$this->Auth->loggedIn()){
            if($this->request->is('post') || $this->request->is('put')){
                $d = $this->request->data['User'];
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
                'user'  => 'membre'
            );
            $this->set($d); 
        }  
        else {
            $this->Session->setFlash("Vous êtes déjà authentifié !","notif");
        }
    }

    function delete() {
        $this->User->delete();
        $this->Session->setFlash("Votre compte a bien été supprimé","notif");
        $this->redirect($this->referer());
          
    }



    function admin_delete($id){
        $this->User->delete($id);
        $this->Session->setFlash("L'utilisateur a bien été supprimé","notif");
        $this->redirect($this->referer());
    }
 
    function admin_edit($id=null){
        if($this->request->is('post') || $this->request->is('put') ){
            $d = $this->request->data['User'];
            if($d['password'] != $d['passwordconfirm']){
                $this->Session->setFlash("Les mots de passes ne correspondent pas","notif",array('type'=>'error'));
            }else{
                if(empty($d['password']))
                    unset($d['password']);
                if($this->User->save($d)){
                    $this->Session->setFlash("L'utilisateur a bien été enregistré","notif");
                }
            }
        }elseif($id){
            $this->User->id = $id; 
            $this->request->data = $this->User->read('username,role,id'); 
        }
        $d = array(); 
        $d['roles'] = array(
            'admin' => 'admin',
            'user'  => 'membre'
        );
        $this->set($d);
    }

    function admin_add() {
        if($this->request->is('post') || $this->request->is('put') ){
            $d = $this->request->data['User'];
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
}