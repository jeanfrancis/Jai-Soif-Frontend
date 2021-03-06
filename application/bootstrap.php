<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Chicago');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

// Cookie salt
Cookie::$salt = 'd4qvbJXVCT93T8hAxBFg';


/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'   => '/Frontend',
	'index_file' =>'',
	'errors' => true
));


/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	// 'image'      => MODPATH.'image',      // Image manipulation
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	'rest_client'	=> MODPATH.'rest_client', // Query builder but for REST services
	'auth'       	=> MODPATH.'auth',         // Basic authentication
	'database'   	=> MODPATH.'database',	   // Database access
	//'orm'        	=> MODPATH.'orm',          // Object Relationship Mapping
	'userguide'  	=> MODPATH.'userguide',    // User guide and API documentation
  'smarty'  	 	=> MODPATH.'smarty',	   // Smarty Template Engine
  'i18nget'  	 	=> MODPATH.'i18nget'	   // Retrieve all string to translate
));

/**
 * Current language definition
 */
$lang_uris_supported = array_keys(Kohana::config('multilang.languages.supported'));

// Default value for the cookie is 'en' for English, the first element
$lang = Cookie::get('lang', $lang_uris_supported[0] );
if(!in_array($lang, $lang_uris_supported ) ) {
   // check the allowed languages, and force the default
   $lang = $lang_uris_supported[0];
}
// Set the target language
i18n::lang($lang);


// Defines site descriptions
define("SITE_DESCRIPTION",  __('Feowl empowers local media and their stakeholders with accurate and actionable insights on the electricity supply') );
define("SITE_URL", 			'http://feowl.com');
define("SITE_TITLE",       'Feowl');
define("SITE_TAGS",			__('feowl, foewl, empowers, power, cut, power cut, accurate, accuration, insights, insight, pool, electricity, cameroon, africa, supply') );
define("SITE_FB_ADMIN", 	'686299757');


/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
// Route to the index
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'home',
		'action'     => 'index',
	));
