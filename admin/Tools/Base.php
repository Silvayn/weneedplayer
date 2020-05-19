<?php

namespace Tools;

trait Base {
    
    public function getExtract($txt, $max = 25){
        $txt = strip_tags($txt);
        if(strlen($txt) >= $max){
            $txt = substr($txt, 0, $max);
            $result = strrpos($txt, ' ');
            $txt = substr($txt, 0, $result) . '...';
        }
        return $txt;
    }
    
    public function getFrenchDate(\DateTime $date): string {
        setlocale(LC_ALL, 'fr_FR');
        return strftime('%A %d %B %Y', $date->getTimestamp());
    }
    
}