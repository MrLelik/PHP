<?php

class ControllerMain extends Controller
{
	/**
	 * ControllerBlog constructor.
	 */
	public function __construct()
	{
		$this->model = new ModelMain();
		parent::__construct();
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

	/**
	 * @param $myKey
	 * data -> get One Article
	 * view Single article
	 */
	public function postAction($myKey)
	{
		$data = $this->model->getContentOneNews($myKey);
		$this->view->generate('single_view.php', $data);
	}

	/**
	 * not data
	 * view About
	 */
	public function aboutAction()
	{
		$this->view->generate('about_view.php');
	}

	/**
	 * data -> get One Article
	 * view SamplePost
	 */
	public function oneAction()
	{
		$data = $this->model->getSomeOneNews();
		$this->view->generate('one_view.php', $data);
	}

	/**
	 * not data
	 * view Contact
	 */
	public function contactAction()
	{
		$this->view->generate('contact_view.php');
	}
}