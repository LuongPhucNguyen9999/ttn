<?php
class KhoaController extends Controller
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
		$this->_view->_title = 'Khoa Group :: List';

		$totalItems = $this->_model->countItem($this->_arrParam, null);
		$configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination = new Pagination($totalItems, $this->_pagination);

		$this->_view->Items  = $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('khoa/index');
	}


	public function formAction()
	{
		$this->_view->_title = 'Khoa List : Add';
		if (isset($this->_arrParam['id'])) {
			$this->_view->_title = 'Khoa List : Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect('admin', 'khoa', 'index');
		}
		if ($this->_arrParam['form']['token'] > 0) {
			$validate = new Validate($this->_arrParam['form']);
			$validate->addRule('name', 'string', array('min' => 3, 'max' => 255));
			$validate->run();
			$this->_arrParam['form'] = $validate->getResult();
			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrors();
			} else {
				$task = (isset($this->_arrParam['form']['id'])) ? 'edit' : 'add';
				$id = $this->_model->saveItem($this->_arrParam, array('task' => $task));
				if ($this->_arrParam['type'] == 'save-close') URL::redirect('admin', 'khoa', 'index');
				if ($this->_arrParam['type'] == 'save-new') URL::redirect('admin', 'khoa', 'form');
				if ($this->_arrParam['type'] == 'save') URL::redirect('admin', 'khoa', 'form', array('id' => $id));
			}
		}
		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render('khoa/form');
	}


	//ACTION: TRASH(*)
	public function trashAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', 'khoa', 'index');
	}
}
