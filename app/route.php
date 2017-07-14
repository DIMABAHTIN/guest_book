<?php

class Route {

    static function start() {
        $action = 'index';

        $req = explode('/', $_SERVER['REQUEST_URI']);

        if(!empty($req[2])) {
            $action = $req[2];
        }

        $controller = new Controller();
        $controller->$action();
    }

}