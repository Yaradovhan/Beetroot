<?php

require_once "AController.php";

class Index extends AController
{
    /**
     * @return string
     */
    public function execute()
    {

        $limit = ConfigApp::MysqlLimit;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };
        $start = ($page - 1) * $limit;

        $sort = null;
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'name') {
                $sort = "name";
            } elseif ($_GET['sort'] == 'email') {
                $sort = "email";
            } elseif ($_GET['sort'] == 'done') {
                $sort = "done";
            }
        }

        $sortParam = null;
        if ($sort) {
            $sortParam = '&sort=' . $sort;
        }
        $taskRepository = new TaskRepository();
        $allTasks = $taskRepository->getAll($start, $limit, $sort);

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'allTask' => $allTasks,
                'sort' => $sortParam
            ]
        );
    }
}
