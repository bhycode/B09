<?php

require_once 'C:\\xampp\\htdocs\\Brief9\\model\route\modelRoute.php';
require_once 'C:\\xampp\\htdocs\\Brief9\\model\route\routeDAO.php';


class RouteController {

    function getRoutes() {
        $routeDAO = new RouteDAO();
        $routes = $routeDAO->getRoutes();
        include "View\Route.php" ;
    }

    function deleteRoute($routeID) {
        $routeDAO = new RouteDAO();
        $delteResult = $routeDAO->deleteRoute($routeID);
    }




}



?>