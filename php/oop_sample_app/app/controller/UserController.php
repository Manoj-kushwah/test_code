<?php
/**
* User controller
*/
class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    function __construct()
	{
//	    $db = DBConnection::getInstance();
//	    var_dump($db->connect());
//	    var_dump($db->getDb()->query("show tables;"));
//	    var_dump($db->close());
	}

    /**
     * @render view for index
     * @return string html
     */
    public function index(){
        $user = new User();
        $user->setId(1);
        $user->setName('Manoj kushwah');
        $user->setEmail('manojkushwah@gmail.com');
        $user->setGender('male');
        $user->setRole('admin');
        $temp = new TemplateView(APP_DIR_PATH."/views/user.html");
        $temp->setValues($user->toArray())->set('test', 123);
//	    print_r($temp->setValues($user->toArray())->set('test', 123));
        return $temp->output();
    }

    /**
     * @render view for data
     * @return string json
     */
    public function data(){
        $user = new User();
        $user->setId(1);
        $user->setName('Manoj kushwah');
        $user->setEmail('manojkushwah@gmail.com');
        $user->setGender('male');
        $user->setRole('admin');
//        $temp = new TemplateView(APP_DIR."/views/user.html");
//        $temp->setValues($user->toArray())->set('test', 123);
//	    print_r($temp->setValues($user->toArray())->set('test', 123));
        header('Content-Type: application/json');
        return json_encode($user->toArray());
    }
}