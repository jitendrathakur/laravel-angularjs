<?php

// app/models/User.php

class User extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('name', 'email', 'mobile'); 

 	private $errors;

	private $rules = array(
		'email' => 'required',        
        'name'  => 'required|alpha_num',
        'mobile' => 'required'      
    );



	public function validate($data)
    {        
           
        $invalidEmailFormat = false;
        $emailExist = false;
    	if (isset($data['email'])) {
    		$result = $this->where('email', '=', $data['email'])    					           
    					->first();        
            
            if (isset($result->id)) {           
                $emailExist = true;        
            }

            $rx_email = '(^([_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-_]+(\.[a-zA-Z0-9-_]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3}))))';
            preg_match($rx_email, $data['email'], $email);
            if (empty($email)) {
                $invalidEmailFormat = true;
            }           
    	}    	
    	
    	$availableRule = array();
    	foreach($this->rules as $field => $rules) {

    		//if (isset($data[$field])) {
    			$availableRule[$field] = $rules;
    		//}    	
    	}
  
        // make a new validator object
        $v = Validator::make($data, $availableRule);

        if ($v->fails() || $emailExist || $invalidEmailFormat)
        {
        	if ($emailExist) {
        		$v->errors()->add('email', 'The email has already been taken.');
        	}

            if ($invalidEmailFormat) {
                $v->errors()->add('email', 'The email has invalid format.');
            }
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }
        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

}