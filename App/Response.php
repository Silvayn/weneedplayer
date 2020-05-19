<?php

namespace App;

class Response {
    /**
     *
     * @var string
     */
    private $body;
    /**
     *
     * @var array
     */
    private $header = [];
    
    function __construct($body = '', $header = []) {
        $this->body = $body;
        $this->header = $header;
    }

    public function getBody() {
        return $this->body;
    }

    public function getHeader() {
        return $this->header;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

    public function setHeader($header) {
        $this->header = $header;
        return $this;
    }

    public function send() {
        foreach ($this->header as $value) {
            header($value);
        }
        exit($this->body);
    }
    
}
