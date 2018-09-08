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

    public function set($key, $value) {
        $this->vars[$key] = $value;
    }

    public function content() {
        echo $this->content;
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

$template = new Template();
$template->set('title', 'Hello New');
$template->set('product', ['id' => 1, 'name' => 'Iphone']);
$template->render('index.tpl');

$template->output();



