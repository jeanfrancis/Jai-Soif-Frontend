<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Controller: Home
 *
 * @package    Feowl/Home
 * @author     Feowl Team
 * @copyright  (c) 2012 Feowl Team
 * @license    http://feowl.tumblr.com/
 */     
class Controller_Home extends Controller_Template {
	
	//define the template to use
	public $template = 'template/template.tpl';
	
	public function before(){
		try {
			$this->session = Session::instance();
		} catch(ErrorException $e) {
			session_destroy();
		}
		// Execute parent::before first
		parent::before();
		// Open session
		$this->session = Session::instance();
	}
	
	public function action_index() {
		//instantiate and render the home view on the template
		$this->template->content = View::factory('home/home.tpl');
	}
	
	public function after(){
		// Adds optional stylesheet files in an array
		$this->template->files_stylesheet = array(
			url::base()."assets/css/jquery.qtip.css",	
			url::base()."assets/less/jQRangeSlider.less",	
			url::base()."assets/less/home.less",	
		);

		// Adds optional javascript files in an array
		$this->template->files_javascript = array(	
			url::base()."assets/js/handlebars.js",
			url::base()."assets/js/chroma.min.js",
			url::base()."assets/js/kartograph.min.js",
			url::base()."assets/js/raphael.min.js",
			url::base()."assets/js/jquery-ui.min.js",	
			url::base()."assets/js/jquery.qtip.min.js",				
			url::base()."assets/js/jQAllRangeSliders-min.js",
			url::base()."assets/js/underscore-min.js",
			url::base()."assets/js/global.js",
			url::base()."assets/js/script-explore.js",
		);

		$this->template->active_home = "active";
		
		$alert = $this->session->get_once('alert');
		if(isset($alert)){
			$this->template->alert = $alert;
		}
		
		parent::after();		
	}

} // End Home