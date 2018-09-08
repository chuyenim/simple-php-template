<?php

/****
* $author: Chuyen Nguyen
* @email: chuyenim@gmail.com
*/

class Template {
    public $layout = null;
    public $content = null;
    public $vars = array();
    public $template_dir = 'templates/';

    public function __construct($new_dir = null) {
        if (!is_null($new_dir)) {
            $this->template_dir = $new_dir;
        }
    }

    public function layout($file) {
        extract($this->vars);
        ob_start();
        include($this->template_dir.$file);
        $this->layout = ob_get_clean();
    }

    public function set($key, $value = null) {
        if (is_array($key)) {
            foreach ($key as $item => $value) {
                $this->vars[$item] = $value;
            }
        } else {
            $this->vars[$key] = $value;
        }
    }

    public function content() {
        echo $this->content;
    }

    public function snippet($key) {
        if (isset($this->$key)) {
            return $this->$key;
        }
    }
    
    public function assign($element, $content = null) {
        $this->$element = $content;
    }
    
    public function element($file) {
        if (!file_exists($this->template_dir.$file)) {
            $content = sprintf('The element file %s can not found!', $this->template_dir.$file);
            return $content;
        }
        
        ob_start();
        include($this->template_dir.$file);
        $content = ob_get_clean();
        return $content;
    }

    public function render($file) {
        if (!file_exists($this->template_dir.$file)) {
            die(sprintf('The template file %s can not found!', $this->template_dir.$file));
        }
        extract($this->vars);
        ob_start();
        include($this->template_dir.$file);
        $this->content = ob_get_clean();

        ob_start();
        include($this->template_dir.$file);
        ob_get_clean();
    }
    
    public function output() {
        echo $this->layout;
    }
}


