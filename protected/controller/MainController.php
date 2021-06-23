<?php
class MainController extends BaseController
{
    public function actionIndex()
    {
        if ($this->islogin) {
            $this->jump("{$this->EFRDS_DOMAIN}/cloud/");
        } else {
            $this->jump("{$this->EFRDS_DOMAIN}/account/");
        }
    }
}
