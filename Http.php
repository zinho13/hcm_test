<?php

    class Http {

        /**
        * render(Controller/method)
        */
        public static function redirectTo(string $url) {
            header("Location: $url");
            exit();
        }
    }