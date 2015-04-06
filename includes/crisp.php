<?php
class crisp{

    private $_template = array();
    private $_filename = '';
    private $_html = '';

    public function __construct($filename){
        $this->_filename = $filename;
        $this->_html = file_get_contents("templates/{$this->_filename}.html");
    }

    public function set($key, $value){
        $this->_template[$key] = (string) $value;
    }

    public function display(){
        echo $this->_populateTemplate();
    }

    public function HTML(){
        return $this->_populateTemplate();
    }

    private function _populateTemplate(){
        $matches = array();
        preg_match_all('!\{\{(\w+)\}\}!', $this->_html, $matches);
        foreach($matches[0] as $match){
            $temp = str_replace('}}', '', str_replace('{{', '', $match));
            $this->_html = str_replace($match, $this->_template[$temp], $this->_html);
        }
        return $this->_html;
    }

    private function _replaceValue($matches){
        return $this->_template[$matches[1]];
    }

}