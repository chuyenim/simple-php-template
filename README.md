# Simple PHP template

Very very simple php template class.

Put your template files in 'templates/' folder.

    $template = new Template();
    $template->set('title', 'Hello New');
    $template->set('product', ['id' => 1, 'name' => 'Iphone']);
    $template->render('index.tpl');

    $template->output();
