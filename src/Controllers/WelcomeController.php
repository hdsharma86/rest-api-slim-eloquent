<?php

namespace Src\Controllers;
use Slim\Container;
use Illuminate\Database\Query\Builder;

class WelcomeController {
	public $container;
    public function __construct(Container $container){
        $this->container = $container;
    }

    /**
     * [getUsers description]
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @param  [type] $args     [description]
     * @return [type]           [description]
     */
    function index($request,$response,$args){
		$this->container->get('logger')->info("welcome!!!");
        return $response->withHeader('Content-Type', 'application/json')
        				->withStatus(200)
        				->write(json_encode(['Welcome to API world!!!']));
    }

}