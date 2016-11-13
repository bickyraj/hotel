<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}



/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function userRegistration()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
		{
			$this->User->create();

			$this->request->data['User']['role']= 1;
			$this->request->data['User']['status']= 1;


			if($this->User->save($this->request->data))
			{
				$output = ['status'=>1];
			}else
			{
				$output = ['status'=>0];
			}

			$this->set(array(
					'output'=>$output,
					'_serialize'=>['output'],
					'_jsonp'=>true
				));
		}

	}

    public function admin_login()
	{

		$this->layout = 'admin_login';

		if ($this->request->is('post')) {

            if ($this->Auth->login()) 
            {          
				return $this->redirect(array('action' => 'index'));
            } 

            else {
            	
                $this->Session->setFlash('Ivalid username or password');
            }
        }
	}

	public function admin_index()
	{
		
		$totalEvents = ClassRegistry::init('Event')->totalEvents();
      	$totalGalleries = ClassRegistry::init('Gallery')->totalGalleries();
      	$totalFeatures = ClassRegistry::init('Feature')->totalFeatures();
      	$totalRoomtypes = ClassRegistry::init('Roomtype')->totalRoomtypes();

      	$this->set(array(
      			'totalEvents'=> $totalEvents,
      			'totalGalleries'=>$totalGalleries,
      			'totalFeatures'=>$totalFeatures,
      			'totalRoomtypes'=>$totalRoomtypes
      		));
	}

	public function admin_changepassword()
	{
		// debug($this->Auth->User('id'));die();

		$userId = $this->Auth->User('id');

		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		// if($this->Event->save($this->request->data))
           		// {
           		// 	return $this->redirect(array('action' => 'index'));
           		// }

           		$newpassword = $this->request->data['newpassword'];
           		$confirmpassword = $this->request->data['confirmpassword'];
           		$oldpassword = $this->request->data['oldpassword'];

           		if($newpassword != $confirmpassword)
           		{
           			$this->Session->write('msg',3);
           			return $this->redirect(array('action' => 'changepassword'));
           		}
           		else
           		{
           			$this->User->id = $userId;

           			$currentpassword = $this->User->Field("password", ['User.id'=>$userId]);

           			$hashedoldpassword = $this->User->passwordHash($oldpassword);

           			if($currentpassword == $hashedoldpassword)
           			{
           				$this->User->saveField('password',$newpassword);

           				$this->Session->write('msg',1);

           				return $this->redirect(array('action' => 'changepassword'));
           			}
           			else
           			{
           				
           				$this->Session->write('msg',2);
           				return $this->redirect(array('action' => 'changepassword'));
           			}


           		}
           		// debug($this->request->data);die();
           }
	}

	public function admin_logout()
	{
		if($this->Auth->logout())
		{
			 $this->redirect(array('action'=>'admin_login'));
		}
	}
}
