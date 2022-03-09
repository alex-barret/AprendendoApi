<?php
namespace MyApp\controlles;
    
    class Home {
        //protected $container;
        protected $view;

        public function __construct($View)
        {
            $this->view = $View;
        }

        public function index($resquest, $response){
            //$view= $this->container->get('View');
            var_dump($this->view);
            return $response->write('Teste index');
        }
    }

?>