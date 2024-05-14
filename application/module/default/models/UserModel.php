<?php
class UserModel extends Model
{
	private $_columns = array('id', 'username', 'password',  'group_id');

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_USER);
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
		$infoObj = Session::get('user');
		// echo '<pre>';
		// print_r($infoObj);
		// echo '</pre>';
		$query[] = "Select DISTINCT `s`.`id`, `s`.`username`, `s`.`mssv`,`s`.`birthday`,`s`.`modified`, `s`.`modified_by`,`k`.`name` as `khoa_name`,`l`.`username` as `lop_name`,`h`.`username` as `hocky_name`";
		$query[] = "From `$this->table` as `u`, `" . TBL_SV . "` as `s`, `" . TBL_KHOA . "` as `k`, `" . TBL_LOP . "` as `l`, `" . TBL_HK . "` as `h`";
		$query[] = "Where `s`.`mssv` = " . $infoObj['info']['username'] . " and `s`.`khoa_id` = `k`.`id` AND `s`.`lop_id` = `l`.`id` AND `s`.`hocky_id` = `h`.`id`";


		if (isset($arrParam['filter_hocky_id']) && $arrParam['filter_hocky_id'] != 'default') {
			$query[] = "AND `s`.`hocky_id` = '" . $arrParam['filter_hocky_id'] . "' ";
		}

		$query = implode(" ", $query);
		$result = $this->fetchAll($query);
		return $result;
	}


	public function infoItem($arrParam, $option = null)
	{
		if ($option == null) {
			$query[] = "SELECT `s`.`id`, `s`.`username`, `s`.`mssv`, `s`.`birthday`,`s`.`khoa_id`,`s`.`lop_id`,`s`.`hocky_id`,`s`.`s1`,`s`.`s2`,`s`.`s3`,`s`.`s4`,`s`.`s5`,`s`.`s6`,`s`.`s7`,`s`.`s8`,`s`.`s9`,`s`.`s10`,`s`.`s11`,`s`.`s12`,`s`.`s13`,`s`.`s14`,`s`.`s15`,`s`.`s16`,`s`.`s17`,`s`.`s18`,`s`.`s19`,`s`.`s20`,`s`.`s21`,`s`.`s22`,`s`.`s23`,`s`.`s24`,`s`.`s25`,`s`.`s26`";
			$query[] = "FROM `$this->table` as `u`,`" . TBL_SV . "` as `s`,`" . TBL_KHOA . "` as `k`, `" . TBL_LOP . "` as `l`, `" . TBL_HK . "` as `h`";
			$query[] = "WHERE `s`.`id` = '" . $arrParam['id'] . "'  and `s`.`khoa_id` = `k`.`id` AND `s`.`lop_id` = `l`.`id` AND `s`.`hocky_id` = `h`.`id`";
			$query = implode(" ", $query);
			$result = $this->fetchRow($query);
			return $result;
		}
	}
}
