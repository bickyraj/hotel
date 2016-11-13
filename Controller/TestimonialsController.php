<?php
App::uses('AppController', 'Controller');
/**
 * Testimonials Controller
 *
 * @property Testimonial $Testimonial
 * @property PaginatorComponent $Paginator
 */
class TestimonialsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforefilter()
	{
		$this->Auth->allow('index', 'postnew');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'innerpage';
		$options = array('order'=>['Testimonial.created DESC'], 'conditions'=>['Testimonial.status'=>1]);
		$testimonials = $this->Testimonial->find('all', $options);
		
		// $this->loadModel('Contact');
  //       $contacts = $this->Contact->find('first');

        $this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>6]));


		if(!empty($testimonials))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'testimonials'=>$testimonials,
				'description'=>$description,
				'_serialize'=>['testimonials', 'output', 'description'],
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
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
		$this->set('testimonial', $this->Testimonial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Testimonial->create();
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
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
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
			$this->request->data = $this->Testimonial->find('first', $options);
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
		$this->Testimonial->id = $id;
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Testimonial->delete()) {
			$this->Session->setFlash(__('The testimonial has been deleted.'));
		} else {
			$this->Session->setFlash(__('The testimonial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_index()
	{
		$options = array('order'=>['Testimonial.created DESC']);
		$testimonials = $this->Testimonial->find('all', $options);

		if(!empty($testimonials))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'testimonials'=>$testimonials,
				'_serialize'=>['testimonials', 'output'],
			));
	}

	public function admin_addTestimonial()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Testimonial->create();

           		if($this->Testimonial->save($this->request->data))
           		{
           			return $this->redirect(array('action' => 'index'));
           		}
           }
	}

	public function admin_deleteTestimonial()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Testimonial->id = $this->request->data['Testimonial']['id'];
				if (!$this->Testimonial->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Testimonial->delete()) {
					return $this->redirect(array('action' => 'index'));
				} else {
				}
           }
	}

	public function testimonialdetails($testimonialId = null)
	{
		$options = array('conditions'=>['Testimonial.id'=>$testimonialId]);
		$testimonial = $this->Testimonial->find('first', $options);

		$this->set(array(
						'testimonial'=>$testimonial,
						'_serialize'=>['testimonial']
					));
	}

	public function admin_edittestimonial() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
				if ($this->Testimonial->save($this->request->data)) {

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

	public function admin_postTestimonial() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           		$this->request->data['Testimonial']['status']=1;
				if ($this->Testimonial->save($this->request->data)) {

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

	public function admin_unpostTestimonial() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           		$this->request->data['Testimonial']['status']=0;
				if ($this->Testimonial->save($this->request->data)) {

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

	public function postnew()
	{

		$this->layout = 'innerpage';

        $this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>6]));

		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Testimonial->create();

           		if($this->Testimonial->save($this->request->data))
           		{
           			$this->Session->write('msg',1);
           			return $this->redirect(array('action' => 'index'));
           		}
           		else
           		{
           			$this->Session->write('msg',2);
           			return $this->redirect(array('action' => 'index'));
           		}
           }

           $this->set(array(
           		'description'=>$description,
           	));
	}
}
