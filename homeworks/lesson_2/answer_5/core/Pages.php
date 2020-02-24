<?php

namespace core;

use \core\Template;

class Pages {

    public static $currentPage;
    private static $pageData = 'index';

    function __construct() {
        
        if(REQUEST_URI == '') {
            $dataFile = 'index';
        } else {
            $dataFile = REQUEST_URI;
        }
        
        if(file_exists(DOCROOT.'/models/'.$dataFile.'.php')) {
            self::$pageData = $dataFile;
        }
        
        $data = include DOCROOT.'/models/'.self::$pageData.'.php';
        Template::$templateName = $data['pageTpl'];

        self::$currentPage = new \stdClass();
        foreach ($data as $name => $data) {
            self::$currentPage->{$name} = $data;
        }
    }

    public function publish() {
        $this->callModule();
    }

    private function callModule() {
        $this->pageMeta();
        $this->pageView();
        $this->pageFooter();
    }

    private function pageMeta() {
        Template::addView('{title}', self::$currentPage->title);
        Template::addView('{h1}', (!empty(self::$currentPage->h1)) ? self::$currentPage->h1 : self::$currentPage->title);
    }

    private function pageView() {
        Template::addElement('{menu}', 'menu');
        Template::addView('{content}', 'index');
        Template::addView('{text}', self::$currentPage->content);        
    }
    
    private function pageFooter() {
        Template::addView('{year}', self::$currentPage->year); 
    }

}
