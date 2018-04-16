<?php

class Add extends AController
{
    /**
     * @return string
     */
    public function execute()
    {
        return $this->render('Add', array('title' => 'Add task'));
    }
}
