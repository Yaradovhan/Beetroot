<?php

require_once 'AdminAController.php';

class AdminLogin extends AdminAController
{
    /**
     * @return mixed|string
     */
    public function execute()
    {
        return $this->render('LoginAdmin', [
            'type' => 'error',
            'text' => 'You were logged out, sorry:)'
        ]);

    }
}
