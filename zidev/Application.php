<!-- <?php

    class Application {

        public static function process() {
            $controllerName = "User";
            $task = "index";

            if(!empty($_GET['controller'])) {
                // GET = article
                // Article
                $controllerName = ucfirst($_GET['controller']);
            }

            if(!empty($_GET['task'])) {
                $task = $_GET['task'];
            }

            $controllerName = "\controllers\\" . $controllerName;

            $controller = new $controllerName();
            $controller->$task();
        }
    } -->