<?php

namespace FastForward\ManageBundle\Tools;

/**
 * Implement communication with RESR API
 *
 * @author azazello
 */
abstract class restAPITools {
    
    private $api_url = '';
    
    private $field_list = array();
    
    abstract protected function prepareData($list);
    abstract protected function getFieldList();

    public function __construct($api_url) {

        $this->api_url = $api_url;
    }

    public function getDataRange() {
        
        $list = file_get_contents($this->api_url);
        $list = json_decode($list, true);

        return $this->prepareData($list);
    }
    
    public function deleteRow($enttity, $id) {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://demo49.ff.net.ua/app_dev.php/'. $enttity .'/'. $id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        $mes = '';
        if ($result === false) {
            $mes =  'Curl error: ' . curl_error($ch);
        }
        
        return array('suc' => $result, 'mes' => $mes);
    }

    public function addRow($enttity, $data) {
        
        $ch = curl_init('http://demo49.ff.net.ua/app_dev.php/'. $enttity);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('data' => json_encode($data)));       
        $result = curl_exec($ch);
        $mes = '';
        if ($result === false) {
            $mes =  'Curl error: ' . curl_error($ch);
        }
        
        return array('suc' => $result, 'mes' => $mes);
    }

    public function updateRow($enttity, $id, $data) {

        $ch = curl_init('http://demo49.ff.net.ua/app_dev.php/' . $enttity .'/'. $id);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('data' => json_encode($data)));
        $result = curl_exec($ch);
        $mes = '';
        if ($result === false) {
            $mes = 'Curl error: ' . curl_error($ch);
        }

        return array('suc' => $result, 'mes' => $mes);
    }
    
    protected function selectData($data) {
        
        $field_list = $this->getFieldList();
        $sected_data = array();
        
        foreach ($data as $key => $value) {
            foreach ($field_list as $field) {
                $sected_data[$key][$field] = $value[$field];
            }
        }
        
        return $sected_data;
    }
    
    protected function convertArToSt($value) {
        
        $value = (is_array($value) && !empty($value)) ? implode(', ', $value) : '' ;
        
        return $value;
    }

}
