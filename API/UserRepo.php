<?php

interface UserRepo
{
    /**
     * @param $task
     * @param $user
     * @return mixed
     */
    public function save($task, $user);

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function updateById($id);
}