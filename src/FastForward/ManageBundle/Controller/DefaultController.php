<?php

namespace FastForward\ManageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormView;
use FastForward\ManageBundle\Tools as Tools;
use FastForward\ManageBundle\Form as form;
use FastForward\ManageBundle\Entity as entity;

class DefaultController extends Controller
{
    
    const URL_LIST = 'http://demo49.ff.net.ua/app_dev.php/authors';

    public function indexAction($object_name) {       
        
        switch ($object_name) {

            case 'authors':
                
                $api_url = 'http://demo49.ff.net.ua/app_dev.php/authors';
                $rest_toools = new Tools\toolsAuthors($api_url);
                $entity = new entity\AuthorsData();
                $form  = $this->createForm(new Form\AuthorsForm(), $entity);                
                break;            
        }
        
        $list = $rest_toools->getDataRange();
        $header_list = $this->createHeaderList($list[0]);
//        var_dump($list);die;
        return $this->render('FastForwardManageBundle:Default:index.html.twig', array('object_name' => $object_name, 'list' => $list, 'header_list' => $header_list, 'form' => $form->createView()));
    }
    
    public function addAction($object_name, $data) {
        
    }
    
    public function updateAction($id, $data) {
        
    }
    
    public function deleteAction($id) {
        
    }
    
    public function getUpdateFrom ($id) {
        
    }
    
    private function createHeaderList($list) {                
                
        $header_list = array();
        foreach ($list as $key => $value) {
            
            $header = '';            
            if (preg_match_all('/[A-Z]/', $key, $matches)) {
                
                $key = ucwords($key);                                               
                $matches = $matches[0];                
                for ($i = 0; $i < count($matches); $i++) {                                       
                    
                    $index = strpos($key, $matches[$i]);
                    if ($i == 0) {
                        $header .= substr($key, 0, $index);
                    }
                    
                    if (isset($matches[$i + 1])) {
                        $length = $index - (strpos($key, $matches[$i + 1]));
                        $item = substr($key, $index, $length);
                    } else {
                        $item = substr($key, $index);
                    }
                    $item = ' '. strtolower($item);                                        
                    
                    $header .= $item;                    
                }
            } else {
                $header = ucwords($key);                
            }
            
            $header_list[] = $header;            
        }
                

        return $header_list;
    }
        
}
