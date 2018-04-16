<?php

interface TaskRepo
{
    /**
     * @param $task
     * @param $user
     * @return mixed
     */
    public function save($task, $user);

    /**
     * @param $start
     * @param $limit
     * @param $sort
     * @return mixed
     */
    public function getAll($start, $limit, $sort);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * @param $task
     * @return mixed
     */
    public function updateById($task);

}
