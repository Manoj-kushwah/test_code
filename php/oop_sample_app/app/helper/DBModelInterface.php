<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 26/6/19
 * Time: 4:53 PM
 */

interface DBModelInterface
{
    public function add($object);
    public function addAll($object_arr);
    public function get($id);
    public function getAll();
    public function remove($id);
    public function update($id);
}