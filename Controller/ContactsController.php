<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforefilter()
	{
		$this->Auth->allow('index');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->layout = 'innerpage';
		$contacts = $this->Contact->find('first');

		$this->loadModel('Event');
		$options = array('order'=>['Event.created DESC']);
		$events = $this->Event->find('all', $options);

		$this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>1]));

		if(!empty($contacts))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}

		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	$this->Session->delete('msg');

           		$fromEmail = $this->request->data['email'];
           		$fullname = $this->request->data['name'];

           		$data = $this->request->data;
           		$Email = new CakeEmail();
		        $Email->theme('Default')
		    			->template('contactform')
		                ->emailFormat('html')
		                ->subject('Feedback')
		                ->to('neelaya@manojpanta.com.np')
		                ->from(array($fromEmail))
		                ->viewVars(array('data'=>$data))
		                ->send();

		                if($Email->send())
		                {
		                	$this->Session->write('msg',1);
		                }
		                else
		                {
		                	$this->Session->write('msg',2);
		                }

		       return $this->redirect(array('action' => 'index'));
           }
		$this->set(array(
				'events'=>$events,
				'description'=>$description,
				'output'=>$output,
				'contact'=>$contacts,
				'_serialize'=>['contact', 'output', 'events', 'description'],
			));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
		$this->set('contact', $this->Contact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
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
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$this->request->data = $this->Contact->find('first', $options);
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('The contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_addContact()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Contact->create();

           		$this->request->data['Contact']['status']=1;
           		if($this->Contact->save($this->request->data))
           		{
           			$output=['status'=>1];
           			return $this->redirect(array('action' => 'index'));
           		}else
           		{
           			$output=['status'=>0];
           		}

           		$this->set(array(
           				"output"=>$output,
           				"_serialize"=>['output']
           			));
           }
	}

	public function listContact()
	{
		$contacts = $this->Contact->find('first');

		if(!empty($contacts))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'contacts'=>$contacts,
				'_serialize'=>['contacts', 'output'],
			));

	}

	public function admin_editContact() 
	{

		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

				if ($this->Contact->save($this->request->data)) {

					$output=['status'=>1];
					return $this->redirect(array('action' => 'index'));
				} else {
					$output=['status'=>0];
				}
				$this->set(array(
									'output'=>$output,
									'_serialize'=>['output'],
								));
			}
	}

	public function sendFeedback()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
				$Email = new CakeEmail();
	            $Email->template('feedback')
	            ->emailFormat('html')
	            ->to('bickyrajkayastha@gmail.com')
	            ->from(array('neelaya@gmail.com'))
	            ->subject('Feedback');

	            debug($Email->send());
	        }
	}

	public function admin_index()
	{
		$contacts = $this->Contact->find('first');

		if(!empty($contacts))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'contact'=>$contacts,
				'_serialize'=>['contact', 'output'],
			));
	}
}
