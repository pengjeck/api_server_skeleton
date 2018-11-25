<?php
/**
 * Created by PhpStorm.
 * User: pengjian05
 * Date: 2018/11/25
 * Time: 17:42
 */

use PHPUnit\Framework\TestCase;

use Skeleton;
class testLogin extends TestCase {
    public function testCase() {
        $obj = new Skeleton\UserLogin();
        try {
            $ret = $obj->run('name', '1afajl');

        } catch (\Exception $e) {

        }

    }
}