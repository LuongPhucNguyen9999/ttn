<?php
class IndexController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function noticeAction()
	{
		$this->_view->render('index/notice');
	}

	public function indexAction()
	{
		// echo '<h3>' . __METHOD__ . '</h3>';
		$this->_view->render('index/index');
	}

	public function loginAction()
	{
		$userInfo = Session::get('user');
		if ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()) {
			URL::redirect('default', 'index', 'index');
		}

		$this->_templateObj->setFolderTemplate('default/main/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->render('index/login');
		$this->_view->_title = 'Login';

		echo '<pre>';
		print_r($userInfo);
		echo '</pre>';

		if ($this->_arrParam['form']['token'] > 0) {
			$validate = new Validate($this->_arrParam['form']);
			$username = $this->_arrParam['form']['username'];
			$password = md5($this->_arrParam['form']['password']);
			$query = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
			$validate->addRule('username', 'existRecord', array('database' => $this->_model, 'query' => $query));
			$validate->run();

			if ($validate->isValid() == true) {
				$infoUser = $this->_model->infoItem($this->_arrParam);
				$arraySession = array(
					'login' => true,
					'info' => $infoUser,
					'time' => time(),
					'group_acp' => $infoUser['group_acp']
				);
				Session::set('user', $arraySession);
				URL::redirect('default', 'index', 'index');
			} else {
				$this->_view->errors = $validate->showErrorsPublic();
			}
		}
	}

	public function logoutAction()
	{
		Session::delete('user');
		URL::redirect('default', 'index', 'login');
	}
}
