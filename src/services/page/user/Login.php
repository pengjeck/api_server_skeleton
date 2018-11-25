<?php
/**
 * Created by PhpStorm.
 * User: pengjian05
 * Date: 2018/11/25
 * Time: 17:30
 */

namespace Skeleton;

class UserLogin extends PageBase {
    /**
     * @param $userName
     * @param $passwd
     * @return boolean
     * @throws \Exception
     */
    private function checkParam($userName, $passwd) {
        if (empty($userName) || empty($passwd)) {
            throw new \Exception("参数不能为空，请重新输入");
        }
        return true;
    }

    private function checkPermission() {

    }

    /**
     * @param string $userName
     * @param string $passwd hash后的密码
     * @return array
     * @throws \Exception
     */
    public function run($userName, $passwd) {
        $this->checkParam($userName, $passwd);
        $user = new UserTable();
        $ret = $user->userExist($userName);
        if (!$ret) {
            throw new \Exception("用户不存在");
        }

        $ret = $user->canLogin($userName, $passwd);
        if (!$ret) {
            throw new \Exception('密码错误，请重新输入');
        }
        return $this->formatResponse();
    }

    private function formatResponse() {
        return [
            'errno' => 0,
            'msg' => 'success',
            'data' => []
        ];
    }
}