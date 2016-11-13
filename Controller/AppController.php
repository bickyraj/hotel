<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
        'Session',
        'RequestHandler',
        'Auth' => array(
            'authorize'=>array('Controller'),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            )
        )
    );

    public $view   = 'Theme';

    public function isAuthorized($user)
    {
        if(isset($user['role']) && $user['role']==1)
        {
            return true;
        }

        else
        {
            $this->Session->setFlash(__('You are not Authorized.'));
        }
            
    }

    public function beforeRender()
    {
        if ( isset($this->params['prefix']) && $this->params['prefix'] == 'admin') 
        {
            $this->theme ='Admin';

            $this->loadModel('Roomtype');
            $options = array('order'=>['Roomtype.id']);
            $roomtypes = $this->Roomtype->find('all', $options);

            $this->set(array(
                    'roomtypes'=>$roomtypes,
                    '_serialize'=>['roomtypes'],
                ));
        }

        else
        {
            $this->theme = 'Default';

            $this->loadModel('Roomtype');
            $options = array('order'=>['Roomtype.id DESC']);
            $roomtypes = $this->Roomtype->find('all', $options);

            $this->loadModel('Contact');
            $contacts = $this->Contact->find('first');

            $this->loadModel('Country');
            $countries = $this->Country->find('all');

            $this->set(array(
                    'countries'=>$countries,
                    'roomtypes'=>$roomtypes,
                    'contact'=>$contacts
                    // '_serialize'=>['banners', 'events', 'images', 'contact', 'roomtypes'],
                ));
        }
    }
     
}
