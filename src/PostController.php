<?php
    namespace IZNOPS;
          
    class PostController
    {
    
        public function __construct()
        {
    
        }

        public function initializer()
        {
            dd($_POST + $_FILES);
            // dd();

        }
    }