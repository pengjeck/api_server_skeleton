<?php
/**
 * Created by PhpStorm.
 * User: pengjian05
 * Date: 2018/11/25
 * Time: 18:33
 */

namespace Skeleton;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require './vendor/autoload.php';

try {
    $app = new App();
    $app->get('login', function (Request $req, Response $res, $args = []) {
        $loginObj = new UserLogin();
        $userName = $req->getAttribute('user_name');
        $passwd = $req->getAttribute('passwd');
        $res = $loginObj->run($userName, $passwd);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    });
    $app->run();
} catch (\Exception $exception) {
    echo json_encode([
                         'errno' => 1,
                         'msg'   => $exception->getMessage(),
                         'data'  => []
                     ]);
}

