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

	/**
	 * @Do Add Article
	 */
	public function addAction()
	{
		if (isset($_POST) && !empty($_POST)) {
			$this->model->addArticle($_POST);
			var_dump($_POST);
			header('Location: /admin/index');
		}
		$this->view->generate('admin_add_view.php');
	}

	/**
	 * @Do All Articles with the button change
	 */
	public function changeAction()
	{
		$data = $this->model->getPosts();
		$this->view->generate('admin_change_view.php', $data);
	}

	/**
	 * @param null $myKey
	 */
	public function deleteAction($myKey = null)
	{
		if (!empty($myKey)) {
			$this->model->deleteArticle($myKey);
			header('Location: /admin/delete');
		}

		$data = $this->model->getPosts();
		$this->view->generate('admin_delete_view.php', $data);
	}

	/**
	 * @param null $myKey
	 * @param null $flag
	 */
	public function roleAction($myKey = null, $flag = null)
	{
		if (!empty($myKey) && !empty($flag)) {
			$this->model->changeRole($myKey, $flag);
			header('Location: /admin/role');
		}

		$data = $this->model->getAllUsers();
		$this->view->generate('admin_role_view.php', $data);
	}

	/**
	 * @param $myKey
	 */
	public function changeoneAction($myKey)
	{
		if (isset($_POST) && !empty($_POST) && !empty($myKey)) {
			$this->model->updateArticle($_POST, $myKey);
			header('Location: /admin/changeone?' . $myKey);
		}

		$data = $this->model->getContentOneNews($myKey);
		$this->view->generate('admin_one_change.php', $data);
	}
}