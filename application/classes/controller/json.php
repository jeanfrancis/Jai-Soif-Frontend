<?php defined('SYSPATH') or die('No direct script access.');
 
/**
 * Controller: Json
 *
 * @package    Feowl/Json
 * @author     Feowl Team
 * @copyright  (c) 2012 Feowl Team
 * @license    http://feowl.tumblr.com/
 */
class Controller_Json extends Controller {
 
   /**
	 * Set auto render to false
	 * @var bool
	 */
	public $auto_render = FALSE;

	
    public function action_index() {
       //do nothing
         
    }


	/**
	 * input array
	 * @return json encoded array
	 */
	public static function action_contribute($json_items) {
		//@todo post the contents to the api
		echo json_encode($json_items);	
	}

	public static function get_reports_page($date_gte, $date_lte, $page = 0, $limit = 15, $area = false) {

		// Builds the API parameters (first, extracts the username and key)
		$params  = Kohana::$config->load("apiauth")->get("default");
		$params += array(
			"happened_at__gte" => $date_gte,
			"happened_at__lte" => $date_lte,
			"format"					 => "json" // Needed temporary
		);

		// Add an area filter
		if($area) $params += array("area" => (int) preg_replace("#/api/v1/areas/(\d)/#i", "$1", $area) );

		// Specify the page size
		$params["limit"] = $limit;
		// Find the current page (that begins to 0)
		$currentPage = $page;
		// Find the offset according the current page size
		$params["offset"] = $currentPage * $params["limit"];
		// Get the reports
		$restClient = REST_Client::instance();
		$rep = $restClient->get("reports/", $params);			
		// Parse the json object
		$body = json_decode($rep->body);
		// Decode the json body and records the agregated objects
		$res = array("list" => $body->objects );
		// Add a current_page parameter
		$res += array("current_page" => $currentPage);			
		// Add a next_page parameter if there is a next page
		if($body->meta->next) $res += array("next_page" => $currentPage+1);

		return $res;
	}

	public function action_area_reports() {

		$date_gte = Arr::get($_GET, 'date_gte');
		$date_lte = Arr::get($_GET, 'date_lte');
		$area 		= Arr::get($_GET, 'area');
		$page 		= 0;

		// To saves every reports
		$reports = array();
		// do while
		do {
			// get the reports from the server to a specified page
			$res = $this::get_reports_page($date_gte, $date_lte, $page, 100, $area);
			// saves the reports
			$reports = array_merge($reports, $res["list"]);
			// and increments the page index		
		  $page++;
		// check if there is a next page
		} while ( isset($res["next_page"])	&& $page < 10 );


 		// Change the content type for JSON
 		$this->response->headers('Content-Type','application/json');
		// Display the content
		$this->response->body(json_encode($reports));

	}

	/**
	 * Display a json string with the reports betweens the given interval
	 * @access	public	  
	 */
	public function action_interval_reports() {

		// Builds the API parameters (first, extracts the username and key)
		$params  = Kohana::$config->load("apiauth")->get("default");
		$params += array(
			"happened_at__gte" => Arr::get($_GET, 'date_gte'),
			"happened_at__lte" => Arr::get($_GET, 'date_lte'),
			"format"					 => "json" // Needed temporary
		);

		$restClient = REST_Client::instance();
		$rep = $restClient->get("reports-aggregation/", $params);		
		/*print"<pre>";
		var_dump($rep);
		print"</pre>";*/
		// Decode the json body and records the agregated objects
		$res = array("agregation" => json_decode($rep->body)->objects );

		// Is the user asking for a list of every reports ?
		if( Arr::get($_GET, 'list', false) ) {
			$res += $this::get_reports_page($params["happened_at__gte"], $params["happened_at__lte"], Arr::get($_GET, 'page', 0));
 		}

 		// Change the content type for JSON
 		$this->response->headers('Content-Type','application/json');
		// Display the content
		$this->response->body(json_encode($res));



		return $res;	
	}
	
	
   
}