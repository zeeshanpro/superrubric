<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common extends CI_Model{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		
	}
	//........................................................	
	function adminlogin($username,$password,$role)
	{
		
			$datauser 		= array();
			$datacheck 		= array();
            
			$datacheck['admin_name'] = $username;
			$datacheck['admin_password'] = MD5($password);
			$this->db->where_in('admin_userrole',$role);
			$val = $this->generalmodel->get_by_condition('admin',$datacheck);
            if(count($val)>0)
            {
                
                foreach ($val as $recs => $res) 
                {
                    $isadmitrue = FALSE;
					
					if($res['admin_userrole']==1)
                    {
                       $isadmitrue = TRUE;
                    }


                      $datauser = array(
                                  'admin_id' => $res['admin_id'],
                                  'admin_name' => $res['admin_name'],
                                  'is_admin_login' => $isadmitrue,
                                  'admin_userrole'   => $res['admin_userrole'],
                                  'admin_logged_in'   => TRUE,
                                  'admin_email'   => $res['admin_email'] 
                              );


                 }
                 
                 
				$this->session->set_userdata($datauser);
				return TRUE;
             }
             else
             {
                  $this->session->set_userdata($datauser);
                  return FALSE;
             }
	}
	
	 
}
?>
