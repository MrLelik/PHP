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

	public function loginAction()
	{
		if (isset($_POST) && !empty($_POST)) {
			if ($this->model->validateFormLogin($_POST)) {
				header('Location: /');
			}
		} else {
			$this->model->cleanError();
		}

		$data = $this->model->getErrorMessage();

		$this->view->generate('login_view.php', $data);
	}

	/**
	 * not data
	 *
	 * @Do check POST and validateFormRegister
	 */
	public function registerAction()
	{
		if (isset($_POST) && !empty($_POST)) {
			if ($this->model->validateFormRegister($_POST)) {
				$this->model->trueRegister();
			}
		} else {
			$this->model->cleanError();
		}

		$data = $this->model->getErrorMessage();

		$this->view->generate('register_view.php', $data);
	}

	/**
	 * @Do log out User and destroy session
	 */
	public function logoutAction()
	{
		session_destroy();
		header('Location: /main/login');
	}

    public function searchAction()
    {
        if (isset($_POST) && !empty($_POST)) {
            $data = $this->model->search($_POST);
        }

        $this->view->generate('search_view.php', $data);
    }
}