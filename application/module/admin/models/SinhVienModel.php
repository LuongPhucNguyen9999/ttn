<?php
class SinhVienModel extends Model
{
	private $_columns = array('id', 'username', 'mssv', 'birthday', 'lop_id', 'khoa_id', 'hocky_id', 'modified', 'modified_by', 's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13', 's14', 's15', 's16', 's17', 's18', 's19', 's20', 's21', 's22', 's23', 's24', 's25', 's26');

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_SV);
	}

	public function countItem($arrParam, $option = null)
	{
		$query[] = "Select COUNT('id') as `total`";
		$query[] = "From `$this->table`";
		$query[] = "Where `id` > 0";

		// echo '<pre>';
		// print_r($this->$arrParam['filter_group_id']);
		// echo '</pre>';


		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND (`username` LIKE $keyword )";
		}

		if (isset($arrParam['filter_khoa_id']) && $arrParam['filter_khoa_id'] != 'default') {
			$query[] = "AND `khoa_id` = '" . $arrParam['filter_khoa_id'] . "' ";
		}

		if (isset($arrParam['filter_lop_id']) && $arrParam['filter_lop_id'] != 'default') {
			$query[] = "AND `lop_id` = '" . $arrParam['filter_lop_id'] . "' ";
		}

		if (isset($arrParam['filter_hocky_id']) && $arrParam['filter_hocky_id'] != 'default') {
			$query[] = "AND `hocky_id` = '" . $arrParam['filter_hocky_id'] . "' ";
		}

		$query = implode(" ", $query);
		$result = $this->fetchRow($query);
		return $result['total'];
	}

	public function itemInSelectbox($arrParam, $option = null)
	{
		if ($option == null) {
			$query = "SELECT `id`, `name` FROM `" . TBL_KHOA . "`";
			$result = $this->fetchPairs($query);
			$result = ['default' => "- Select Khoa -"] + $result;
		}
		return $result;
	}

	public function itemInSelectbox2($arrParam, $option = null)
	{
		if ($option == null) {
			$query = "SELECT `id`, `username` FROM `" . TBL_LOP . "`";
			$result = $this->fetchPairs2($query);
			$result = ['default' => "- Select Lop -"] + $result;
		}
		return $result;
	}

	public function itemInSelectbox3($arrParam, $option = null)
	{
		if ($option == null) {
			$query = "SELECT `id`, `username` FROM `" . TBL_HK . "`";
			$result = $this->fetchPairs2($query);
			$result = ['default' => "- Select Hoc Ky -"] + $result;
		}
		return $result;
	}


	public function listItem($arrParam, $option = null)
	{
		$query[] = "Select `s`.`id`, `s`.`username`, `s`.`mssv`,`s`.`birthday`,`s`.`modified`, `s`.`modified_by`,`k`.`name` as `khoa_name`,`l`.`username` as `lop_name`,`h`.`username` as `hocky_name`";
		$query[] = "From `$this->table` as `s`, `" . TBL_KHOA . "` as `k`, `" . TBL_LOP . "` as `l`, `" . TBL_HK . "` as `h`";
		$query[] = "Where `s`.`khoa_id` = `k`.`id` AND `s`.`lop_id` = `l`.`id` AND `s`.`hocky_id` = `h`.`id`";


		if (!empty($arrParam['filter_search'])) {
			$keyword = '"%' . $arrParam['filter_search'] . '%"';
			$query[] = "AND (`s`.`username` LIKE $keyword  or `s`.`mssv` LIKE $keyword or `k`.`name` LIKE $keyword or `l`.`username` LIKE $keyword)";
		}

		if (isset($arrParam['filter_khoa_id']) && $arrParam['filter_khoa_id'] != 'default') {
			$query[] = "AND `s`.`khoa_id` = '" . $arrParam['filter_khoa_id'] . "' ";
		}

		if (isset($arrParam['filter_lop_id']) && $arrParam['filter_lop_id'] != 'default') {
			$query[] = "AND `s`.`lop_id` = '" . $arrParam['filter_lop_id'] . "' ";
		}

		if (isset($arrParam['filter_hocky_id']) && $arrParam['filter_hocky_id'] != 'default') {
			$query[] = "AND `s`.`hocky_id` = '" . $arrParam['filter_hocky_id'] . "' ";
		}

		if (!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])) {
			$column = $arrParam['filter_column'];
			$columnDir = $arrParam['filter_column_dir'];
			$query[] = "ORDER BY `s`.`$column` $columnDir";
		} else {
			$query[] = "ORDER BY `s`.`id` ASC";
		}

		$pagination = $arrParam['pagination'];
		$totalItemsPerPage = $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[] = "LIMIT $position, $totalItemsPerPage";
		}

		$query = implode(" ", $query);
		$result = $this->fetchAll($query);
		return $result;
	}


	public function deleteItem($arrParam, $option = null)
	{
		if ($option == null) {
			if (!empty($arrParam['cid'])) {
				$ids = $this->createWhereDeleteSQL($arrParam['cid']);
				$query = "DELETE FROM `$this->table` WHERE `id` IN ($ids)";
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
			$query[] = "SELECT `s`.`id`, `s`.`username`, `s`.`mssv`, `s`.`birthday`,`s`.`khoa_id`,`s`.`lop_id`,`s`.`hocky_id`,`s`.`s1`,`s`.`s2`,`s`.`s3`,`s`.`s4`,`s`.`s5`,`s`.`s6`,`s`.`s7`,`s`.`s8`,`s`.`s9`,`s`.`s10`,`s`.`s11`,`s`.`s12`,`s`.`s13`,`s`.`s14`,`s`.`s15`,`s`.`s16`,`s`.`s17`,`s`.`s18`,`s`.`s19`,`s`.`s20`,`s`.`s21`,`s`.`s22`,`s`.`s23`,`s`.`s24`,`s`.`s25`,`s`.`s26`";
			$query[] = "FROM `$this->table` as `s`,`" . TBL_KHOA . "` as `k`, `" . TBL_LOP . "` as `l`, `" . TBL_HK . "` as `h`";
			$query[] = "WHERE `s`.`id` = '" . $arrParam['id'] . "'  and `s`.`khoa_id` = `k`.`id` AND `s`.`lop_id` = `l`.`id` AND `s`.`hocky_id` = `h`.`id`";
			$query = implode(" ", $query);
			$result = $this->fetchRow($query);
			return $result;
		}
	}

	public function saveItem($arrParam, $option = null)
	{
		$userObj = Session::get("user");
		$userInfo = $userObj['info'];
		// if ($option['task'] == 'add') {
		// 	$arrParam['form']['created'] = date('Y-m-d', time());
		// 	$arrParam['form']['created_by'] = $userInfo['username'];
		// 	// $arrParam['form']['password'] = md5($arrParam['form']['password']);
		// 	$data = array_intersect_key($arrParam['form'], array_flip($this->_columns));
		// 	$this->insert($data);
		// 	Session::set('message', array('class' => 'success', 'content' => 'Element was inserted successful'));
		// 	return $this->lastID();
		// }

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
