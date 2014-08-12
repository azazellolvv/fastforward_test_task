<?php

namespace FastForward\ManageBundle\Tools;


/**
 * Description of tools for work via REST with authors entity
 *
 * @author azazello
 */
class toolsAuthors extends restAPITools {
    
    
    /**
     * Prepare data taken from REST API
     * 
     * @param type $list
     * 
     */
    protected function prepareData($list) {                
        
        $selected_data = $this->selectData($list['data']['values']);
        
        foreach ($selected_data as $key => $value) {
            
            $value['books'] = $this->convertArToSt($value['books']);
            $value['tags'] = $this->convertArToSt($value['tags']);
            $value['updated'] = date('Y-m-d H:i:s', $value['updated']);
            $selected_data[$key] = $value;
        }
        
        return $selected_data;
    }
    
    protected function getFieldList() {
        
        return array('id', 'updated', 'firstName', 'lastName', 'middleName', 'namePrefix', 'nameSuffix', 'bio', 'books', 'tags');
        
    }
}
