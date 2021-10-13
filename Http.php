<?php

    class Http {

        /**
        * render(article/show)
        */
        public static function redirectTo(string $url) {
            header("Location: $url");
            exit();
        }
    }