<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Reservations Controller
 *
 * @property Reservation $Reservation
 * @property PaginatorComponent $Paginator
 */
class ReservationsController extends AppController {

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

		$this->loadModel('Roomtype');
		$roomtypes = $this->Roomtype->find('all');


		$this->loadModel('Contact');
		$contact = $this->Contact->find('first');

		$this->loadModel('Country');
		$countries = $this->Country->find('all');

		// $this->Reservation->recursive = 0;
		// $this->set('reservations', $this->Paginator->paginate());

		


		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	$this->Session->delete('msg');
           		// debug($this->request->data['Reservation']);die();
           		// $this->Reservation->create();

           		// if($this->Reservation->save($this->request->data))
           		// {
           		// 	return $this->redirect(array('action' => 'index'));
           		// }

           		$fromEmail = $this->request->data['Reservation']['email'];
           		$fullname = $this->request->data['Reservation']['fullname'];

           		$data = $this->request->data['Reservation'];
           		$Email = new CakeEmail();
		        $Email->theme('Default')
		    			->template('reservation')
		                ->emailFormat('html')
		                ->subject('Reservations')
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

		       return $this->redirect(array('controller'=>'pages', 'action' => 'index'));
           }

           $this->set(array(
           		'contact'=>$contact,
           		'roomtypes'=>$roomtypes,
           		'countries'=>$countries
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
		if (!$this->Reservation->exists($id)) {
			throw new NotFoundException(__('Invalid reservation'));
		}
		$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
		$this->set('reservation', $this->Reservation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->request->data)) {
				$this->Session->setFlash(__('The reservation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.'));
			}
		}
		$roomtypes = $this->Reservation->Roomtype->find('list');
		$this->set(compact('roomtypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reservation->exists($id)) {
			throw new NotFoundException(__('Invalid reservation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reservation->save($this->request->data)) {
				$this->Session->setFlash(__('The reservation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reservation.' . $this->Reservation->primaryKey => $id));
			$this->request->data = $this->Reservation->find('first', $options);
		}
		$roomtypes = $this->Reservation->Roomtype->find('list');
		$this->set(compact('roomtypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reservation->id = $id;
		if (!$this->Reservation->exists()) {
			throw new NotFoundException(__('Invalid reservation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reservation->delete()) {
			$this->Session->setFlash(__('The reservation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reservation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
