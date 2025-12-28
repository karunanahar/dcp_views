<?php 

// New Update : 11-09-2021 : due to issue in creating tokos from backend in customer product controller



// Usage : This controller creates a tokos file in the application



defined('BASEPATH') OR exit('No direct script access allowed');

class Tokos extends Admin_Controller 

{

	public function __construct()

	{

		parent::__construct();

		$this->load->helper('lang_translate');    	

    	$this->load->model('Common_model');

    	$this->load->helper('timeAgo');   
    	
    	$this->load->library('Class_Amort'); 

	}


	public function get_comment_date($user_id,$loan_id,$loan_type){

	    $this->db->order_by('comment_id','desc');

		$commentdata = $this->db->get_where('tbl_decision_comment',array('loan_id' => $loan_id ,'user_id' => $user_id,'loan_type' =>$loan_type ))->row_array();



		if($commentdata['comment_date'])

	       $date = date("d-m-Y H:i:s",strtotime($commentdata['comment_date'])) ;

		else

		   $date = "" ;

		   

		 return $date;

	}


    public function get_placeur_name($user_id){
        
        $sql="SELECT user_name FROM `tbl_user` where id='".$user_id."'";
        
        $name  =  $this->db->query($sql)->result_array();
        
       return $name[0]['user_name'];
       
    }
    
        public function get_company_fcub2($loan_id){
        
        $sql1="SELECT company_id FROM `tbl_credit_conventionnes_applicationloan` where loan_id='".$loan_id."'";
        
        $name1  =  $this->db->query($sql1)->result_array();
        
        $company_id= $name1[0]['company_id']; 
        
        $sql="SELECT code_fcub FROM `tbl_portfolio` where company_id='".$company_id."'";
        
        $name  =  $this->db->query($sql)->result_array();
        
        return $name[0]['code_fcub'];
    }
    


	// New update : 11 sept 2021

