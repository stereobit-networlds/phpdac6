<?php
//namespace LIB\tcp;

class sasl_client_class
{
	/* Public variables */
	var $error='';
	var $mechanism='';
	var $encode_response=1;

	/* Private variables */

	var $driver;
	var $drivers=array(
		"Digest"   => array("digest_sasl_client",   "digest_sasl_client"   ),
		"CRAM-MD5" => array("cram_md5_sasl_client", "cram_md5_sasl_client" ),
		"LOGIN"    => array("login_sasl_client",    "login_sasl_client"    ),
		"NTLM"     => array("ntlm_sasl_client",     "ntlm_sasl_client"     ),
		"PLAIN"    => array("plain_sasl_client",    "plain_sasl_client"    ),
		"Basic"    => array("basic_sasl_client",    'basic_sasl_client')
	);
	var $credentials=array();

	/* Public functions */

	Function SetCredential($key,$value)
	{
		$this->credentials[$key]=$value;
	}

	Function GetCredentials(&$credentials,$defaults,&$interactions)
	{
		Reset($credentials);
		$end=(GetType($key=Key($credentials))!="string");
		for(;!$end;)
		{
			if(!IsSet($this->credentials[$key]))
			{
				if(IsSet($defaults[$key]))
					$credentials[$key]=$defaults[$key];
				else
				{
					$this->error="the requested credential ".$key." is not defined";
					return(SASL_NOMECH);
				}
			}
			else
				$credentials[$key]=$this->credentials[$key];
			Next($credentials);
			$end=(GetType($key=Key($credentials))!="string");
		}
		return(SASL_CONTINUE);
	}
	
	Function Start($mechanisms, &$message, &$interactions)
	{
		if(strlen($this->error))
			return(SASL_FAIL);
		if(IsSet($this->driver))
			return($this->driver->Start($this,$message,$interactions));
		$no_mechanism_error="";
		for($m=0;$m<count($mechanisms);$m++)
		{
			$mechanism=$mechanisms[$m];
			if(IsSet($this->drivers[$mechanism]))
			{
				//if(!class_exists($this->drivers[$mechanism][0]))
					//require_once($this->drivers[$mechanism][1]);
				$drv = '\LIB\tcp\\' . $this->drivers[$mechanism][0];
				$this->driver= new $drv; //$this->drivers[$mechanism][0];//$drv;
				if($this->driver->Initialize($this))
				{
					$this->encode_response=1;
					$status=$this->driver->Start($this,$message,$interactions);
					switch($status)
					{
						case SASL_NOMECH:
							Unset($this->driver);
							if(strlen($no_mechanism_error)==0)
								$no_mechanism_error=$this->error;
							$this->error="";
							break;
						case SASL_CONTINUE:
							$this->mechanism=$mechanism;
							return($status);
						default:
							Unset($this->driver);
							$this->error="";
							return($status);
					}
				}
				else
				{
					Unset($this->driver);
					if(strlen($no_mechanism_error)==0)
						$no_mechanism_error=$this->error;
					$this->error="";
				}
			}
		}
		$this->error=(strlen($no_mechanism_error) ? $no_mechanism_error : "it was not requested any of the authentication mechanisms that are supported");
		return(SASL_NOMECH);
	}

	Function Step($response, &$message, &$interactions)
	{
		if(strlen($this->error))
			return(SASL_FAIL);
		return($this->driver->Step($this,$response,$message,$interactions));
	}

};

?>