<?php
namespace Src\Controllers;

use Slim\Container;
use Illuminate\Database\Query\Builder;
use Src\Models\UserModel;

class UserController
{

    public $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * [getUsers description]
     * @param  [type] $request  [description]
     * @param  [type] $response [description]
     * @param  [type] $args     [description]
     * @return [type]           [description]
     */
    function getUsers($request, $response, $args)
    {
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
    function createUser($request, $response, $args)
    {

        $input = $request->getParsedBody();
        $create = UserModel::create($input);
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode($create));
    }

    function getUser($request, $response, $args)
    {
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode(['test']));
    }

    function updateUser($request, $response, $args)
    {
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode(['Hello']));
    }

    function deleteUser($request, $response, $args)
    {
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode(['Hello']));
    }
}
