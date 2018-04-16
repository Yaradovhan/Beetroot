<?php

class AdminModel
{
    /**
     * @param $name
     * @param $pass
     */
    public function isAdmin($name, $pass)
    {

        if ($name && $pass) {
            $conn = new ConnectionMySql();
            $sql = "SELECT * FROM admin WHERE name = '$name' and pass = '$pass'";
            $result = mysqli_query($conn->getConnection(), $sql);
            $count = mysqli_num_rows($result);
            if ($count === 1) {
                $_SESSION['is_admin'] = 1;
            }
        }
    }
}