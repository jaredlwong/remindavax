<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
    
    protected function _initDojo()
    {
        Zend_Dojo::enableView($this->view);
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewRenderer->setView($this->view);
    }
    
    protected function _initEasyBib() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->addHelperPath('EasyBib/View/Helper', 'EasyBib_View_Helper');
    }
    
    protected function _initRoutes()
    {
        $front = Zend_Controller_Front::getInstance();

        // Get Router
        $router = $front->getRouter();

        $route = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)',
            array(
                'controller' => 'patients',
                'action' => 'profile'
            )
        );
        
        $patientEdit = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/edit',
            array(
                'controller' => 'patients',
                'action' => 'edit'
            )
        );

        $treaments = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/prescriptions',
            array(
                'controller' => 'prescriptions',
                'action' => 'index'
            )
        );
        
        $prescriptionsNew = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/prescriptions/new',
            array(
                'controller' => 'prescriptions',
                'action' => 'new'
            )
        );
        
        $prescriptionsSummary = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/prescriptions/(\d+)',
            array(
                'controller' => 'prescriptions',
                'action' => 'summary'
            )
        );
        
        $prescriptionsEdit = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/prescriptions/(\d+)/edit',
            array(
                'controller' => 'prescriptions',
                'action' => 'edit'
            )
        );
        
        $router->addRoute('patientProfile', $route);
        $router->addRoute('patientEdit', $patientEdit);
        $router->addRoute('treaments', $treaments);
        $router->addRoute('prescriptionsNew', $prescriptionsNew);
        $router->addRoute('prescriptionsSummary', $prescriptionsSummary);
        $router->addRoute('prescriptionsEdit', $prescriptionsEdit);
        
        
        
        //$router->addRoute('schedule', $route2);
        //$router->addRoute('route3', $route2);
    }

}
