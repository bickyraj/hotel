<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforefilter()
	{
		$this->Auth->allow();
	}

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */

	public function display() {

		$this->loadModel('Roomtype');
            $options = array('order'=>['Roomtype.id DESC']);
            $roomtypes = $this->Roomtype->find('all', $options);

            $this->loadModel('Banner');
            $options = array('order'=>['Banner.created DESC']);
            $banners = $this->Banner->find('all', $options);

            $this->loadModel('Event');
            $options = array('order'=>['Event.created DESC']);
            $events = $this->Event->find('all', $options);

            $this->loadModel('Gallery');
            $options = array('order'=>['Gallery.created DESC'], 'conditions'=>['Gallery.status'=>1]);
            $images = $this->Gallery->find('all', $options);

            $this->loadModel('Menu');
            $galleryDescription = $this->Menu->find('first', array('conditions'=>['Menu.id'=>1]));

            $this->loadModel('Contact');
            $contacts = $this->Contact->find('first');

            $this->loadModel('Testimonial');
            $options = array('order'=>['Testimonial.created DESC']);
            $testimonials = $this->Testimonial->find('all', $options);

            $this->loadModel('Country');
            $countries = $this->Country->find('all');

            $this->set(array(
                    'testimonials'=>$testimonials,
                    'countries'=>$countries,
                    'roomtypes'=>$roomtypes,
                    'contact'=>$contacts,
                    'images'=>$images,
                    'events'=>$events,
                    'banners'=>$banners,
                    'galleryDescription'=>$galleryDescription
                    // '_serialize'=>['banners', 'events', 'images', 'contact', 'roomtypes'],
                ));
            
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function home()
	{
		$this->theme = 'Default';

            $this->loadModel('Roomtype');
            $options = array('order'=>['Roomtype.id DESC']);
            $roomtypes = $this->Roomtype->find('all', $options);

            $this->loadModel('Banner');
            $options = array('order'=>['Banner.created DESC']);
            $banners = $this->Banner->find('all', $options);

            $this->loadModel('Event');
            $options = array('order'=>['Event.created DESC']);
            $events = $this->Event->find('all', $options);

            $this->loadModel('Gallery');
            $options = array('order'=>['Gallery.created DESC'], 'conditions'=>['Gallery.status'=>1]);
            $images = $this->Gallery->find('all', $options);

            $this->loadModel('Contact');
            $contacts = $this->Contact->find('first');

            $this->loadModel('Testimonial');
            $options = array('order'=>['Testimonial.created DESC'], 'conditions'=>['Testimonial.status'=>1]);
            $testimonials = $this->Testimonial->find('all', $options);

            $this->loadModel('Country');
            $countries = $this->Country->find('all');

            $this->set(array(
                    'testimonials'=>$testimonials,
                    'countries'=>$countries,
                    'roomtypes'=>$roomtypes,
                    'contact'=>$contacts,
                    'images'=>$images,
                    'events'=>$events,
                    'banners'=>$banners
                    // '_serialize'=>['banners', 'events', 'images', 'contact', 'roomtypes'],
                ));
	}
}
