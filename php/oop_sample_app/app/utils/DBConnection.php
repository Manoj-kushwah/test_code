<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24/6/19
 * Time: 7:12 PM
 */

class DBConnection extends mysqli
{
    /**
     * @var $instance
     */
    protected static $instance;

    /**
     * @return DBConnection
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @var $db
     */
    protected $db;

    /**
     * DBConnection constructor.
     */
    public function __construct()
    {
        // turn of error reporting
        mysqli_report(MYSQLI_REPORT_OFF);

        @parent::__construct(DATABASE_CON["host"], DATABASE_CON["user"], DATABASE_CON["password"], DATABASE_CON["database"], DATABASE_CON["port"]);
        if (mysqli_connect_errno()) {
            Log::error("DBConnection: is not connected.\n".mysqli_connect_error());
        } else {
            Log::debug("DBConnection: is connected.");
        }


//        $this->db = new mysqli();
    }

//    /**
//     * @return DBConnection
//     */
//    public function connect()
//    {
//        try {
//            $this->db->connect(DATABASE_CON["host"], DATABASE_CON["user"], DATABASE_CON["password"], DATABASE_CON["database"], DATABASE_CON["port"]);
//        } catch (Exception $e) {
//            $e->getMessage();
//        }
//        return $this;
//    }

//    /**
//     * @return DBConnection
//     */
//    public function close()
//    {
//        try {
//            $this->db->close();
//        } catch (Exception $e) {
//            $e->getMessage();
//        }
//        return $this;
//    }

//    /**
//     * @return mysqli
//     */
//    public function getDb()
//    {
//        return $this->db;
//    }

//    public function query($query) {
//        if( !$this->real_query($query) ) {
//            Log::error("DBConnection: ".$this->error);
//            throw new exception( $this->error, $this->errno );
//        }
//
//        $result = new mysqli_result($this);
//        return $result;
//    }

    public function prepare($query) {
        $stmt = new mysqli_stmt($this, $query);
        return $stmt;
    }
}