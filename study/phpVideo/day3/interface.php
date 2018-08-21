<?php
	
	interface A{
        public function run();
        public function walk();
    }

    class B implements A{
        public function run(){
            echo "run method<br/>";
        }
        public function walk(){
            echo "walk method<br/>";
        }
    }

    $b = new B();
    $b->run();
    $b->walk();

?>