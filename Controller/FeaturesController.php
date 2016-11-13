<?php
App::uses('AppController', 'Controller');
/**
 * Features Controller
 *
 * @property Feature $Feature
 * @property PaginatorComponent $Paginator
 */
class FeaturesController extends AppController {

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
		$this->Feature->recursive = 0;
		$this->set('features', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		$options = array('conditions' => array('Feature.' . $this->Feature->primaryKey => $id));
		$this->set('feature', $this->Feature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Feature->create();
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash(__('The feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.'));
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
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash(__('The feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Feature.' . $this->Feature->primaryKey => $id));
			$this->request->data = $this->Feature->find('first', $options);
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
		$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException(__('Invalid feature'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Feature->delete()) {
			$this->Session->setFlash(__('The feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function admin_index()
	{
		$options = array('order'=>['Feature.created DESC']);
		$features = $this->Feature->find('all', $options);

		if(!empty($features))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'features'=>$features,
				'_serialize'=>['features', 'output'],
			));
	}


	public function admin_addFeature()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Feature->create();

           		if($this->Feature->save($this->request->data))
           		{
           			return $this->redirect(array('action' => 'index'));
           		}
           }
	}

	public function admin_deleteFeature()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Feature->id = $this->request->data['Feature']['id'];
				if (!$this->Feature->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Feature->delete()) {
					return $this->redirect(array('action' => 'index'));
				} else {
				}
           }
	}

	public function featuredetails($eventId = null)
	{
		$options = array('conditions'=>['Feature.id'=>$eventId]);
		$feature = $this->Feature->find('first', $options);

		$this->set(array(
						'feature'=>$feature,
						'_serialize'=>['feature']
					));
	}

	public function admin_editfeature() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
				if ($this->Feature->save($this->request->data)) {

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

	public function totalFeatures()
	{
		$count = $this->Feature->find('count');

		$this->set(array(
						'total'=>$count,
						'_serialize'=>['total']
					));

		return $count;
	}

}
