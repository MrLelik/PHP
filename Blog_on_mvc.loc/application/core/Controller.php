<?php

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

	/**
	 * data -> All Articles
	 * view Home
	 */
	public function indexAction()
	{
		$data = $this->model->getPosts();
		$this->view->generate('main_view.php', $data);
	}
}
