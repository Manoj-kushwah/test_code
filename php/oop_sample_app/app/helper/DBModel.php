<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 26/6/19
 * Time: 3:15 PM
 */

abstract class DBModel implements DBModelInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function get($id){
        return null;
    }

    /**
     * @return null
     */
    public function getAll()
    {
        return null;
    }

    public function add($object)
    {
        return null;
    }

    public function addAll($object_arr)
    {
        return null;
    }

    public function remove($id)
    {
        return null;
    }

    public function update($id)
    {
        return null;
    }

    public function __toString()
    {
        return null;
    }
}