	public function create(){



		$this->data['page'] = 'Tokos Report';

        //Gopal Changes 14-Dec-2025	
    	//$content = "ID Client;Numero de pret Digital Credit;Code Produit;Categorie de pret Flexcube;Nominal du Pret;Date Accord;Date de Realisation;Nombre Echeance;Unite Echeance;Frequence par Unite Echeance;Date de Premiere Echeance;Numero composante principale;Numero composante Interets;Numero composante TVA;Numero composante CSS;Taux Interet Fixe;Code Bareme de Assurance;Code Autorisation;Valeur RG;Frais De Dossier HT;Nom Exploitant;TEG;Code Pret FCUB"."\r\n";
        $content = "ID Client;Numero de pret Digital Credit;Code Produit;Categorie de pret Flexcube;Nominal du Pret;Date Accord;Date de Realisation;Nombre Echeance;Unite Echeance;Frequence par Unite Echeance;Date de Premiere Echeance;Numero composante principale;Numero composante Interets;Numero composante TVA;Numero composante CSS;Taux Interet Fixe;Code Bareme de Assurance;Code Autorisation;Valeur RG;Frais De Dossier HT"."\r\n";
        //Gopal Changes 14-Dec-2025
       
		echo "Extract Data from ".$tdate=DATE;

		$file_name =  "Application Date. ".$tdate.".txt";
		mkdir(FCPATH . "/upload_data/App_Date".$tdate, 0777, true);
		

 		// All applications

		$this->db->order_by('comment_date');
		$this->db->group_by('loan_id,loan_type');
		$this->db->where('date(comment_date)',$tdate);
//  		$this->db->where('loan_type','credit_conso');
//  		$this->db->or_where('loan_type','credit_confort');
//  		$this->db->or_where('loan_type','credit_scolair');
//  		$this->db->or_where('loan_type','pp_scolair');

		$applications  =  $this->db->get_where('tbl_all_applications',array('status' => "1"))->result_array();

//	echo $this->db->last_query(); die;
		$user_app= array();

		foreach($applications  as $app)
		{
			if($app['loan_type'] == "credit_conso")
			{
				$table_name=  'tbl_credit_conso_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_confort")
			{
				$table_name= 'tbl_credit_confort_applicationloan  as g';
			}
			else if($app['loan_type'] == "pp_scolair")
			{
				$table_name= 'tbl_pp_scolair_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_scolair"){

			    $table_name= 'tbl_credit_scolair_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_express"){

			    $table_name= 'tbl_credit_express_applicationloan  as g';
			}
			
			else if($app['loan_type'] == "credit_prive"){

			    $table_name= 'tbl_credit_prive_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_sans_garantie"){

			    $table_name= 'tbl_credit_sans_garantie_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_conventionnes"){

			    $table_name= 'tbl_credit_conventionnes_applicationloan  as g';
			}	else if($app['loan_type'] == "credit_prive_avec_caution"){

			    $table_name= 'tbl_credit_prive_avec_caution_applicationloan  as g';
			    
			}	else if($app['loan_type'] == "credit_prive_avec_gageespece"){

			    $table_name= 'tbl_cp_gage_espece_applicationloan  as g';
			
			    
			}else if($app['loan_type'] == "onero_secteur"){

			    $table_name= 'tbl_onero_secteur_applicationloan  as g';
			
			    
			}else if($app['loan_type'] == "credit_dero"){

			   // $table_name= 'tbl_credit_dero_applicationloan  as g';
			}
			else if($app['loan_type'] == "onero_sans_garantie"){

			    $table_name= 'tbl_onero_sans_garantie_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_aux"){

			    $table_name= 'tbl_credit_aux_applicationloan  as g';
			}
			else if($app['loan_type'] == "onero_retraite"){

			    $table_name= 'tbl_onero_retraite_applicationloan  as g';
			}
            //Gopal Changes 26-Dec-2025	
			$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.frais_de_assurance,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,u.department,g.customer_type,g.final_status,g.final_disburse_date,g.disbursed_by,g.loan_id_temp,g.frais_de_dossier,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.value_rg,u.user_name,u.exploitent,at.*');
            //Gopal Changes 26-Dec-2025	
			$this->db->from($table_name);

			$this->db->join('consumer_amortization as at','at.applicationform_id = g.loan_id_temp','left');

			$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');

			$this->db->join('tbl_user as u','u.id = g.user_id','left');

			$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');

            $this->db->where('g.loan_id',$app['loan_id']);

			$this->db->where('g.final_status',"Disbursement");
			
			$this->db->where('g.final_disburse_date',$tdate);

			//$this->db->where('g.deleted','0');
			$result =  $this->db->get()->row_array();

			//echo $this->db->last_query();

// 			print_r($result);
//             die;


			if(!empty($result))

			{

				$customer_data =  json_decode($result['customer_data']);

				$l_whereData =  array('applicationform_id'=>$result['loan_id_temp'],'deleted' => '0');

				$databinding =  $this->Common_model->getRecord('consumer_amortization','',$l_whereData);

				$databindingJson=json_decode($databinding['databinding']);

				$loan_other_data = $this->db->get_where('tbl_temp_consumer_applicationform',array('aid' => $result['loan_id_temp']))->row_array();
				if((($customer_data->cat_employeurs) == "Public Civil 25") || (($customer_data->cat_employeurs) == "Prive 25") || (($customer_data->cat_employeurs) == "Public Corps 25")){

					$loandate= '25';

				}else if((($customer_data->cat_employeurs) == "Prive 20") || (($customer_data->cat_employeurs) == "Autres 20")){

					$loandate='20';

				}

				 else if((($customer_data->cat_employeurs) == "Prive 30") || (($customer_data->cat_employeurs) == "Organisation internationales")){

				 	$loandate='30';

				 }else{

				 	$loandate='30';

				 }

				$loanDate=$databindingJson[0]->years."-".$databindingJson[0]->month."-".$loandate;

				$loan_term = ($loan_other_data['loan_term'] <=9)?'0'.$loan_other_data['loan_term']:$loan_other_data['loan_term'];
                $age= date_diff(date_create($customer_data->dob), date_create('today'))->y;
                //CR-K-1 : 22-Feb-2025
                $insurance_bareme_details = $this->Common_model->get_new_insurance_bareme($age,$loan_other_data['loan_term']);
                $bareme = $insurance_bareme_details['bareme'];
                //CR-K-1 : 22-Feb-2025

				// if($age < 30) 

	   //             $bareme = "38";

	   //         else if($age >=30 && $age <=40)

	   //             $bareme = "39";

	   //         else if($age >=41 && $age <=50)

	   //             $bareme = "40";

	   //         else if($age >=51 && $age <=60)

	   //             $bareme = "41";

	   //         else

	   //             $bareme = "00";
	                
	           //if ($age <= 30) {
                        
            //                      if ($loan_other_data['loan_term'] <= 24) {
            //                   $bareme = "38";
            //                 } else if ($loan_other_data['loan_term'] <= 35) {
            //                   $bareme = "38";
            //                 } else if ($loan_other_data['loan_term'] <= 60) {
            //                   $bareme = "42";
            //                 } else if ($loan_other_data['loan_term'] <= 96) {
            //                   $bareme = "46";
            //                 } else if ($loan_other_data['loan_term'] <= 144){
            //                   $bareme = "50";
            //                 } else{
            //                   $bareme = "54"; 
            //                 }
                      
            //         } else if ($age <= 40) {
            //                  if ($loan_other_data['loan_term'] <= 24) {
            //                   $bareme = "39";
            //                 } else if ($loan_other_data['loan_term'] <= 35) {
            //                   $bareme = "39";
            //                 } else if ($loan_other_data['loan_term'] <= 60) {
            //                   $bareme = "43";
            //                 } else if ($loan_other_data['loan_term'] <= 96) {
            //                   $bareme = "47";
            //                 } else if ($loan_other_data['loan_term'] <= 144){
            //                   $bareme = "51";
            //                 } else{
            //                   $bareme = "55"; 
            //                 }
            //         } else if ($age <= 50) {
            //                 if ($loan_other_data['loan_term'] <= 24) {
            //                   $bareme = "40";
            //                 } else if ($loan_other_data['loan_term'] <= 35) {
            //                   $bareme = "40";
            //                 } else if ($loan_other_data['loan_term'] <= 60) {
            //                   $bareme = "44";
            //                 } else if ($loan_other_data['loan_term'] <= 96) {
            //                   $bareme = "48";
            //                 } else if ($loan_other_data['loan_term'] <= 144){
            //                   $bareme = "52";
            //                 } else{
            //                   $bareme = "56"; 
            //                 }
            //         } else if ($age <= 60) {
            //                 if ($loan_other_data['loan_term'] <= 24) {
            //                   $bareme = "41";
            //                 } else if ($loan_other_data['loan_term'] <= 35) {
            //                   $bareme = "41";
            //                 } else if ($loan_other_data['loan_term'] <= 60) {
            //                   $bareme = "45";
            //                 } else if ($loan_other_data['loan_term'] <= 96) {
            //                   $bareme = "49";
            //                 } else if ($loan_other_data['loan_term'] <= 144){
            //                   $bareme = "53";
            //                 } else{
            //                   $bareme = "57"; 
            //                 }
            //         } else {
            //           $bareme = "0.00";
            //         }
				//print_r($loan_other_data); die;
				if($app['loan_type'] == "credit_conso")
				{
					$file_type = "FETES A LA CARTE";
					$code_fcub='1';
					$cat = "CFETE";
				}
				else if($app['loan_type'] == "credit_confort")
				{
					$file_type = "CREDIT CONFORT";
					$code_fcub='3';
					$cat = "CONFORT";
				}
				else if($app['loan_type']== "pp_scolair")
				{       
					$file_type = "CREDIT SCOLAIRE";
					$code_fcub='12';
					if($loan_other_data['loan_amt'] <= 1000000){
						
						$cat = "CRS";
					}else{
						
						$cat = "CRS";
					}

		        }
		        else if($app['loan_type']== "credit_sans_garantie")
				{       
					$file_type = "CREDIT SANS GARANTIE";
					$cat = "CSG";
					if($loan_other_data['loan_amt'] <= 5000000){
						$code_fcub='15';
					}else{
						$code_fcub='16';
					}

		        }
		        else if($app['loan_type']== "credit_express")
				{       
					$file_type = "EXPRESS";
					$cat = "EXPRESS";
					$code_fcub='21';

		        }
		        
		        else if($app['loan_type']== "credit_prive")
				{       
					$file_type = "CREDIT PRIVE";
                    $code_fcub='6';
					$cat = "CPRG";

		        }
		        else if($app['loan_type'] == "credit_prive_avec_caution")
                {

					$file_type = "CREDIT PRIVE AVEC CAUTION";
                    $code_fcub='4';
					$cat = "CREPRIVCAUT";

				}
				 else if($app['loan_type'] == "credit_prive_avec_gageespece")
                {

					$file_type = "CREDIT PRIVE AVEC GAGE ESPECE";
                    $code_fcub='00';
					$cat = "CREGAGESP";

				}
				 else if($app['loan_type'] == "onero_secteur")
                {

					$file_type = "ONERO SECTEUR PRIVE";
                    $code_fcub='11';
					$cat = "ONEAVGARPRI";
			        
			        if($loan_term <= 12){

					     $bareme = "36";

    			    }else{
    
    			             $bareme = "37";
    
    			    }

				}
				
				 else if($app['loan_type'] == "credit_dero")
                {

					$file_type = "CREDIT DEROGATOIRE";
                    $code_fcub='00';
					$cat = "NONE1";

				}
				else if($app['loan_type'] == "onero_sans_garantie")
                {

					$file_type = "ONERO SANS GARANTIE";

					$cat = "ONESSGARPUB";
					
					if($loan_term <= 18){

					     $code_fcub='02';

    			    }else{
    
    			         $code_fcub='03';
    
    			    }

			        if($loan_term <= 12){

					     $bareme = "36";

    			    }else{
    
    			         $bareme = "37";
    
    			    }

				}
				else if($app['loan_type'] == "credit_aux")
                {

					$file_type = "CREDIT AUX PERSONNEL";
                    $code_fcub='00';
					$cat = "CPSALBICIG";


				}
		        
		        else if($app['loan_type']== "credit_conventionnes")
				{       
					$file_type = "Convention";
					$code_fcub= $this->get_company_fcub2($app['loan_id']);
					$cat = "CRECONV";

		        }
		        else if($app['loan_type'] == "onero_retraite")
                {
					$file_type = "ONERO RETRAITE BICIG";

					$cat = "ONEAGBICIG";

			        if($loan_term <= 18){
					     $code_fcub='06';
    			    }else{
    			         $code_fcub='05';
    			    }
			        if($loan_term <= 12){

					     $bareme = "36";

    			    }else{
    
    			         $bareme = "37";
    
    			    }
				}
		        else{

				    $file_type = "CONGES A LA CARTE";
					$cat = "CAC";
					$code_fcub='02';

				}
				
					if($loan_term <= 24){
						$code_auth = "MLCOURTER";
				    }
				    else{
					    $code_auth = "MLMOYTER";
				    }
				    
				    if($loan_term <= 24){

					    $type1 = "CCTS";

			        }else if($loan_term <= 60){

			            $type1 = "CMSP";

			        }else{
			            $type1 = "CLSP";
			        }

				$reference_numero = substr($customer_data->account_no, 0, 11);
				
				$placeur=$this->get_placeur_name($result['created_by']);
				
				$am=new Class_Amort();
                $insuranceAmount = $result['frais_de_assurance'] ? $result['frais_de_assurance'] : "0";
                $loan_interest =$result['loan_interest'];
                  $vat_on_interest=$result['loan_tax'] ?: '19.25'; 
                  $rt=($loan_interest*(1+$vat_on_interest/100));
                 // '<pre>';echo $rt;
                 //echo $insuranceAmount;
                  $insurance_bareme_details = $this->Common_model->get_new_insurance_bareme($age,$result['loan_term']);
                $insuranceRate = $insurance_bareme_details['insuranceRate'];
                $insuranceAmount=($loan_other_data['loan_amt']*$insuranceRate)/100;
                //echo $insuranceAmount;
               if (($age >= MAX_AGE_INSURANCE_RATE) || $result['loan_term'] >= MAX_LOAN_TERM) { // CR-K-1 : 02-MAR-2025 : constant added and loan term condition added
                        $insuranceAmount = $result['frais_de_assurance'] ? $result['frais_de_assurance'] : "0";
                 }
                $teg=$am->tegcal($result['npmts'],$result['loan_amt'],$result['pmnt'],$rt,$result['frais_de_dossier'],$age,$insuranceAmount);
                 // echo round($teg['tegvalue'],2);
                  
   	        //Gopal Changes 14-Dec-2025
				//$array = array($customer_data->id_client,$result['application_no'],$type1,$cat,$loan_other_data['loan_amt'],date("Y-m-d", strtotime($result['final_disburse_date'])),date("Y-m-d", strtotime($result['created_at'])),$loan_term,"M","1",$loanDate,$customer_data->flexcube_acct,$customer_data->flexcube_acct,$customer_data->flexcube_acct,$customer_data->flexcube_acct,$loan_other_data['loan_interest'],$bareme,$code_auth,sprintf("%02d", $loan_other_data['value_rg'] ? $loan_other_data['value_rg'] : 00),round($result['frais_de_dossier'],0),$placeur,round($teg['tegvalue'],2),$code_fcub);
                $array = array($customer_data->id_client,$result['application_no'],$type1,$cat,$loan_other_data['loan_amt'],date("Y-m-d", strtotime($result['final_disburse_date'])),date("Y-m-d", strtotime($result['created_at'])),$loan_term,"M","1",$loanDate,$customer_data->flexcube_acct,$customer_data->flexcube_acct,$customer_data->flexcube_acct,$customer_data->flexcube_acct,$loan_other_data['loan_interest'],$bareme,$code_auth,sprintf("%02d", $loan_other_data['value_rg'] ? $loan_other_data['value_rg'] : 00),round($result['frais_de_dossier'],0));
            //Gopal Changes 14-Dec-2025    
              

				$content .= implode(';',$array);

			    $content .=PHP_EOL;

				

			}

				

		}

	//	if (!file_exists(FCPATH  . "/upload_data/App_Date".$tdate."/".$file_name)) {

         $fp = fopen(FCPATH  . "/upload_data/App_Date".$tdate."/".$file_name ,"w") or die('Cannot open file');

    		fwrite($fp,$content."\n");

			fclose($fp);

			

			echo "File created";

      //  }



		

	}













}