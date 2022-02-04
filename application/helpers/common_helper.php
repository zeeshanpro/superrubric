<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function GetGradingStatisticsByClassID($classID = false)
{	
	$output = array();
	$cummulative_avg 		= 0;
	$cummulative_average 	= 0;
	$stnd_dev				= 0;
	$perc_weight_total		= 0;
	$stnd_dev_avg 			= 0;
	$perc_weight_total_dev 	= 0;
	if(!empty($classID))
	{
		$CI =& get_instance();
		$CI->load->model("Generalmodel","generalmodel");
		$data = $CI->generalmodel->get_by_condition('rb_grading_scheme',['gradebook_id' => $classID]);
		if(!empty($data))
		{
			foreach($data as $cat)
			{
				if($cat['overall_score_avg'] > "0.00")
				{
					$cummulative_avg 	+= $cat['overall_score_avg'] * ($cat['perc_weight']/100);
					$perc_weight_total += $cat['perc_weight'];
				}
				
				if($cat['overall_score_dev'] > "0.00")
				{
					$stnd_dev_avg 	+= $cat['overall_score_dev'] * ($cat['perc_weight']/100);
					$perc_weight_total_dev += $cat['perc_weight'];
				}									
			}
		}
	}
	if(!empty($cummulative_avg) && !empty($perc_weight_total))
		$cummulative_average = ( $cummulative_avg / $perc_weight_total) * 100;
	
	if(!empty($stnd_dev_avg) && !empty($perc_weight_total_dev))
		$stnd_dev = ( $stnd_dev_avg / $perc_weight_total_dev) * 100;
	
	$output['cum_avg'] 		= number_format($cummulative_average,1);
	$output['stnd_dev'] 	= number_format($stnd_dev,1);
	return $output;
}

function debug($data,$flag = true)
{
	echo "<pre>"; print_r($data); 
	if($flag)
		die;
}
	