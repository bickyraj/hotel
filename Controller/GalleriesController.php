<?php
App::uses('AppController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 * @property PaginatorComponent $Paginator
 */
class GalleriesController extends AppController {

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
		$options = array('order'=>['Gallery.created DESC']);
		$images = $this->Gallery->find('all', $options);

		$this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>1]));

		if(!empty($images))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
			'description'=>$description,
				'output'=>$output,
				'images'=>$images,
				'_serialize'=>['images', 'output', 'description'],
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
		if (!$this->Gallery->exists($id)) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		$options = array('conditions' => array('Gallery.' . $this->Gallery->primaryKey => $id));
		$this->set('gallery', $this->Gallery->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gallery->create();
			if ($this->Gallery->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
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
		if (!$this->Gallery->exists($id)) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gallery->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gallery.' . $this->Gallery->primaryKey => $id));
			$this->request->data = $this->Gallery->find('first', $options);
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
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Gallery->delete()) {
			$this->Session->setFlash(__('The gallery has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gallery could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_addImage()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Gallery->create();

           		$this->request->data['Gallery']['status']=1;
           		if($this->Gallery->save($this->request->data))
           		{
           			return $this->redirect(array('action' => 'index'));
           		}
           }
	}

	public function listImages()
	{
		$options = array('order'=>['Gallery.created DESC']);
		$images = $this->Gallery->find('all', $options);

		if(!empty($images))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'images'=>$images,
				'_serialize'=>['images', 'output'],
			));

	}

	public function admin_deleteImage()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Gallery->id = $this->request->data['Gallery']['id'];
				if (!$this->Gallery->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Gallery->delete()) {
					return $this->redirect(array('action' => 'index'));
				}
           }
	}

	public function totalImages()
	{
		$count = $this->Gallery->find('count');

		$this->set(array(
						'total'=>$count,
						'_serialize'=>['total']
					));

		return $count;
	}

	public function admin_index()
	{
		$options = array('order'=>['Gallery.created DESC']);
		$images = $this->Gallery->find('all', $options);

		if(!empty($images))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'images'=>$images,
				'_serialize'=>['images', 'output'],
			));
	}

	public function admin_choosepic()
	{
		$options = array('order'=>['Gallery.created DESC']);
		$images = $this->Gallery->find('all', $options);

		if(!empty($images))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}

		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		
           		// debug($this->request->data);die();

           		foreach ($this->request->data as $data)
           		{
           			if(isset($data['Gallery']['status']) && $data['Gallery']['status'] =="on")
           			{
           				$data['Gallery']['status'] = 1;
           			}
           			else
           			{
           				$data['Gallery']['status'] = 0;
           			}
           			$this->Gallery->save($data);

           		}
					return $this->redirect(array('action' => 'choosepic'));
           		
           }

		$this->set(array(
				'output'=>$output,
				'images'=>$images,
				'_serialize'=>['images', 'output'],
			));
	}

	public function gallerydetails($galleryId = null)
	{
		$options = array('conditions'=>['Gallery.id'=>$galleryId]);
		$gallery = $this->Gallery->find('first', $options);

		$this->set(array(
						'gallery'=>$gallery,
						'_serialize'=>['gallery']
					));
	}

	public function admin_editgallery() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {


           	if($this->request->data['Gallery']['image']['size']==0)
           	{
           		unset($this->request->data['Gallery']['image']);
           	}
           	
           	// debug($this->request->data);die();
				if ($this->Gallery->save($this->request->data)) {

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
}
