<?php
class UserController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction()
	{

		$this->_view->slbHocKy 	= $this->_model->itemInSelectbox3($this->_arrParam, null);
		$this->_view->Items 	= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('user/index');
	}


	public function formAction()
	{
		$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render('user/form');
	}

	public function inputAction()
	{

		$this->_view->slbKhoa 	= $this->_model->itemInSelectbox($this->_arrParam, null);
		$this->_view->slbLop 	= $this->_model->itemInSelectbox2($this->_arrParam, null);
		$this->_view->slbHocKy 	= $this->_model->itemInSelectbox3($this->_arrParam, null);
		$this->_view->Items 	= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('user/input');
	}
}
