<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24/6/19
 * Time: 4:12 PM
 */


class TemplateView
{
    protected $file;
    protected $values;

    public function __construct($url, $data = array())
    {
        $this->setFile($url);
        $this->setValues($data);
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return TemplateView
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $values
     * @return TemplateView
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return TemplateView
     */
    public function set($key, $value) {
        try {
            $this->values[$key] = $value;
        } catch (Exception $e) {
            $e->getMessage();
        }
        return $this;
    }

    /**
     * @return string template
     */
    public function output() {
//        echo "<script>console.log('output template :-> $this->file');</script>";
        if (!file_exists($this->file)) {
            return "Error loading template file ($this->file).";
        }
        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}