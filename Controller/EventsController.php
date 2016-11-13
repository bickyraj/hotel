<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */
class EventsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforefilter()
	{
		$this->Auth->allow('index', 'morenews');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->layout = 'innerpage';
		$options = array('order'=>['Event.created DESC']);
		$events = $this->Event->find('all', $options);
		
		$this->loadModel('Contact');
        $contacts = $this->Contact->find('first');

        $this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>2]));


		if(!empty($events))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'contact'=>$contacts,
				'output'=>$output,
				'events'=>$events,
				'description'=>$description,
				'_serialize'=>['events', 'output', 'contact', 'description'],
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
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
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
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
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
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('The event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_index()
	{
		$options = array('order'=>['Event.created DESC']);
		$events = $this->Event->find('all', $options);

		if(!empty($events))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'events'=>$events,
				'_serialize'=>['events', 'output'],
			));
	}

	public function admin_addEvent()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Event->create();

           		if($this->Event->save($this->request->data))
           		{
           			return $this->redirect(array('action' => 'index'));
           		}
           }
	}

	public function listEvents()
	{
		$options = array('order'=>['Event.created DESC']);
		$events = $this->Event->find('all', $options);

		if(!empty($events))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'events'=>$events,
				'_serialize'=>['events', 'output'],
			));

	}

	public function admin_deleteEvent()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Event->id = $this->request->data['Event']['id'];
				if (!$this->Event->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Event->delete()) {
					return $this->redirect(array('action' => 'index'));
				} else {
				}
           }
	}

	public function totalEvents()
	{
		$count = $this->Event->find('count');

		$this->set(array(
						'total'=>$count,
						'_serialize'=>['total']
					));

		return $count;
	}

	public function eventdetails($eventId = null)
	{
		$options = array('conditions'=>['Event.id'=>$eventId]);
		$event = $this->Event->find('first', $options);

		$this->set(array(
						'event'=>$event,
						'_serialize'=>['event']
					));
	}

	public function admin_editevent() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {


           	if($this->request->data['Event']['image']['size']==0)
           	{
           		unset($this->request->data['Event']['image']);
           	}
           	
           	// debug($this->request->data);die();
				if ($this->Event->save($this->request->data)) {

					$output=['status'=>1];

					return $this->redirect(array('action' => 'index'));

				} else {

					$output=['status'=>0];
				}

				$this->set(array(
								'output'=>$output,
								'_serialize'=>['output'],
								'_jsonp'=>true
							));
			}
	}

	public function morenews($eventId = null)
	{
		$this->loadModel('Event');
            $options = array('order'=>['Event.created DESC']);
            $events = $this->Event->find('all', $options);

		$this->layout = 'innerpage';
		$options = array('conditions'=>['Event.id'=>$eventId]);
		$event = $this->Event->find('first', $options);

		$this->loadModel('Contact');
        $contacts = $this->Contact->find('first');

		$this->set(array(
				'events'=>$events,
						'contact'=>$contacts,
						'event'=>$event,
						'_serialize'=>['event', 'contact','events']
					));
	}

	
}
