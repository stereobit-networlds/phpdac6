<?php

require_once('skeleton.php');
require_once('cp/dpc2/system/pcntl.lib.php'); 

class sqlparser extends skeleton {	

 var $i, $now;
 
 public function __construct($user,$data=null, $job_id=null, $job_file=null, $job_attr=null, $printer_name=null) {
  
    parent::__construct($user,$data,$job_id,$job_file,$job_attr,$printer_name);
	
	//$this->fp = $import_data;
    //$this->import_data = fread($this->fp, filesize($job_file)); //$import_data;
	//if ($this->fp = fopen($job_file, "r+b"))
	  //$this->import_data = fread($this->fp, filesize($job_file));
	
	//$this->import_data = $import_data;
	$this->jid = $job_id;
	$this->jf = $job_file;
	$this->jattr = (array) $job_attr;
	
	$this->printer_name = $printer_name;
	
	$this->jobs_path = $_SERVER['DOCUMENT_ROOT'] .'/cp/jobs/'.$this->printer_name;		
	$this->admin_path = $_SERVER['DOCUMENT_ROOT'] .'/cp/admin/'.$this->printer_name;

	self::write2disk('sqlparser.log',"\r\nInit\r\n");
	
	$this->i = 9;
	$this->now = date("Y-m-d H:m:s");	
	
 }
 
 //override
 public function execute() {
	//return true;
	if (!$this->import_data) return true; //always true	
	
	
	if (stristr($this->jf, '.jpg')) { //jpg file
	
		//full path csv file (print from win editor)
		if (stristr($jobfile_parts[4], "\\")) { 
			$pathfile = explode("\\", $jobfile_parts[4]);
		    $filename = array_pop($pathfile);
		}
		else
			$filename = $jobfile_parts[4]; //as is	
		
		$this->istextJPG($filename);
	
	}
	elseif (stristr($this->jf, '.csv')) { //csv file
	
	    $jobfile_parts = explode('-', $this->jf);
		
		//full path csv file (print from win editor)
		if (stristr($jobfile_parts[4], "\\")) { 
			$pathfile = explode("\\", $jobfile_parts[4]);
		    $filename = array_pop($pathfile);
		}
		else
			$filename = $jobfile_parts[4]; //as is
	
		$this->istextCSV($filename);	
	}
	else 
		$this->istextSQL();
	
	//$this->export_data = $sqltext;
	return true;	
 }
 
   protected function istextJPG($name=null) {
	   
	    $lines = file($this->jf);
		foreach ($lines as $l=>$line)
			$data[] = trim($line);
			
		$this->export_data = implode('', $data);
		
		self::write2disk('sqlparser.log',"\r\n$name\r\n");
		//self::write2disk('sqlparser.log',$this->export_data);
		//return true;
		
		$bytes = self::_write($this->export_data);
		return ($bytes);
		
		/*$binary = pack("H*", $this->export_data); //hex //hex2bin
		$bytes = self::_write($binary);
		
		return true;*/
   }	   
 
