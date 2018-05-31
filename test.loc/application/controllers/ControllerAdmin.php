<?php

class ControllerAdmin extends Controller
{
	/**
	 * ControllerBlog constructor.
	 */
	public function __construct()
	{
		$this->model = new ModelAdmin();
		$this->view = new ViewAdmin();
	}

	/**
	 * data -> All Articles
	 * view Home
	 */
	public function indexAction()
	{
		$data = $this->model->getPosts();
		$this->view->generate('admin_main_view.php', $data);
	}

	public function addAction()
	{
		$this->view->generate('admin_add_view.php');
	}

	public function changeAction()
	{
		$data = $this->model->getPosts();
		$this->view->generate('admin_change_view.php', $data);
	}

	public function deleteAction()
	{
		$data = $this->model->getPosts();
		$this->view->generate('admin_delete_view.php', $data);
	}
}