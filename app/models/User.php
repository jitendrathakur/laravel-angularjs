<?php

// app/models/User.php

class User extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('name', 'email', 'mobile'); 
}