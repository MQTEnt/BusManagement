<?php
class Controller
{
    public function __construct()
    {

    }
    public function load($controller, $action)
    {
        //set controller
        $controller = strtolower($controller). '_Controller';

        //set action
        $action = strtolower($action) . 'Action';

        //check controller is exist
        if (!file_exists(PATH_APPLICATION . '/controllers/' . $controller . '.php')){
            die ('Have no controller');
        }

        require_once PATH_APPLICATION . '/controllers/' . $controller . '.php';

        //check class is exist
        if (!class_exists($controller)){
            die ('Have no class in '.$controller);
        }

        //intit controller
        $controllerObject = new $controller();

        //check method is existed
        if ( !method_exists($controllerObject, $action)){
            die ('Have no action in class ');
        }

        //get action
        $controllerObject->{$action}();
    }

}
?>
