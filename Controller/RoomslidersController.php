<?php
App::uses('AppController', 'Controller');
/**
 * Roomsliders Controller
 *
 * @property Roomslider $Roomslider
 * @property PaginatorComponent $Paginator
 */
class RoomslidersController extends AppController {

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
		$this->Roomslider->recursive = 0;
		$this->set('roomsliders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Roomslider->exists($id)) {
			throw new NotFoundException(__('Invalid roomslider'));
		}
		$options = array('conditions' => array('Roomslider.' . $this->Roomslider->primaryKey => $id));
		$this->set('roomslider', $this->Roomslider->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Roomslider->create();
			if ($this->Roomslider->save($this->request->data)) {
				$this->Session->setFlash(__('The roomslider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The roomslider could not be saved. Please, try again.'));
			}
		}
		$roomtypes = $this->Roomslider->Roomtype->find('list');
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
		if (!$this->Roomslider->exists($id)) {
			throw new NotFoundException(__('Invalid roomslider'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Roomslider->save($this->request->data)) {
				$this->Session->setFlash(__('The roomslider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The roomslider could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Roomslider.' . $this->Roomslider->primaryKey => $id));
			$this->request->data = $this->Roomslider->find('first', $options);
		}
		$roomtypes = $this->Roomslider->Roomtype->find('list');
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
		$this->Roomslider->id = $id;
		if (!$this->Roomslider->exists()) {
			throw new NotFoundException(__('Invalid roomslider'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Roomslider->delete()) {
			$this->Session->setFlash(__('The roomslider has been deleted.'));
		} else {
			$this->Session->setFlash(__('The roomslider could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_addImage($roomtypeId = null)
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Roomslider->create();

           		// $this->request->data['Roomslider']['status']=1;
           		if($this->Roomslider->save($this->request->data))
           		{
           			return $this->redirect(array('action' => 'index', $roomtypeId));
           		}
           }
	}

	public function admin_deleteImage()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           		$roomtypeId = $this->request->data['Roomslider']['roomtype_id'];
           	 	$this->Roomslider->id = $this->request->data['Roomslider']['id'];
				if (!$this->Roomslider->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Roomslider->delete()) {
					return $this->redirect(array('action' => 'sliders', $roomtypeId));
				}
           }
	}

	public function admin_sliders($roomtypeId=null)
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Roomslider->create();

           		if($this->Roomslider->save($this->request->data))
           		{
           		}
           }

           $this->loadModel('Roomtype');
           $options = array('conditions'=>['Roomtype.id'=>$roomtypeId]);
           $roomtype = $this->Roomtype->find('first', $options);

         $options = array('order'=>['Roomslider.created DESC'], 'conditions'=>['Roomslider.roomtype_id'=>$roomtypeId]);
		 $images = $this->Roomslider->find('all', $options);

			if(!empty($images))
			{
				$output=['status'=>1];
			}else
			{
				$output=['status'=>0];
			}
			$this->set(array(
					'roomtype'=>$roomtype,
					'output'=>$output,
					'images'=>$images,
					'_serialize'=>['images', 'output', 'roomtype'],
				));
	}

	public function roomsliderdetails($roomsliderId = null)
	{
		$options = array('conditions'=>['Roomslider.id'=>$roomsliderId]);
		$roomslider = $this->Roomslider->find('first', $options);

		$this->set(array(
						'roomslider'=>$roomslider,
						'_serialize'=>['roomslider']
					));
	}

	public function admin_editroomslider() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {


           	if($this->request->data['Roomslider']['image']['size']==0)
           	{
           		unset($this->request->data['Roomslider']['image']);
           	}
           	
           	$roomtypeId = $this->request->data['Roomslider']['roomtype_id'];
           	// debug($this->request->data);die();
				if ($this->Roomslider->save($this->request->data)) {

					$output=['status'=>1];

					return $this->redirect(array('action' => 'sliders', $roomtypeId));

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
}
