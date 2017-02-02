<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Content{
    public $question_id;
    public $title;
    public $owner_name;
    public $score;
    public $creation_date;
    public $link;
    public $is_answered;
    
    function __construct($question_id, $title, $owner_name, $score, $creation_date, $link, $is_answered) {
        $this->question_id = $question_id;
        $this->title = $title;
        $this->owner_name = $owner_name;
        $this->score = $score;
        $this->creation_date = $creation_date;
        $this->link = $link;
        $this->is_answered = $is_answered;
    }
    
    function getQuestion_id() {
        return $this->question_id;
    }

    function getTitle() {
        return $this->title;
    }

    function getOwner_name() {
        return $this->owner_name;
    }

    function getScore() {
        return $this->score;
    }

    function getCreation_date() {
        return $this->creation_date;
    }

    function getLink() {
        return $this->link;
    }

    function getIs_answered() {
        return $this->is_answered;
    }

    function setQuestion_id($question_id) {
        $this->question_id = $question_id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setOwner_name($owner_name) {
        $this->owner_name = $owner_name;
    }

    function setScore($score) {
        $this->score = $score;
    }

    function setCreation_date($creation_date) {
        $this->creation_date = $creation_date;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setIs_answered($is_answered) {
        $this->is_answered = $is_answered;
    }


}
