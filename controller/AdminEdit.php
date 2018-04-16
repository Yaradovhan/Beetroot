<?php

require_once "AdminAController.php";
include "../API/TaskRepo.php";

/**
 * @property TaskRepository taskRepository
 */
class AdminEdit extends AdminAController
{
    /**
     * AdminEdit constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param null $params
     * @return bool|mixed|mysqli_result
     */
    public function execute($params = null)
    {
        $task = new Task();
        $task->setTask($params);

        return $this->taskRepository->updateById($task);
    }

}