<?php
App::uses('AppController', 'Controller');
/**
 * Roomtypes Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomtypesController extends AppController {

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
		
		$options = array('order'=>['Roomtype.created DESC']);
		$roomtypes = $this->Roomtype->find('all', $options);

		$this->loadModel('Menu');
		$description = $this->Menu->find('first', array('conditions'=>['Menu.id'=>1]));

		if(!empty($roomtypes))
		{
			$output=['status'=>1];
		}else
		{
			$output=['status'=>0];
		}
		$this->set(array(
				'output'=>$output,
				'description'=>$description,
				'roomtypes'=>$roomtypes,
				'_serialize'=>['roomtypes', 'output', 'description'],
			));
	}


	public function admin_index()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {
           		$this->Roomtype->create();
           		if($this->Roomtype->save($this->request->data))
           		{
           		}
           }

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

	public function admin_deleteRoomtype()
	{
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {

           	 	$this->Roomtype->id = $this->request->data['Roomtype']['id'];

           	 	$id = $this->request->data['Roomtype']['id'];
				if (!$this->Roomtype->exists()) {
				}

				$this->request->allowMethod('post', 'delete');
				if ($this->Roomtype->delete($id,true)) {
					$output=['status'=>1];
				} else {
					$output=['status'=>0];
				}

				return $this->redirect(array('action' => 'index'));
           }
	}

	public function totalRoomtypes()
	{
		$count = $this->Roomtype->find('count');

		$this->set(array(
						'total'=>$count,
						'_serialize'=>['total']
					));

		return $count;
	}

	public function roomtypedetails($roomtypeId = null)
	{
		$options = array('conditions'=>['Roomtype.id'=>$roomtypeId]);
		$roomtype = $this->Roomtype->find('first', $options);

		$this->set(array(
						'roomtype'=>$roomtype,
						'_serialize'=>['roomtype']
					));
	}

	public function admin_editroomtype() {
		if ($this->RequestHandler->requestedWith('json') || $this->request->is('post') || $this->request->is('put'))
           {


           	if($this->request->data['Roomtype']['image']['size']==0)
           	{
           		unset($this->request->data['Roomtype']['image']);
           	}
           	
           	// debug($this->request->data);die();
				if ($this->Roomtype->save($this->request->data)) {

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
