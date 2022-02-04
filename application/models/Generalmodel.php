<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Generalmodel extends CI_Model{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	//........................................................	
	function add($table,$arrInfo)
	{
		$this->db->insert($table, $arrInfo);  
		return $this->db->insert_id();
	}
	//........................................................	
	function update($table,$arrInfo,$arrayCodition)
	{
		$this->db->where($arrayCodition);
		$this->db->set($arrInfo); 
		$this->db->update($table);
		//echo  $this->db->last_query();die;
	}
	function get($table,$order_by = NULL,$asc_desc = NULL,$start = NULL, $length = NULL)
	{	
		$this->db->select('*');
		$this->db->order_by($order_by, $asc_desc); 
		$this->db->limit($length,$start);
		$query=$this->db->get($table);
		//echo  $this->db->last_query(); die;
		
		$list = array();
		
		foreach ($query->result_array() as $row)
		{
			$list[]	=	$row;
		}		
		// Return Array
		return $list;
	}
	//........................................................	
	function get_by_condition($table,$arrayVal)
	{

		$this->db->select('*');
		$this->db->where($arrayVal);                
		$query = $this->db->get($table);
		//echo  $this->db->last_query(); die;
		$list = array();
		
		//echo "<pre>"; print_r($query->result_array()); die;	
		
		foreach ($query->result_array() as $row)
		{
			$list[]	=	$row;
		}		
		// Return Array
			
		return $list;
	}
	//........................................................	
	function get_by_condition_sum($table,$arrayVal,$field)
	{
		$this->db->select_sum($field);
		$this->db->where($arrayVal);                
		//$this->db->order_by($order_by, $asc_desc); 
		//$this->db->limit($length,$start);
		$query=$this->db->get($table);
		//echo  $this->db->last_query();
		$list = array();
		
		foreach ($query->result_array() as $row)
		{
			$list[]	=	$row;
		}		
		// Return Array
		return $list;
	}
	//........................................................	
	function custom_query($query)
	{
		$rs		=	$this->db->query($query);
		$list 	= array();
		//echo  $this->db->last_query();
		foreach ($rs->result_array() as $row)
		{
			 $list[]	=	$row;
		}
				
		return $list; 
	}
	//........................................................	
	function get_by_condition_field($table,$arrayVal,$field,$order_by = NULL,$asc_desc = NULL,$group_by = false)
	{
		$this->db->select($field);    
		$this->db->where($arrayVal);                
		$this->db->order_by($order_by, $asc_desc); 
		if(!empty($group_by))
			$this->db->group_by($group_by);
			
		$query=$this->db->get($table);
		//echo  $this->db->last_query(); die;
		$list = array();
		
		foreach ($query->result_array() as $row)
		{
			$list[]	=	$row;
		}		
		// Return Array
		return $list;
	}

	//..........................................
	
	function normal_join($select,$tblone,$tbltwo,$tbloneid,$tbltowid)
	{
		$this->db->select($select);
		$this->db->from($tblone);
		$this->db->join($tbltwo, $tbloneid.' = '.$tbltowid);
		
		$query = $this->db->get();
		
		// Produces: SELECT * FROM articles JOIN category ON category.id = articles.id
		
		//echo  $this->db->last_query(); die;
		
		$list = array();
		
		foreach ($query->result_array() as $row)
		{
			$list[]	=	$row;
		}		
		// Return Array
		return $list;
 
	}
	
	
	//..........................................
	function join_by_condition($select,$tblone,$tbltwo,$tbloneid,$tbltowid,$where)
	{
		$this->db->select($select); // Select fields from table
		$this->db->from($tblone);  // Select from main table
		
		$this->db->join($tbltwo, $tbloneid.' = '.$tbltowid); // Join with second table and On Condition
		
		$this->db->where($where); // where clause

		$query = $this->db->get();
		
		//echo  $this->db->last_query(); die;
		
		$list = array();
		
		foreach ($query->result_array() as $row)
		{
			$list[]	=	$row;
		}		
		// Return Array
		return $list;
		
	}
	//..........................................
	function delete($table,$arrayVal)
	{
		$this->db->where($arrayVal);
		$this->db->delete($table);
	}
	//..........................................
	
	
	//......return month weeks days hours minutes and secconds (PAST TIME)..................
	function calculate_time($end_time)
	{
		 $startdatetime = strtotime($end_time);
			// calculate the end timestamp
		 $enddatetime = strtotime(date("Y-m-d H:i:s"));
			 // calulate the difference in seconds
		 $difference = $enddatetime - $startdatetime;
		 
			 // hours is the whole number of the division between seconds and SECONDS_PER_HOUR
			$months 		   		= intval($difference / 2592000);
			$monthsReminders 	= intval($difference % 2592000);
			
			$weeks 		   			= intval($monthsReminders / 604800);
			$weeksReminders 	= intval($monthsReminders % 604800);
		
			$days 		   		= intval($weeksReminders / 86400);
			$daysReminders 	= intval($weeksReminders % 86400);
			
			$hoursDiff = intval($daysReminders / 3600);
			 // and the minutes is the remainder
			$minutesDiffRemainder = intval($daysReminders % 3600);
			
			$sDiffRemainder 	= $minutesDiffRemainder / 60;
			$sDiffRemainder1 	= $minutesDiffRemainder % 60;
			
			return array(
							'months' =>str_pad($months,1, "0", STR_PAD_LEFT) ,
							'weeks' =>str_pad($weeks,1, "0", STR_PAD_LEFT) ,
							'days' =>str_pad(intval($days),1, "0", STR_PAD_LEFT)  ,
							'hours' =>str_pad($hoursDiff,2, "0", STR_PAD_LEFT) ,
							'mints' =>str_pad(intval($sDiffRemainder),2, "0", STR_PAD_LEFT)  ,
							'seconds' =>str_pad(intval($sDiffRemainder1),2, "0", STR_PAD_LEFT) 
							);
	}
	//......return month, weeks,days (PAST TIME)..........................
	
	
	public function insertBatch($table, $dataBatch) {
        $this->db->insert_batch($table, $dataBatch);
        return $this->db->affected_rows();
    }
	
	public function update_batch($table, $dataBatch, $colunmName){
		$this->db->update_batch($table, $dataBatch, $colunmName);
		return $this->db->affected_rows();
	}

	function getStudentDataByEmails($emailArray = false)
	{	
		if(!empty($emailArray))
		{
			$table = "rb_users";
			foreach($emailArray as $email)
			{
				$this->db->select("user_id");
				$this->db->where("user_email",$email);
				$this->db->where("user_type",2);
				$query=$this->db->get($table);
				//echo  $this->db->last_query(); die;
				$result = $query->result_array();
				if(!empty($result) && isset($result[0]))
					continue;
				else
				{
					$school_id 		= 0;
					$std_data 		= explode("@",$email);
					$std_name 		= (!empty($std_data) && isset($std_data[0])) ? $std_data[0] : false;
					$domain_name 	= (!empty($std_data) && isset($std_data[1])) ? $std_data[1] : false;
					if(!empty($domain_name))
					{
						$domain_name = explode(".",$domain_name);
						$domain_name =  $domain_name[0];
						
						$school =  $this->get_by_condition('schools',['domain_name' => $domain_name]);
						if($school){
							$school_id = $school[0]['id'];
						}	
					}
				
					$password = $this->randomPassword();
					$data  = [
							'school_id' => $school_id,
							'name' => $std_name,
							'user_email' => $email,
							'user_password' => md5($password),
							'user_type' => 2,
						];
						
						$msg = '<table style="font-family:Calibri,Arial,Helvetica,sans-serif;font-size:14px;" width="600" border="0" cellspacing="0" cellpadding="5">';
						$msg.= '<tbody>';
						$msg.= '<tr>';
						$msg.= '<td colspan="2">';
						$msg.= '<table style="font-family:Calibri,Arial,Helvetica,sans-serif;font-size:14px;margin:auto;" width="580" border="0" cellspacing="0" cellpadding="5">';
						$msg.= '<tbody>';
						$msg.= '<tr>'; 
						$msg.= '<td colspan="2">';
						$msg.= '<p>Dear '. $std_name .',</p>';
						$msg.= "<p>Welcome to Superrubric.</p>";
						$msg.= "<p>Eamil 		: ".$email."</p>";
						$msg.= "<p>Password 	: ".$password."</p>";
						$msg.= '<p><a href="https://www.superrubric.com/home/login" target="_blank">Click here for login</a></p>';
						$msg.= '<p>The Superrubric Team </p>';
						$msg.= '</td></tr>';
						$msg.= '</tbody>';
						$msg.= '</table>';
						$msg.= '</td>';
						$msg.= '</tr>';
						$msg.= '</tbody>';
						$msg.= '</table>';
						
						$headers = "From: Superrubric.com \r\n";
						$headers .= "Reply-To: Superrubric.com \r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

					if($this->add($table,$data)){
					//mail($email,"Superrubric Registration",$msg,$headers);
				}
			}
			}
						
			$this->db->select("GROUP_CONCAT(user_id) AS student_id, GROUP_CONCAT(name) AS student_name,GROUP_CONCAT(user_email) AS student_email");
			$this->db->where_in("user_email",$emailArray);
			$this->db->where("user_type",2);
			$query=$this->db->get($table);
			//echo  $this->db->last_query(); die;
			$result = $query->result_array();
			if(!empty($result) && isset($result[0]))
				return $result[0];
			else
				return false;
		}
		else
		{
			return false;
		}
		
	}
	
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
}
?>
