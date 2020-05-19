<?php

namespace App;

class Request {
    /**
     * 
     * @return string
     */
    public function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    
    public function getGetData($param) {
        return isset($_GET[$param]) ? $_GET[$param] : null;
    }
    
    public function getPostData($param) {
        return isset($_POST[$param]) ? $_POST[$param] : null;
        
    }
    
    public function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    public function getPost() {
        return empty($_POST)? null : $_POST;
    }
    
    public function addFlash($key, $value) {
        $_SESSION[$key][] = $value;
    }
    
    public function hasFlash($key) {
        return isset($_SESSION[$key]);
    }
    
    public function getFlash($key) {
        $flash = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $flash;
    }
    
    public function getFilesData($param) {
        return isset($_FILES[$param]) ? $_FILES[$param]: null;
    }
    
    public function getSessionData($param) {
        return isset($_SESSION[$param]) ? $_SESSION[$param]: null;
    }
    
    public function setSessionData($key, $value) {
        $_SESSION[$key] = $value;
        return $this;
    }
    
}
