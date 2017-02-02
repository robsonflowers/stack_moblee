<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Update{
    public $last_update;
    public $content;
    
    function __construct($last_update, $content) {
        $this->last_update = $last_update;
        $this->content = $content;
    }
    
    function getLast_update() {
        return $this->last_update;
    }

    function getContent() {
        return $this->content;
    }

    function setLast_update($last_update) {
        $this->last_update = $last_update;
    }

    function setContent($content) {
        $this->content = $content;
    }






}
