<?php
class Bootstrap
{
	private $_params;
	private $_controllerObject;

	public function init()
	{
		$this->setParam();

		$controllerName = ucfirst($this->_params['controller']) . 'Controller';
		$filePath = MODULE_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';

		if (file_exists($filePath)) {
			$this->loadExistingController($filePath, $controllerName);
			$this->callMethod();
		} else {
			// URL::redirect('default', 'index', 'index');
		}
	}

	// CALL METHOD
	public function callMethod()
	{
		$actionName = $this->_params['action'] . 'Action';
		if (method_exists($this->_controllerObject, $actionName) == true) {
			$module = $this->_params['module'];
			$controller = $this->_params['controller'];
			$action = $this->_params['action'];

			$userInfo = Session::get('user');

			// Session::delete('user');

			$logged = ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time());

			// //MODULE ADMIN
			if ($module == 'admin') {
				if ($logged == true) {
					if ($userInfo['group_acp'] == 1) {
						$this->_controllerObject->$actionName();
					} else {
						URL::redirect('default', 'index', 'login');
					}
				} else {
					$this->callLoginAction($module);
				}
			} else if ($module == 'default') {
				// $this->_controllerObject->$actionName();
				if ($controller == 'user') {
					if ($logged == true) {
						$this->_controllerObject->$actionName();
					} else {
						$this->callLoginAction($module);
					}
				} else {
					$this->_controllerObject->$actionName();
				}
			}
		} else {
			$this->_controllerObject->$actionName();
			// URL::redirect('default', 'index', 'index');
		}
	}

	// SET PARAMS
	public function setParam()
	{
		$this->_params = array_merge($_GET, $_POST);
		$this->_params['module'] = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
		$this->_params['controller'] = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
		$this->_params['action'] = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
	}

	// LOAD EXISTING CONTROLLER
	private function loadExistingController($filePath, $controllerName)
	{
		require_once $filePath;
		$this->_controllerObject = new $controllerName($this->_params);
	}

	private function callLoginAction($module = 'default')
	{
		Session::delete('user');
		require_once(MODULE_PATH . $module . DS . 'controllers' . DS  . 'IndexController.php');
		$indexController = new IndexController($this->_params);
		$indexController->loginAction();
	}

	// ERROR CONTROLLER
	public function _error()
	{
		require_once MODULE_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
		$this->_controllerObject = new ErrorController();
		$this->_controllerObject->setView('default');
		$this->_controllerObject->indexAction();
	}
}
