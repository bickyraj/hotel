<?php
App::uses('AppController', 'Controller');
/**
 * Abouts Controller
 *
 * @property About $About
 * @property PaginatorComponent $Paginator
 */
class AboutsController extends AppController {

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

		$about = $this->About->find('first');

		$this->loadModel('Feature');
		$features = $this->Feature->find('all');

		if(!empty($about))
		{
			$output=1;
		}else
		{
			$output=0;
		}
		$this->set(array(
				'output'=>$output,
				'about'=>$about,
				'features'=>$features,
				'_serialize'=>['about', 'output', 'features'],
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
		if (!$this->About->exists($id)) {
			throw new NotFoundException(__('Invalid about'));
		}
		$options = array('conditions' => array('About.' . $this->About->primaryKey => $id));
		$this->set('about', $this->About->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->About->create();
			if ($this->About->save($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
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
		if (!$this->About->exists($id)) {
			throw new NotFoundException(__('Invalid about'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->About->save($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('About.' . $this->About->primaryKey => $id));
			$this->request->data = $this->About->find('first', $options);
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
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid about'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->About->delete()) {
			$this->Session->setFlash(__('The about has been deleted.'));
		} else {
			$this->Session->setFlash(__('The about could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_index()
	{
		$options = array('order'=>['About.created DESC']);
		$about = $this->About->find('first', $options);

		if(!empty($about))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'about'=>$about,
				'_serialize'=>['about', 'output'],
			));
	}


	public function admin_addAbout()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->About->create();

           		if($this->About->save($this->request->data))
           		{
           			return $this->redirect(array('action' => 'index'));
           		}
           }
	}

	public function admin_editabout() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

	           	if($this->request->data['About']['image']['size']==0)
	           	{
	           		unset($this->request->data['About']['image']);
	           	}
				if ($this->About->save($this->request->data)) {

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

	public function aboutdetails($aboutId = null)
	{
		$options = array('conditions'=>['About.id'=>$aboutId]);
		$about = $this->About->find('first', $options);

		$this->set(array(
						'about'=>$about,
						'_serialize'=>['about']
					));
	}
}
