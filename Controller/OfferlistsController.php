<?php
App::uses('AppController', 'Controller');
/**
 * Offerlists Controller
 *
 * @property Offerlist $Offerlist
 * @property PaginatorComponent $Paginator
 */
class OfferlistsController extends AppController {

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
		$this->Offerlist->recursive = 0;
		$this->set('offerlists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Offerlist->exists($id)) {
			throw new NotFoundException(__('Invalid offerlist'));
		}
		$options = array('conditions' => array('Offerlist.' . $this->Offerlist->primaryKey => $id));
		$this->set('offerlist', $this->Offerlist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Offerlist->create();
			if ($this->Offerlist->save($this->request->data)) {
				$this->Session->setFlash(__('The offerlist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offerlist could not be saved. Please, try again.'));
			}
		}
		$offers = $this->Offerlist->Offer->find('list');
		$this->set(compact('offers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Offerlist->exists($id)) {
			throw new NotFoundException(__('Invalid offerlist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Offerlist->save($this->request->data)) {
				$this->Session->setFlash(__('The offerlist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offerlist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Offerlist.' . $this->Offerlist->primaryKey => $id));
			$this->request->data = $this->Offerlist->find('first', $options);
		}
		$offers = $this->Offerlist->Offer->find('list');
		$this->set(compact('offers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Offerlist->id = $id;
		if (!$this->Offerlist->exists()) {
			throw new NotFoundException(__('Invalid offerlist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Offerlist->delete()) {
			$this->Session->setFlash(__('The offerlist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The offerlist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_index($offerId=null)
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Offerlist->create();

           		if($this->Offerlist->save($this->request->data))
           		{
           		}
           }

           	$this->loadModel('Offer');
           	$options = array('conditions'=>[

           						'Offer.id'=>$offerId
           		]);
           	$offer = $this->Offer->find('first', $options);

           	$options = array(
           				'conditions'=>['Offerlist.offer_id'=>$offerId], 
           				'order'=>['Offerlist.created DESC']);
			$offerlists = $this->Offerlist->find('all', $options);

			if(!empty($offerlists))
			{
				$output=['status'=>1];
			}else
			{
				$output=['status'=>0];
			}
			$this->set(array(
					'offer'=>$offer,
					'output'=>$output,
					'offerlists'=>$offerlists,
					'_serialize'=>['offerlists', 'output', 'offer'],
				));
	}

	public function admin_deleteofferlist()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           		$offerId = $this->request->data['Offerlist']['offer_id'];
           	 	$this->Offerlist->id = $this->request->data['Offerlist']['id'];
				if (!$this->Offerlist->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Offerlist->delete()) {
					$output=['status'=>1];
				} else {
					$output=['status'=>0];
				}

				return $this->redirect(array('action' => 'index',$offerId));
           }
	}

	public function offerlistdetails($offerlistId = null)
	{
		if($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
		{

			$options = array('conditions'=>['Offerlist.id'=>$offerlistId]);
			$offerlist = $this->Offerlist->find('first', $options);

			$this->set(array(
						'offerlist'=>$offerlist,
						'_serialize'=>['offerlist'],
						'_jsonp'=>true
					));
		}
	}

	public function admin_editofferlist() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	$offerId = $this->request->data['Offerlist']['offer_id'];
				if ($this->Offerlist->save($this->request->data)) {

					$output=['status'=>1];
					return $this->redirect(array('action' => 'index', $offerId));

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
