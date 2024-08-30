<?php
 
    namespace Config;
    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;
    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    // Create a new instance of our RouteCollection class.
    $routes = Services::routes();
   
    // Load the system's routing file first, so that the app and ENVIRONMENT
    // can override as needed.
    if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
        require SYSTEMPATH . 'Config/Routes.php';
    }
   
    /*
     * --------------------------------------------------------------------
     * Router Setup
     * --------------------------------------------------------------------
     */
    $routes->setDefaultNamespace('App\Controllers');
    $routes->setDefaultController('LoginController');
    $routes->setDefaultMethod('index');
    $routes->setTranslateURIDashes(false);
    $routes->set404Override();
    // The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
    // where controller filters or CSRF protection are bypassed.
    // If you don't want to define all routes, please use the Auto Routing (Improved).
    // Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
    //$routes->setAutoRoute(false);
   
    /*
     * --------------------------------------------------------------------
     * Route Definitions
     * --------------------------------------------------------------------
     */
   
    // We get a performance increase by specifying the default
    // route since we don't have to scan directories.
    $routes->get('/', 'LoginController::index',['filter' => 'authenticated']);
    $routes->get('/registration', 'LoginController::registration',['filter' => 'authenticated']);
    $routes->get('LoginController', 'LoginController::index',['filter' => 'authenticated']);
    $routes->get('LoginController/(:segment)', 'LoginController::$1',['filter' => 'authenticated']);
    $routes->match(['post'], '/registration', 'LoginController::registration',['filter' => 'authenticated']);
    $routes->match(['post'], '/login', 'LoginController::index',['filter' => 'authenticated']);
    $routes->get('/logout', 'LoginController::logout');
   
    $routes->group('Main', ['filter'=>'authenticate'], static function($routes){
        $routes->get('', 'Main::index');
        $routes->get('(:segment)', 'Main::$1');
        $routes->get('(:segment)/(:any)', 'Main::$1/$2');
        $routes->match(['post'], 'user_edit/(:num)', 'Main::user_edit/$1');
    });
   
   
   
    /*
     * --------------------------------------------------------------------
     * Additional Routing
     * --------------------------------------------------------------------
     *
     * There will often be times that you need additional routing and you
     * need it to be able to override any defaults in this file. Environment
     * based routes is one such time. require() additional route files here
     * to make that happen.
     *
     * You will have access to the $routes object within that file without
     * needing to reload it.
     */
    if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
        require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
    }    