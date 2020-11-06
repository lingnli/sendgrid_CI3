<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Sendgrid_model");

		
	}

	public function index()
	{
				
		// $this->Sendgrid_model->send(); 
		$input = [4,1,3,2];

		$output = array();

		

			for($i=0;$i<count($input);$i++){
				// print_r($i);
				if($i==0){
					//0
					
					$output[$i]=$input[$i];
					
				}else{
				//1,2,3
					
					if($input[$i] < $output[$i-1]){

						// print_r($input[$i]);
					
					// exit;
					$j = $i;
					// print_r($output[$j - 1]);
						while( ($input[$j] - $output[$j-1])<0 && $j>0){
							$temp = $output[$j-1];
							$output[$j-1] = $input[$j];
							$ouput[$j] = $temp;
							$j--;
						}
						print_r($output);
						print_r('換位');exit;

					}else{
						$output[$i]=$input[$i];
					}
					



				}


			


			}
		print_r($output);
		exit;


		$this->load->view('welcome_message');


	}




}	

