<?php
class GroupModel extends Model
{
	private $_columns = array('id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status');

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_GROUP);
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

		if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
			$query[] = "AND `status` = '" . $arrParam['filter_state'] . "' ";
		}

		$query   = implode(" ", $query);
		$result  = $this->fetchRow($query);
		return $result['total'];
	}

	public function listItem($arrParam, $option = null)
	{
		$query[] = "Select `id`, `name`, `group_acp`, `status`, `created`, `created_by`, `modified`, `modified_by`";
		$query[] = "From `$this->table`";
		$query[] = "Where `id` > 0";


		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND `name` LIKE $keyword ";
		}

		if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
			$query[] = "AND `status` = '" . $arrParam['filter_state'] . "' ";
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

	public function changeStatus($arrParam, $option = null)
	{
		if ($option['task'] == 'change-ajax-status') {
			$status = ($arrParam['status'] == 0) ? 1 : 0;
			$id		= $arrParam['id'];
			$query	= "UPDATE `$this->table` SET `status`=  $status WHERE `id`='" . $id . "'";
			$this->query($query);
			return  array($id, $status, URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status)));
			Session::set('message', array('class' => 'success', 'content' => '' . $this->affectedRows() . ' element was updated status !'));
		}

		if ($option['task'] == 'change-ajax-group-acp') {
			$group_acp = ($arrParam['group_acp'] == 0) ? 1 : 0;
			$id		= $arrParam['id'];
			$query	= "UPDATE `$this->table` SET `group_acp`=  $group_acp WHERE `id`='" . $id . "'";
			$this->query($query);
			return array($id, $group_acp, URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $group_acp)));
			Session::set('message', array('class' => 'success', 'content' => '' . $this->affectedRows() . ' element was updated group_acp !'));
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
			$query[] = "SELECT `id`, `name`, `group_acp`, `status`";
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
