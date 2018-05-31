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
		if (isset($_POST) && !empty($_POST)) {
			$this->model->addArticle($_POST);
			header('Location: /admin/index');
		}
		$this->view->generate('admin_add_view.php');
	}

	public function changeAction()
	{
		$data = $this->model->getPosts();
		$this->view->generate('admin_change_view.php', $data);
	}

	public function deleteAction($myKey = null)
	{
		if (!empty($myKey)) {
			$this->model->deleteArticle($myKey);
			header('Location: /admin/delete');
		}

		$data = $this->model->getPosts();
		$this->view->generate('admin_delete_view.php', $data);
	}

	public function roleAction($myKey = null, $flag = null)
	{
		if (!empty($myKey) && !empty($flag)) {
			$this->model->changeRole($myKey, $flag);
			header('Location: /admin/role');
		}

		$data = $this->model->getAllUsers();
		$this->view->generate('admin_role_view.php', $data);
	}
}