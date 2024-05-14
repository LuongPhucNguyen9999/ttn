<?php
class UserModel extends Model
{
	private $_columns = array('id', 'username', 'password', 'created', 'created_by', 'modified', 'modified_by', 'status', 'group_id');

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_USER);
	}

	public function countItem($arrParam, $option = null)
	{
		$query[] = "Select COUNT('id') as `total`";
		$query[] = "From `$this->table`";
		$query[] = "Where `id` > 0";



		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND (`username` LIKE $keyword )";
		}

		if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
			$query[] = "AND `status` = '" . $arrParam['filter_state'] . "' ";
		}

		if (isset($arrParam['filter_group_id']) && $arrParam['filter_group_id'] != 'default') {
			$query[] = "AND `group_id` = '" . $arrParam['filter_group_id'] . "' ";
		}

		$query   = implode(" ", $query);
		$result  = $this->fetchRow($query);
		return $result['total'];
	}

	public function itemInSelectbox($arrParam, $option = null)
	{
		if ($option == null) {
			$query = "SELECT `id`, `name` FROM `" . TBL_GROUP . "`";
			$result = $this->fetchPairs($query);
			$result = ['default' => "- Select Group -"] + $result;
		}
		return $result;
	}


	public function listItem($arrParam, $option = null)
	{
		$query[] = "Select `u`.`id`, `u`.`username`, `u`.`status`, `u`.`created`, `u`.`created_by`, `u`.`modified`, `u`.`modified_by`,`g`.`name` as `group_name`";
		$query[] = "From `$this->table` as `u`, `" . TBL_GROUP . "` as `g`";
		$query[] = "Where `u`.`group_id` = `g`.`id` ";


		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND (`username` LIKE $keyword  or `email` LIKE $keyword)";
		}

		if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
			$query[] = "AND `u`.`status` = '" . $arrParam['filter_state'] . "' ";
		}

		if (isset($arrParam['filter_group_id']) && $arrParam['filter_group_id'] != 'default') {
			$query[] = "AND `u`.`group_id` = '" . $arrParam['filter_group_id'] . "' ";
		}

		if (!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])) {
			$column = $arrParam['filter_column'];
			$columnDir = $arrParam['filter_column_dir'];
			$query[] = "ORDER BY `u`.`$column` $columnDir";
		} else {
			$query[] = "ORDER BY `u`.`id` ASC";
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

	public function changeStatus($arrParam, $option = null)
	{
		if ($option['task'] == 'change-ajax-status') {
			$status = ($arrParam['status'] == 0) ? 1 : 0;
			$id		= $arrParam['id'];
			$query	= "UPDATE `$this->table` SET `status`=  $status WHERE `id`='" . $id . "'";
			$this->query($query);
			return  array($id, $status, URL::createLink('admin', 'user', 'ajaxStatus', array('id' => $id, 'status' => $status)));
			Session::set('message', array('class' => 'success', 'content' => '' . $this->affectedRows() . ' element was updated status !'));
		}


		if ($option['task'] == 'change-status') {
			$status = $arrParam['type'];
			if (!empty($arrParam['cid'])) {
				$ids = $this->createWhereDeleteSQL($arrParam['cid']);
				$query	= "UPDATE `$this->table` SET `status`=  $status WHERE `id` IN ($ids)";
				$this->query($query);
				Session::set('message', array('class' => 'success', 'content' => '' . $this->affectedRows() . ' element was updated successful'));
			} else {
				Session::set('message', array('class' => 'error', 'content' => 'Please select elements, you wanna change status'));
			}
		}
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
			$query[] = "SELECT `id`, `username`,`password`,`group_id`, `status`";
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
			$arrParam['form']['password'] = md5($arrParam['form']['password']);
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