   protected function istextCSV($name=null) {
	
	  $page = &new pcntl('
super rcserver.rcssystem;
load_extension adodb refby _ADODB_; 
super database;
',1);	   
	   
      $db = GetGlobal('db');  
		  
	  $scenario = 'import_' . $name . '.ini';
	  self::write2disk('sqlparser.log', $scenario . "\r\n");
      
      if (file_exists($this->admin_path . '/' . $scenario)) {
		  
		 //CONVERT import data to utf-8  
		 //if (substr($this->import_data,0,4)=='%!PS') //zipped
			//$this->export_data = mb_convert_encoding($this->import_data, 'UTF-8', 'ISO-8859-7');
		 //else
			$this->export_data = mb_convert_encoding($this->import_data, 'UTF-8', 'ISO-8859-7');		  
	   
	     //READ SCENARIO  	   
         $sc = parse_ini_file($this->admin_path . '/' .  $scenario);
		 //self::write2disk('sqlparser.log', print_r($sc, true));
		 
		 $line_delimiter =  "\r\n"; 
         $source = explode($line_delimiter, $this->export_data);

		 $getrec = explode(',',$sc['getrec']);
		 $attrrec = explode(',',$sc['attrrec']);
		 //$passtitles = $sc['titles'] ? false : true; //false when titles exists..make it true after 1 ttime of loop
		 //echo $passtitles;
		 
		 $delimiter = $sc['delimiter'] ? $sc['delimiter'] : ';';
         //echo '>',$delimiter;
		 //$myi = (int) $sc['i'];
		 $i = 0;
		 $ix = 0;			
		 $titlelines = $sc['titles'] ? $sc['titles'] : 0;
		 $mode = trim($sc['mode']);
			  
         foreach ($source as $lineno=>$record) {	
		 
		    if ($lineno >= $titlelines) {
				
				$this->i = $lineno;
					  
                $field = explode($delimiter,$record);
			    if (trim($field[0]))  {
				
                    switch ($mode) {
				  
				      case 'update' : $sSQL = $this->update_cmd($sc,$field,$getrec,$attrrec);
									  if ($sSQL) {
										if ($res = $db->Execute($sSQL,1)) {
											$ix+=1;
											$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ({$this->i},1,'{$this->now}',''," .
											$db->qstr($sSQL) . "," . $db->qstr($this->printer_name) . ")"; 
										}
										else {
											$errormsg .= $sSQL . "\r\n" . $db->error . "\r\n";
											$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ({$this->i},-1,'{$this->now}',".
											$db->qstr(addslashes ($db->error)). ", " . $db->qstr($sSQL) . "," . $db->qstr($this->printer_name) . ")"; 
										}
										$ps = $db->Execute($postSQL,1);	
										//self::write2disk('sqlparser.log', $postSQL);	
									  }					  
					                  break;
				  
                      case 'insert' : $sSQL = $this->insert_cmd($sc,$field,$getrec,$attrrec);
									  if ($sSQL) {
										if ($res = $db->Execute($sSQL,1)) {
											$ix+=1;
											$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ({$this->i},1,'{$this->now}',''," .
													   $db->qstr($sSQL) . "," . $db->qstr($this->printer_name) . ")"; 
										}
										else {
											$errormsg .= $sSQL . "\r\n" . $db->error . "\r\n";
											$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ({$this->i},-1,'{$this->now}',".
														$db->qstr(addslashes ($db->error)). ", " . $db->qstr($sSQL) . "," . $db->qstr($this->printer_name) . ")"; 
										}
										$ps = $db->Execute($postSQL,1);	
										//self::write2disk('sqlparser.log', $postSQL);	
									  }						  
					                  break;
									  
                      default       : //insert first update after (if id-code exists will not be ins)								 
					                  $insSQL = $updSQL = null; //init vars in loop
					                  $insSQL = $this->insert_cmd($sc,$field,$getrec,$attrrec);
									  if (!$res = $db->Execute($insSQL,1)) {
										$updSQL = $this->update_cmd($sc,$field,$getrec,$attrrec);
										$res = $db->Execute($updSQL,1);
									  }
									  
									  $sSQL = $updSQL ? $updSQL : $insSQL;	
									  if ($res) {	
                                        $ix+=1;									  
										$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ({$this->i},1,'{$this->now}',''," .
													$db->qstr($sSQL) . "," . $db->qstr($this->printer_name) . ")"; 
									  }
									  else {
										$errormsg .= $sSQL . "\r\n" . $db->error . "\r\n";
										$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ({$this->i},-1,'{$this->now}',".
												   $db->qstr(addslashes ($db->error)). ", " . $db->qstr($sSQL) . "," . $db->qstr($this->printer_name) . ")"; 
									  }
                                      $ps = $db->Execute($postSQL,1);	
									  //self::write2disk('sqlparser.log', $postSQL);
                    }//switch			  
				  
				    $i+=1;
		
			    }//if trim
            }//if titles				
         }//foreach	
		
		 $msg = "\r\n" . $scenario . " file readed!";
         $msg .= "\r\n" ."Mode:" . $mode;		 
         $msg .= "\r\n" . $i . " records readed!";
		 $msg .= "\r\n" . $ix . " records affercted!";
	 	 $msg .= "\r\n" . "Import done!";	 			
	     $msg .= "\r\n" . '-----------------------Errors';			
	     $msg .= "\r\n" . $errormsg;			 
	  }
	  else 
	    $msg = "\r\n" . "Scenario missing! (" . $scenario . ")" . "\r\n";
		
	  self::write2disk('sqlparser.log', $msg);
			
	  return true; //$msg;	
   }
   
   protected function insert_cmd($sc,$field,$getrec,$attrrec) {
   
         $sSQL = "insert into ". $sc['table'] . " (";
         $sSQL.= $sc['setrec'] . $sc['setrec2'] . ') values (';
		 
	     $datasql = null;
		 foreach ($field as $fid=>$fdata) {
		   //echo $fdata,'+';
		   if (in_array($fid,$getrec))
		     $datasql[] = $fdata;
		 }
		 
		 $datasqltype = null;
		 foreach ($datasql as $fr=>$fd) {
		    if ($attrrec[$fr]=='s')
			  $datasqltype[] = '"' . $this->make_replaces($fd) .'"';//$db->qstr($fd);
			elseif ($attrrec[$fr]=='n')
			  $datasqltype[] = 0 + str_replace($sc['sdecimal'],$sc['tdecimal'],trim($fd));//casting to num  
			elseif ($attrrec[$fr]=='d') //date
			  $datasqltype[] = '"' . $datetime .'"';									  
			else   
			  $datasqltype[] = trim($fd);
		 }  
		 
         $sSQL.= implode(',',$datasqltype); 
		 //echo implode(',',$datasqltype),'<br>';
		 $sSQL.= $this->replace_params($sc['getrec2']);//str_replace('^datetime',"'".$this->datetime."'",$sc['getrec2'])/* . ",'$this->datetime'"*/ . 
		 $sSQL.= ');';   
		 
		 return $sSQL;
   }
   
   protected function update_cmd($sc,$field,$getrec,$attrrec) {
   
         $sSQL = "update " . $sc['table'] . " set ";
         $field_names = explode(',',$sc['setrec']);
         $extra_field_names = explode(',',$sc['setrec2']);
         $extra_field_values = explode(',',$sc['getrec2']);
		 
		 $datasql = null;
		 foreach ($field as $fid=>$fdata) {
		   if (in_array($fid,$getrec))
		     $datasql[] = $fdata;
		 }	
		 
		 $datasqltype = null;
		 foreach ($datasql as $fr=>$fd) {
		    if ($attrrec[$fr]=='s')
			  $datasqltype[] = '"' . $this->make_replaces($fd) .'"';//$db->qstr($fd);
			elseif ($attrrec[$fr]=='n')
			  $datasqltype[] = 0 + str_replace($sc['sdecimal'],$sc['tdecimal'],trim($fd));//casting to num  
			elseif ($attrrec[$fr]=='d') //date
			  $datasqltype[] = '"' . $datetime .'"';									  
			else   
			  $datasqltype[] = trim($fd);
		 }  
								 
		 foreach ($field_names as $fn=>$name) 					 
		   $sqlupdate[] = $name.'='.$datasqltype[$fn];

         $sSQL.= implode(',',$sqlupdate);
								 
		 foreach ($extra_field_names as $fne=>$namee) {
		   $value = $this->replace_params($extra_field_values[$fne], $sc);
		   $sqlupdate2[] = $namee.'='.$value;
		 }
								 
         $sSQL.= implode(',',$sqlupdate2); 	

         $sSQL .= ' where ';
		 
		 $where = explode(',', $sc['where']);
		 foreach ($where as $w=>$wcl) {
			$sSQL .= str_replace(array('eq','gt','lt'), 
			                     array('='.$datasqltype[$w],'>'.$datasqltype[$w],'<'.$datasqltype[$w]), 
								 $wcl); 
		 }
		 
		 $sSQL.= ';';	   
		 
		 return ($sSQL);
   }    
   
   protected function make_replaces($str=null) {
   
     if ($str) {
	   $ret = str_replace('"','\"',trim($str)); 
	   return ($ret);
	 }
	 
	 return null;
   }
   
   protected function replace_params($rec=null, $params=null) {
      if (!$rec) return;
	  if (!empty($params)) {
		  $intI = ($params['i']=='n') ? true : false;
	  }
	  
	  $f = explode(',',$rec);
	  foreach ($f as $i=>$field) {
	    switch ($field) {
		   case '^datetime' : $rf[] = "'" . $this->now . "'"; 
		                      break;
							  
		   case '^i'        : $rf[] = $intI ? $this->i : "'" . $this->i . "'"; 
		                      break;
							  
		   default          : if (is_numeric($field))
		                        $rf[] = $field;
							  elseif ($field)
                                $rf[] = "'" . $field . "'";							  
							  else
                                $rf[] = null;							  
		}
	  }
	  
	  $ret = implode(',',$rf);

	  return $ret;	  
   }   
   
   
 
 
 protected function istextSQL() {
    $i=0;
    $ix=0;
	$now = date("Y-m-d h:m:s");	
	
	//CONVERT import data to utf-8  
	//if (substr($this->import_data,0,4)=='%!PS') //zipped
		//$this->export_data = mb_convert_encoding($this->import_data, 'UTF-8', 'ISO-8859-7');
	//else
		$this->export_data = mb_convert_encoding($this->import_data, 'UTF-8', 'ISO-8859-7');		  
	   	

	$page = &new pcntl('
super rcserver.rcssystem;
load_extension adodb refby _ADODB_; 
super database;
',1);
	 
	$db = GetGlobal('db'); 	

    $tdata = str_replace(array("\r\n", "no rows selected", "rows selected"), array('',';',';') , $this->export_data);
    $sqlarray = explode(";", $tdata);	
	
	set_time_limit(0);	
    foreach ($sqlarray as $s=>$sqlstatement) {
		
		$runSQL = trim($sqlstatement);
		
		if ((stristr($runSQL,'insert')) || (stristr($runSQL,'update')) ||
		    (stristr($runSQL,'delete ')) || (stristr($runSQL,'select'))) {
				
			if ($res = $db->Execute($runSQL,1)) {
				$ix+=1;
				$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ($i,1,'$now',''," .
				            $db->qstr($runSQL) . "," . $db->qstr($this->printer_name) . ")"; 
			}
			else 
				$postSQL = "insert into syncsql (fid,status,execdate,sqlres,sqlquery,reference) values ($i,-1,'$now',".
				           $db->qstr(addslashes ($db->error)). ", " . $db->qstr($runSQL) . "," . $db->qstr($this->printer_name) . ")"; 
		
			$ps = $db->Execute($postSQL,1);	
			self::write2disk('sqlparser.log', $postSQL);
		}	
		
		$i+=1;
	}	
	set_time_limit(ini_get('max_execution_time'));	//return to default
	
	return true;	
 }

  function parseTextForEmail($text=null) {
  
    $text = $text ? $text : $this->import_data;
	
	//alternative ?
	//preg_match_all(‘/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi’, $text, $matches);
    //var_dump($matches);
  
	$email = array();
	$invalid_email = array();
 
	$text = ereg_replace("[^A-Za-z._0-9@ ]"," ",$text);
 
	$token = trim(strtok($text, " "));
 
	while($token !== "") {
 
		if(strpos($token, "@") !== false) {
 
			$token = ereg_replace("[^A-Za-z._0-9@]","", $token);
 
			//checking to see if this is a valid email address
			if(self::is_valid_email($email) !== true) {
				$email[] = strtolower($token);
			}
			else {
				$invalid_email[] = strtolower($token);
			}
		}
 
		$token = trim(strtok(" "));
	}
 
	$email = array_unique($email);
	$invalid_email = array_unique($invalid_email);
 
	return array("valid_email"=>$email, "invalid_email" => $invalid_email);
 
  }
 
  function is_valid_email($email) {
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$",$email)) return true;
	else return false;
  }
  
  function sendmail($to=null) {
       
	    $to = $to ? $to : 'b.alexiou@stereobit.gr';
  
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= 'From: balexiou@stereobit.com' . "\r\n" .
                                    'Reply-To: balexiou@stereobit.com' . "\r\n" .
                                    'IPP-Printer: 1.0-/' . phpversion();						
						$ret = mail($to,'send you a mail', 'hey, how are you?', $headers);
						
	return ($ret);					
  }
 
  //var_dump(parseTextForEmail($text)); 
}
?>