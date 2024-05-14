<?php
class KhoaModel extends Model
{
	private $_columns = array('id', 'name', 'created', 'created_by', 'modified', 'modified_by');

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_KHOA);
	}

	public function countItem($arrParam, $option = null)
	{
		$query[] = "Select COUNT('id') as `total`";
		$query[] = "From `$this->table`";
		$query[] = "Where `id` > 0";


		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND `name` LIKE $keyword ";
		}

		$query   = implode(" ", $query);
		$result  = $this->fetchRow($query);
		return $result['total'];
	}

	public function listItem($arrParam, $option = null)
	{
		$query[] = "Select `id`, `name`, `created`, `created_by`, `modified`, `modified_by`";
		$query[] = "From `$this->table`";
		$query[] = "Where `id` > 0";


		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND `name` LIKE $keyword ";
		}

		if (!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])) {
			$column = $arrParam['filter_column'];
			$columnDir = $arrParam['filter_column_dir'];
			$query[] = "ORDER BY `$column` $columnDir";
		} else {
			$query[] = "ORDER BY `id` ASC";
		}

		$pagination = $arrParam['pagination'];
		$totalItemsPerPage = $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[]  = "LIMIT $position, $totalItemsPerPage";
		}

		$query   = implode(" ", $query);
		$result  = $this->fetchAll($query);
		return $result;
	}


	public function deleteItem($arrParam, $option = null)
	{
		if ($option == null) {
			if (!empty($arrParam['cid'])) {
				$ids = $this->createWhereDeleteSQL($arrParam['cid']);
				$query	= "DELETE FROM `$this->table` WHERE `id` IN ($ids)";
				$this->query($query);
				Session::set('message', array('class' => 'success', 'content' => '' . $this->affectedRows() . ' element was deleted !'));
			} else {
				Session::set('message', array('class' => 'error', 'content' => 'Please select elements, you wanna delete'));
			}
		}
	}

	public function infoItem($arrParam, $option = null)
	{
		if ($option == null) {
			$query[] = "SELECT `id`, `name`";
			$query[] = "FROM `$this->table`";
			$query[] = "WHERE `id` = '" . $arrParam['id'] . "'";
			$query   = implode(" ", $query);
			$result  = $this->fetchRow($query);
			return $result;
		}
	}

	public function saveItem($arrParam, $option = null)
	{
		$userObj = Session::get("user");
		$userInfo = $userObj['info'];
		if ($option['task'] == 'add') {
			$arrParam['form']['created'] = date('Y-m-d', time());
			$arrParam['form']['created_by'] = $userInfo['username'];
			$data = array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$this->insert($data);
			Session::set('message', array('class' => 'success', 'content' => 'Element was inserted successful'));
			return $this->lastID();
		}

		if ($option['task'] == 'edit') {
			$arrParam['form']['modified'] = date('Y-m-d', time());
			$arrParam['form']['modified_by'] = $userInfo['username'];
			$data = array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$this->update($data, array(array('id', $arrParam['form']['id'])));
			Session::set('message', array('class' => 'success', 'content' => 'Element was updated successful'));
			return $arrParam['form']['id'];
		}
	}
}
