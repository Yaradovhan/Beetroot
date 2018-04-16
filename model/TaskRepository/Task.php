<?php

class Task extends ArrayObject
{
    private $id;
    private $text;
    private $img;
    private $date;
    private $done;

    /**
     * Task constructor.
     */
    public function __construct()
    {

    }

    function offsetGet($key) {
        $arr = [$this->id, $this->text];

        if ( array_key_exists($key, $arr) ) {
            return $arr[$key];
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * @param $done
     */
    public function setDone($done)
    {
        $this->done = $done;
    }

    /**
     * @param $data
     */
    public function setTask($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->text = (isset($data['text'])) ? $data['text'] : '';
        $this->img = (isset($data['img'])) ? $data['img'] : '';
        $this->date = (isset($data['date'])) ? $data['date'] : '';
        $this->done = (isset($data['done'])) ? $data['done'] : '';
    }

    /**
     * @return $this
     */
    public function getTask()
    {
//        return $this;
        return ['id' => $this->id, 'text' => $this->text, 'img' => $this->img, 'date' => $this->date, 'done' => $this->done];
    }
}
