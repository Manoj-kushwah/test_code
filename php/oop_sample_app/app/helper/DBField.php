<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 26/6/19
 * Time: 5:14 PM
 */

class DBField
{
    const TYPE_VARCHAR = 0;
    const TYPE_INT = 1;
    const TYPE_TEXT = 2;
    const TYPE_DATE = 3;

    const INDEX_PRIMARY = 0;
    const INDEX_UNIQUE = 1;
    const INDEX_SPACIAL = 2;
    const INDEX = 3;
    const INDEX_FULLTEXT = 4;

    const DEFAULT_NULL = "NULL";
    const DEFAULT_CURRENT_TIMESTAMP = "CURRENT_TIMESTAMP";

    const AUTO_INCREMENT = 0;

    protected $name;
    protected $type;
    protected $length;
    protected $default;
    protected $incremental;
    protected $index;
    protected $nullAble;

    public function __construct()
    {
    }

    public function Name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function Type($type)
    {
        $this->type = $type;
        return $this;
    }

    public function Length($length)
    {
        $this->length = $length;
        return $this;
    }

    public function DefaultValue($default)
    {
        $this->default = $default;
        return $this;
    }

    public function Incremental()
    {
        $this->incremental = self::AUTO_INCREMENT;
        return $this;
    }

    public function Index($index)
    {
        $this->index = $index;
        return $this;
    }

    public function NullAble()
    {
        $this->nullAble = self::DEFAULT_NULL;
        return $this;
    }

    public function toQuery()
    {
        $str = "";
        if (isset($this->name)) {
            $str = $str." `$this->name`";
        }
        if (isset($this->type)) {
            switch ($this->type){
                case self::TYPE_VARCHAR:
                    $str = $str." VARCHAR($this->length)";
                    break;
                case self::TYPE_INT:
                    $str = $str." INT($this->length)";
                    break;
                case self::TYPE_TEXT:
                    $str = $str." TEXT";
                    break;
                case self::TYPE_DATE:
                    $str = $str." DATE";
                    break;
                default :
                    $str = $str." INT($this->length)";
            }
        }
        if (isset($this->nullAble)) {
            $str = $str."  NULL";
        } else {
            $str = $str." NOT NULL";
        }
        if (isset($this->default)) {
            switch ($this->default) {
                case self::DEFAULT_NULL:
                    $str = $str." DEFAULT NULL";
                    break;
                case self::DEFAULT_CURRENT_TIMESTAMP:
                    $str = $str." DEFAULT CURRENT_TIMESTAMP";
                    break;
                default :
                    $str = $str." DEFAULT $this->default";
            }
        }
        if (isset($this->incremental)) {
            $str = $str." AUTO_INCREMENT";
        }
        if (isset($this->index)) {
            switch ($this->index) {
                case self::INDEX_PRIMARY:
                    $str = $str." AFTER `name`, ADD PRIMARY KEY (`$this->name`($this->length))";
                    break;
                case self::INDEX_UNIQUE:
                    $str = $str." AFTER `name`, ADD UNIQUE `$this->name` (`$this->name`($this->length))";
                    break;
                case self::INDEX_FULLTEXT:
                    $str = $str." AFTER `name`, ADD FULLTEXT `$this->name` (`$this->name`($this->length));";
                    break;
                case self::INDEX_SPACIAL:
                    $str = $str." AFTER `name`, ADD SPATIAL `$this->name` (`$this->name`($this->length));";
                    break;
                case self::INDEX:
                    $str = $str." AFTER `name`, ADD INDEX `$this->name` (`$this->name`($this->length));";
                    break;
            }
        }
        return $str;
    }

    public function __toString()
    {
        return $this->toQuery();
    }
}