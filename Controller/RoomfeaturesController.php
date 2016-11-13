<?php
App::uses('AppController', 'Controller');
/**
 * Roomfeatures Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomfeaturesController extends AppController {

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
	public function index($roomtypeId = null) {
		$this->layout = 'innerpage';
		
		$options = array('conditions'=>['Roomfeature.roomtype_id'=>$roomtypeId]);
		$roomfeatures = $this->Roomfeature->find('all', $options);

		if(!empty($roomfeatures))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}

		$this->loadModel('Roomtype');

		$options = array('conditions'=>['Roomtype.id'=>$roomtypeId]);
		$roomtype = $this->Roomtype->find('first', $options);
		
		$this->set(array(
				'roomtype'=>$roomtype,
				'output'=>$output,
				'roomfeatures'=>$roomfeatures,
				'_serialize'=>['roomfeatures', 'output', 'roomtype'],
			));
	}


	public function admin_index($roomType=null)
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Roomtfeature->create();

           		if($this->Roomtfeature->save($this->request->data))
           		{
           		}
           }

           	$options = array(
           				'conditions'=>['Roomfeature.roomtype_id'=>$roomtype], 
           				'order'=>['Roomfeature.created DESC']);
			$features = $this->Roomfeature->find('all', $options);

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

	public function admin_features($roomtypeid=null)
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Roomfeature->create();

           		if($this->Roomfeature->save($this->request->data))
           		{
           		}
           }

           $this->loadModel('Roomtype');
           $options = array('conditions'=>['Roomtype.id'=>$roomtypeid]);
           $roomtype = $this->Roomtype->find('first', $options);

           $options = array(
           				'conditions'=>['roomtype_id'=>$roomtypeid], 
           				'order'=>['Roomfeature.created DESC']);
			$features = $this->Roomfeature->find('all', $options);

			if(!empty($features))
			{
				$output=['status'=>1];
			}else
			{
				$output=['status'=>0];
			}
			$this->set(array(
					'roomtype'=>$roomtype,
					'output'=>$output,
					'features'=>$features,
					'_serialize'=>['features', 'output', 'roomtype'],
				));
	}

	public function admin_addroomfeatures()
	{
		
	}

	public function listRoomtype()
	{
		$options = array('order'=>['Roomtype.created DESC']);
		$roomtypes = $this->Roomtype->find('all', $options);

		if(!empty($roomtypes))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'roomtypes'=>$roomtypes,
				'_serialize'=>['roomtypes', 'output'],
			));

	}

	public function admin_deletefeature()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           		$roomtypeId = $this->request->data['Roomfeature']['roomtype_id'];
           	 	$this->Roomfeature->id = $this->request->data['Roomfeature']['id'];
				if (!$this->Roomfeature->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Roomfeature->delete()) {
					$output=['status'=>1];
				} else {
					$output=['status'=>0];
				}

				return $this->redirect(array('action' => 'features',$roomtypeId));
           }
	}

	public function totalRoomtypes()
	{
		$count = $this->Roomfeature->find('count');

		$this->set(array(
						'total'=>$count,
						'_serialize'=>['total']
					));
	}

	public function roomfeaturedetails($roomfeatureId = null)
	{
		$options = array('conditions'=>['Roomfeature.id'=>$roomfeatureId]);
		$roomfeature = $this->Roomfeature->find('first', $options);

		$this->set(array(
						'roomfeature'=>$roomfeature,
						'_serialize'=>['roomfeature']
					));
	}

	public function admin_editroomfeature() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {


           	$roomtypeId = $this->request->data['Roomfeature']['roomtype_id'];
           	if($this->request->data['Roomfeature']['image']['size']==0)
           	{
           		unset($this->request->data['Roomfeature']['image']);
           	}
           	
           	// debug($this->request->data);die();
				if ($this->Roomfeature->save($this->request->data)) {

					$output=['status'=>1];

					return $this->redirect(array('action' => 'features',$roomtypeId));

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
