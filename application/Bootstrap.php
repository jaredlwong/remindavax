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
            'patients/(\d+)/treatments',
            array(
                'controller' => 'treatments',
                'action' => 'index'
            )
        );
        
        $treatmentsNew = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/treatments/new',
            array(
                'controller' => 'treatments',
                'action' => 'new'
            )
        );
        
        $treatmentsSummary = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/treatments/(\d+)',
            array(
                'controller' => 'treatments',
                'action' => 'summary'
            )
        );
        
        $treatmentsEdit = new Zend_Controller_Router_Route_Regex(
            'patients/(\d+)/treatments/(\d+)/edit',
            array(
                'controller' => 'treatments',
                'action' => 'edit'
            )
        );
        
        $router->addRoute('patientProfile', $route);
        $router->addRoute('patientEdit', $patientEdit);
        $router->addRoute('treaments', $treaments);
        $router->addRoute('treatmentsNew', $treatmentsNew);
        $router->addRoute('treatmentsSummary', $treatmentsSummary);
        $router->addRoute('treatmentsEdit', $treatmentsEdit);
        
        
        
        //$router->addRoute('schedule', $route2);
        //$router->addRoute('route3', $route2);
    }

}
