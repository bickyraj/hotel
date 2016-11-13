<?php
App::uses('AppController', 'Controller');
/**
 * Offers Controller
 *
 * @property Offer $Offer
 * @property PaginatorComponent $Paginator
 */
class OffersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforefilter()
	{
		$this->Auth->allow('index', 'moreoffers');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->layout = 'innerpage';
		
		$options = array('order'=>['Offer.created DESC']);
		$offers = $this->Offer->find('all', $options);

		$this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>1]));

		if(!empty($offers))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'description'=>$description,
				'offers'=>$offers,
				'_serialize'=>['offers', 'output', 'description'],
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
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$options = array('conditions' => array('Offer.' . $this->Offer->primaryKey => $id));
		$this->set('offer', $this->Offer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Offer->create();
			if ($this->Offer->save($this->request->data)) {
				$this->Session->setFlash(__('The offer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offer could not be saved. Please, try again.'));
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
		if (!$this->Offer->exists($id)) {
			throw new NotFoundException(__('Invalid offer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Offer->save($this->request->data)) {
				$this->Session->setFlash(__('The offer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Offer.' . $this->Offer->primaryKey => $id));
			$this->request->data = $this->Offer->find('first', $options);
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
		$this->Offer->id = $id;
		if (!$this->Offer->exists()) {
			throw new NotFoundException(__('Invalid offer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Offer->delete()) {
			$this->Session->setFlash(__('The offer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The offer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function admin_index()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Offer->create();

           		if($this->Offer->save($this->request->data))
           		{
           		}
           }

           	$options = array('order'=>['Offer.created DESC']);
			$offers = $this->Offer->find('all', $options);

			if(!empty($offers))
			{
				$output=['status'=>1];
			}else
			{
				$output=['status'=>0];
			}
			$this->set(array(
					'output'=>$output,
					'offers'=>$offers,
					'_serialize'=>['offers', 'output'],
				));
	}

	public function admin_deleteOffer()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Offer->id = $this->request->data['Offer']['id'];
				if (!$this->Offer->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Offer->delete($this->Offer->id,true)) {
					$output=['status'=>1];
				} else {
					$output=['status'=>0];
				}

				return $this->redirect(array('action' => 'index'));
           }
	}

	public function moreoffers($offerId = null)
	{
		$this->layout = 'innerpage';

		$options = array('conditions'=>['Offer.id'=>$offerId]);
		$offer = $this->Offer->find('first', $options);

		if(!empty($offer))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'offer'=>$offer,
				'_serialize'=>['offer', 'output'],
			));
	}

	public function offerdetails($offerId = null)
	{
		if($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
		{

			$options = array('conditions'=>['Offer.id'=>$offerId]);
			$offer = $this->Offer->find('first', $options);

			$this->set(array(
						'offer'=>$offer,
						'_serialize'=>['offer'],
						'_jsonp'=>true
					));
		}
	}

	public function admin_editoffer() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
				if ($this->Offer->save($this->request->data)) {

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
