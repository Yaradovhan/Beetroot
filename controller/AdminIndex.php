<?php

require_once '../model/AdminModel.php';

class AdminIndex extends AdminAController
{
    /**
     * @param null $start
     * @param null $limit
     * @return mixed|string
     */
    public function execute($start = null, $limit = null)
    {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

        $adminModel = new adminModel();
        $bool = $adminModel->isAdmin($name, $pass);
        if($bool){
            $_SESSION['is_admin'] = 1;
        }
        if (!isset($_SESSION['is_admin'])) {

            return $this->render('LoginAdmin', [
                'type' => 'error',
                'text' => 'Log IN, please:)'
            ]);
        } else {
            $repo = new TaskRepository();

            $allTasks = $repo->getAll($start, $limit);

            return $this->render('AdminIndex', [
                'title' => 'Admin User',
                'allData' => $allTasks

            ]);
        }
    }
}
