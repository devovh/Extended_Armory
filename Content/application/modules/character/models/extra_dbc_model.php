<?php

class extra_dbc_model extends CI_Model
{
	private $runtimeCache = array();
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getAchievementInfo($id)
	{
		$query = $this->db->query("	SELECT 
										`extra_data_achievement`.`id`, 
										`extra_data_achievement`.`name`, 
										`extra_data_achievement`.`description`, 
										`extra_data_achievement`.`points`, 
										`extra_data_achievement`.`icon`,  
										`extra_data_icons`.`iconname` 
									FROM `extra_data_achievement` 
									LEFT JOIN `extra_data_icons` ON `extra_data_icons`.`id` = `extra_data_achievement`.`icon` 
									WHERE `extra_data_achievement`.`id` = ? 
									LIMIT 1;", array($id));
		
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result[0];
		}
		
		unset($query);
		
		return false;
	}
}