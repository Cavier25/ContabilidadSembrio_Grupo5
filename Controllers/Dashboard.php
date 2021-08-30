<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            parent::__construct();
            
            session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
            getPermisos(1);
        }

        public function dashboard()
        {
            $data['page_id'] = 2;
            $data['tag_tag'] = "Dashboard - Contabilidad";
            $data['page_title'] = "Dashboard - Contabilidad";
            $data['page_name'] = "dashboard";
            $data['page_functions_js'] = "funtions_dashboard.js";
            
            $this->views->getView($this,"dashboard",$data);
        }

    }
?>