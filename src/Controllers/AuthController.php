<?php

namespace Src\Controllers;
use Slim\Container;
use Illuminate\Database\Query\Builder;
use Src\Models\UserModel;

class AuthController {

	public $container;
    public function __construct(Container $container){
        $this->container = $container;
    }

    function login($request,$response,$args){
		$this->container->get('logger')->info("geting all users here...");
        return $response->withHeader('Content-Type', 'application/json')
        				->withStatus(200)
        				->write(json_encode([]));
    }

    function signup($request,$response,$args){
        $this->container->get('logger')->info("geting all users here...");
        return $response->withHeader('Content-Type', 'application/json')
                        ->withStatus(200)
                        ->write(json_encode([]));
    }

    function logout($request,$response,$args){
        $this->container->get('logger')->info("geting all users here...");
        $users = $this->container->db->table('users')->get();
        return $response->withHeader('Content-Type', 'application/json')
                        ->withStatus(200)
                        ->write(json_encode([]));
    }
}