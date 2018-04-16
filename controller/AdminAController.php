<?php

abstract class AdminAController
{
    /**
     * @return mixed
     */
    abstract function execute();

    /**
     * @param $file
     * @param $params
     * @return string
     */
    protected function render($file, $params)
    {
        extract($params);
        ob_start();
        include('../view/' . $file . '.php');

        return ob_get_clean();
    }
}