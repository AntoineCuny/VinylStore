<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('DebugKit.Toolbar','Session',
		'Auth' => array(
        'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => false),
        'loginRedirect' => array('controller' => 'posts', 'action' => 'index', 'admin' => false),
        'authenticate' => array('Form'),
        'authorize' => array('Controller')
    )
		);

	public $helpers = array('Text', 'Form', 'Html', 'Session');

	public $paginate = array(
		'limit' => 3);

	public function getTableData($model, $params = array()){
	   
	   $this->loadModel($model);
	   return $this->{$model}->find('all', $params);
	  }

	  public function getTableFindList($model){
	   
	   $this->loadModel($model);
	   return $this->{$model}->find('list');
	  }
	  
	function beforeFilter(){

		$this->Auth->autenticate = array('controller' => 'users','action' => 'login', 'admin' => false);
		$this->Auth->authorize = array('Controller');
		/*$this->Auth->authError = "erreur Authentification";
		$this->Auth->loginError = "Votre Mot de passe ou identifiant est incorrect";*/


		if(!isset($this->request->params['prefix'])){
			$this->Auth->allow();
		}
		
		if(isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin')
			$this->layout = 'admin' ;
	}
	
	function isAuthorized($user = null) {
        // Chacun des utilisateurs enregistrés peut accéder aux fonctions publiques
         if (empty($this->request->params['admin'])) {
        return true;
        }
 
        // Seulement les administrateurs peuvent accéder aux fonctions d'administration
        if (isset($this->request->params['admin'])) {
            return (bool)($user['role'] === 'admin');
        }
 
        // Par défaut n'autorise pas
       return false;
    }


}
