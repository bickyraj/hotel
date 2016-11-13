<?php
App::uses('AppController', 'Controller');
/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {

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
		$this->layout = 'innerpage';
		
		$options = array('order'=>['Room.created DESC']);
		$rooms = $this->Room->find('all', $options);

		if(!empty($rooms))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'rooms'=>$rooms,
				'_serialize'=>['rooms', 'output'],
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
		if (!$this->Room->exists($id)) {
			throw new NotFoundException(__('Invalid room'));
		}
		$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
		$this->set('room', $this->Room->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Room->create();
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash(__('The room has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.'));
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
		if (!$this->Room->exists($id)) {
			throw new NotFoundException(__('Invalid room'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash(__('The room has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The room could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
			$this->request->data = $this->Room->find('first', $options);
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
		$this->Room->id = $id;
		if (!$this->Room->exists()) {
			throw new NotFoundException(__('Invalid room'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Room->delete()) {
			$this->Session->setFlash(__('The room has been deleted.'));
		} else {
			$this->Session->setFlash(__('The room could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function admin_index()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Room->create();

           		if($this->Room->save($this->request->data))
           		{
           		}
           }

           	$options = array('order'=>['Room.created DESC']);
			$rooms = $this->Room->find('all', $options);

			if(!empty($rooms))
			{
				$output=['status'=>1];
			}else
			{
				$output=['status'=>0];
			}
			$this->set(array(
					'output'=>$output,
					'rooms'=>$rooms,
					'_serialize'=>['rooms', 'output'],
				));
	}

	public function listRoom()
	{
		$options = array('order'=>['Room.created DESC']);
		$rooms = $this->Room->find('all', $options);

		if(!empty($rooms))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'rooms'=>$rooms,
				'_serialize'=>['rooms', 'output'],
			));

	}

	public function admin_deleteRoom()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Room->id = $this->request->data['Room']['id'];
				if (!$this->Room->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Room->delete()) {
					$output=['status'=>1];
				} else {
					$output=['status'=>0];
				}

				return $this->redirect(array('action' => 'index'));
           }
	}

	public function totalRooms()
	{
		$count = $this->Room->find('count');

		$this->set(array(
						'total'=>$count,
						'_serialize'=>['total']
					));
	}
}
