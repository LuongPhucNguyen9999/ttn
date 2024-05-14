<?php
class IndexModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function infoItem($arrParam, $option = null)
    {
        if ($option == null) {
            $username = $arrParam['form']['username'];
            $password = md5($arrParam['form']['password']);
            $query[] = "SELECT `u`.`id`, `u`.`username`,`u`.`group_id`,`g`.`group_acp`";
            $query[] = "FROM `user` as `u` LEFT JOIN `group` as `g` on `u`.`group_id` = `g`.`id`";
            $query[] = "WHERE `username` = '$username' AND `password` = '$password'";

            $query = implode(" ", $query);
            $result = $this->fetchRow($query);
            return $result;
        }
    }
}
