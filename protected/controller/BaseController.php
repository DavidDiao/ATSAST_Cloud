<?php

require_once(APP_DIR.'/protected/model/CONFIG.php');

class BaseController extends Controller
{
    public $layout = "layout.html";
    public function init()
    {
        
        if (!session_id()) {
            session_start();
        }

        header("Content-type: text/html; charset=utf-8");
        require(APP_DIR.'/protected/include/functions.php');

        $this->islogin=is_login();
        $users = new Model('users');
        if ($this->islogin) {
            $this->userinfo = $users->find(['uid=:uid', ':uid'=>$_SESSION['uid']]);
        } else {
            $this->userinfo = [];
        }
        $this->EFRDS_DOMAIN=CONFIG::GET('EFRDS_DOMAIN');
        $this->EFRDS_CDN=CONFIG::GET('EFRDS_CDN');
        $this->EFRDS_SALT=CONFIG::GET('EFRDS_SALT');
    }

    public function jump($url, $delay = 0)
    {
        echo "<html><head><meta http-equiv='refresh' content='{$delay};url={$url}'></head><body></body></html>";
        exit;
    }
}
