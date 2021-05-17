<?php namespace Mercator\SecretPage\Components;

use Cms\Classes\ComponentBase;
use Request;
use Crypt;
use BackendAuth;
use Input;
use System\Models\EventLog as EventLog;
use Exception;

class SecretPage extends ComponentBase
{
	
	protected function isAccessible($passphrase=null) {
	
		if (BackendAuth::getUser())
			return true;
		
		$secret=(input("__secretpage"));
		
		if (!strcmp($secret, $passphrase))
			return true;
		else
			return false;
			
	}
	
	public function onRun()
	{
		$passphrase=$this->property("passphrase");
		$this->page["pageSecret"]="__secretpage=$passphrase";
    	if (!$this->isAccessible($passphrase)) {
     	   	$this->setStatusCode(404);
       	 	return $this->controller->run($this->property("url"));
   		}
   		
	}

    public function componentDetails()
    {
        return [
            'name'        => 'Secret Page',
            'description' => 'Make page acessible with a secret key only.'
        ];
    }
    

    public function defineProperties()
    {
             return [
        
        	'passphrase' => [
             'title'             => 'Passphrase',
             'description'       => 'Passphase to be added to the page request',
             'type'              => 'string',
             'default'           => bin2hex(random_bytes(32))
        	],
        	
        	'url' => [
             'title'             => 'Invalid Access URL',
             'description'       => 'URL to forward if the page is not accessible',
             'type'              => 'string',
             'default'           => '404'
        	]
        
        ];
    }
}
