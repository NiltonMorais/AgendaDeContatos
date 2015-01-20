<?php
/**
 * namespace de localizacao do nosso controller
 */
namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
// import Zend\Db
use Zend\Db\Adapter\Adapter as Adaptador,
    Zend\Db\Sql\Sql;


class HomeController extends AbstractActionController
{
    
    
    
    /**
     * action index
     * @return ZendViewModelViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }
     
    
    public function sobreAction()
    {
        return new ViewModel();
    }

}