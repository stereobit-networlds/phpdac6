<?php
/*
 * sasl.php > saslclient for phpdac5 agent
 *
 * @(#) $Id: sasl.php,v 1.11 2005/10/31 18:43:27 mlemos Exp $
 *
 */
//namespace LIB\tcp;

define("SASL_INTERACT", 2);
define("SASL_CONTINUE", 1);
define("SASL_OK",       0);
define("SASL_FAIL",    -1);
define("SASL_NOMECH",  -4);

class sasl_interact_class
{
	var $id;
	var $challenge;
	var $prompt;
	var $default_result;
	var $result;
};


class sasl_client_class
{
	/* Public variables */

	var $error='';
	var $mechanism='';
	var $encode_response=1;

	/* Private variables */

	var $driver;
	var $drivers=array(
		"Digest"   => array("digest_sasl_client",   "/tcp/digest_sasl_client.lib.php"   ),
		"CRAM-MD5" => array("cram_md5_sasl_client", "/tcp/cram_md5_sasl_client.lib.php" ),
		"LOGIN"    => array("login_sasl_client",    "/tcp/login_sasl_client.lib.php"    ),
		"NTLM"     => array("ntlm_sasl_client",     "/tcp/ntlm_sasl_client.lib.php"     ),
		"PLAIN"    => array("plain_sasl_client",    "/tcp/plain_sasl_client.lib.php"    ),
		"Basic"    => array("basic_sasl_client",    "/tcp/basic_sasl_client.lib.php"    )
	);
	var $credentials=array();
	
    function __construct($env=null) { //<<<<<<<<<<<<<
		
		$this->env = $env;
	}
	

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
			{  //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		        //echo '>>>>>' . $this->env->ldscheme;
				if(!class_exists($this->drivers[$mechanism][0]))
					//require_once($this->env->ldscheme . $this->drivers[$mechanism][1]);
				    require_once($this->drivers[$mechanism][1]);
				$this->driver=new $this->drivers[$mechanism][0];
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