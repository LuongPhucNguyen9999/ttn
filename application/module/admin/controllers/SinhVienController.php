<?php
class SinhVienController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}


	public function indexAction()
	{
		$this->_view->_title = 'Student Manager :: List';

		$totalItems = $this->_model->countItem($this->_arrParam, null);
		$configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination = new Pagination($totalItems, $this->_pagination);

		$this->_view->slbKhoa 	= $this->_model->itemInSelectbox($this->_arrParam, null);
		$this->_view->slbLop 	= $this->_model->itemInSelectbox2($this->_arrParam, null);
		$this->_view->slbHocKy 	= $this->_model->itemInSelectbox3($this->_arrParam, null);
		$this->_view->Items 	= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('sinhvien/index');


		// echo '<pre>';
		// print_r($this);
		// echo '</pre>';
	}


	public function formAction()
	{
		$this->_view->_title = 'User : Add';
		$this->_view->slbKhoa = $this->_model->itemInSelectbox($this->_arrParam, null);
		$this->_view->slbLop = $this->_model->itemInSelectbox2($this->_arrParam, null);
		$this->_view->slbHocKy = $this->_model->itemInSelectbox3($this->_arrParam, null);

		if (isset($this->_arrParam['id'])) {
			$this->_view->_title = 'User  : Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect('admin', 'sinhvien', 'index');
		}
		if ($this->_arrParam['form']['token'] > 0) {
			$task = 'add';
			$queryUserName = "SELECT `id` FROM `sinhvien` WHERE `username` = '" . $this->_arrParam['form']['username'] . "'";
			if (isset($this->_arrParam['form']['id'])) {
				$task = 'edit';
				$queryUserName .= "AND `id` <> '" . $this->_arrParam['form']['id'] . "'";
			}
			$validate = new Validate($this->_arrParam['form']);
			$validate->addRule('username', 'string', array('min' => 3, 'max' => 255))
				->addRule('khoa_id', 'status', array('deny' => array('default')))
				->addRule('hocky_id', 'status', array('deny' => array('default')))
				->addRule('lop_id', 'status', array('deny' => array('default')));
			$validate->run();
			$this->_arrParam['form'] = $validate->getResult();
			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrors();
			} else {
				$id = $this->_model->saveItem($this->_arrParam, array('task' => $task));
				if ($this->_arrParam['type'] == 'save-close') URL::redirect('admin', 'sinhvien', 'index');
				if ($this->_arrParam['type'] == 'save') URL::redirect('admin', 'sinhvien', 'form', array('id' => $id));
			}
		}
		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render('sinhvien/form');
	}

	//ACTION: TRASH(*)
	public function trashAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', 'sinhvien', 'index');
	}
}
