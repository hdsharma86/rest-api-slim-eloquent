<?php

namespace Src\Controllers;
use Slim\Container;
use Illuminate\Database\Query\Builder;
use Src\Models\UserModel;

class UserController {
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
    function getUsers($request,$response,$args){
		$this->container->get('logger')->info("geting all users here...");
		$users = $this->container->db->table('users')->get();
        return $response->withHeader('Content-Type', 'application/json')
        				->withStatus(200)
        				->write(json_encode($users));
    }

    /**
     * [createUser description]
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @param  [type] $args     [description]
     * @return [type]           [description]
     */
    function createUser($request,$response,$args){
       $create = UserModel::create([
            'username' => "test1234",
            'email' => 'test@test123.com',
            'mobile' =>  "9876528433",
            'password' => "MTIzNDU2"
       ]);
       return $response->withHeader('Content-Type', 'application/json')
                        ->withStatus(200)
                        ->write(json_encode($create));
    }

}