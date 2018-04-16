<?php
include 'User.php';

class UserRepository implements UserRepo
{

    public $data = [];
    /**
     * @var ConnectionMySql
     */
    public $connection;

    /**
     * TaskModel constructor.
     */
    public function __construct()
    {
        $this->connection = new ConnectionMySql();
    }

    /**
     * @param $task
     * @param $user
     * @return bool|mysqli_result
     */
    public function save($task, $user)
    {
        $resultSaveUser = mysqli_query($this->connection->getConnection(),
            "INSERT INTO `users`(`name`, `email`) 
                    VALUES ( '" . $user->getName() . "', 
                                '" . $user->getEmail() . "')");
        if ($task) {
            $resultBandleTaksToUser = mysqli_query($this->connection->getConnection(),
                "INSERT INTO `users_tasks` ( user_id, task_id ) 
                        VALUES ((SELECT max(id) FROM users),(SELECT max(id) FROM tasks))");
        }

        return $resultSaveUser;
    }

    /**
     * @return bool|mysqli_result
     */
    public function getAll()
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT id, name, email FROM `users`");

        return $res;
    }

    /**
     * @param $id
     * @return User
     */
    public function getById($id)
    {
        $res = mysqli_query($this->connection->getConnection(), "SELECT u.name, u.email
                                        FROM users u                          
                                        WHERE u.id =  mysql_real_escape_string('$id')");

        return $res;
    }

    /**
     * @param $id
     * @return bool|mysqli_result
     */
    public function deleteById($id)
    {
        $res = mysqli_query($this->connection->getConnection(),
            "DELETE FROM `users` 
                   WHERE id =  mysql_real_escape_string('$id')");

        return $res;
    }

    /**
     * @param $user
     * @return bool|mysqli_result
     */
    public function updateById($user)
    {
        $res = mysqli_query(
            $this->connection->getConnection(),
            "UPDATE tasks 
                    SET name= mysql_real_escape_string('{$user->getName()}') 
                    WHERE id =  mysql_real_escape_string('{$user->getId()}')"
        );

        return $res;
    }

}