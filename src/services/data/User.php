<?php
/**
 * Created by PhpStorm.
 * User: pengjian05
 * Date: 2018/11/25
 * Time: 17:22
 */

namespace Skeleton;

class UserTable {
    public function __construct() {
    }

    /**
     * 判断用户是否存在
     * @param $userName
     * @return boolean
     */
    public function userExist($userName) {
        $conn = \DbConn::getConn();
        $statement = "select * from user where user_name='$userName'";
        $ret = $conn->query($statement);
        if ($ret == false) {
            return false;
        } else {
            return true;
        }
    }

    public function canLogin($userName, $passwd) {
       $conn = \DbConn::getConn();
       $statement = "select * from user where user_name='$userName' and passwd='$passwd'";
       $ret = $conn->query($statement);
        if ($ret == false) {
            return false;
        } else {
            return true;
        }
    }
}
