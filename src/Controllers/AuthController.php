<?php
namespace Src\Controllers;

use Slim\Container;
use Illuminate\Database\Query\Builder;
use Src\Models\UserModel;
use \Firebase\JWT\JWT;

class AuthController
{

    public $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Function to login Api handler
     * @param type $request
     * @param type $response
     * @param type $args
     * @return type
     */
    function login($request, $response, $args)
    {
        $this->container->get('logger')->info("geting all users here...");

        $input = $request->getParsedBody();
        $user = $this->container->db->table('users')->where(['username' => $input['username'], 'password' => $input['password']])->first();
        
        
        // verify email address.
        if (!$user) {
            return $response->withHeader('Content-Type', 'application/json')
                    ->withStatus(200)
                    ->write(json_encode(['error' => true, 'message' => 'These credentials do not match our records.']));
        }

        $settings = $this->container->get('settings'); // get settings array.
        $token = JWT::encode(['id' => $user->id, 'username' => $user->username, 'timestamp' => time()], $settings['jwt']['secret'], "HS256");
        
        // Insert user token into Database
        $this->container->db->table('user_tokens')->insert(
            ['user_id' => $user->id, 'token' => $token, 'created_at' => date('Y-m-d H:i:s')]
        );
        
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode(['token' => $token]));
    }

    function signup($request, $response, $args)
    {
        $this->container->get('logger')->info("geting all users here...");
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode([]));
    }

    function logout($request, $response, $args)
    {
        $this->container->get('logger')->info("geting all users here...");
        $users = $this->container->db->table('users')->get();
        return $response->withHeader('Content-Type', 'application/json')
                ->withStatus(200)
                ->write(json_encode([]));
    }
}
