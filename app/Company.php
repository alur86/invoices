<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

//set up the created_at and updated_at fields to users table

//@var bool

     
public $timestamps = true;	
 
/**
* The database table used by the model.
*
* @var string
*/

protected $table = 'companies';


/**
 * The attributes that are mass assignable.
*
* @var array
*/


protected $fillable = array('name','description','type');




// set up relation to User Model

 public function user()
    {
        return $this->belongsTo('App\User');
    }

// set up relation to Invoice Model

public function  invoises(){

return $this->has_many('invoices');

}

//static method what returns of data company by user_id
// @var integer
// @var array

 static function getByUser($user_id)
    {
         return self::where('user_id', $user_id)
            ->first();
 
    }
 
//static method what returns of data company
// @var array

  static function getAllCompanies(){
  	
        $companies = self::orderBy('name')
                ->orderBy('created_at', 'ASC')
                ->get();

        return $companies;
    }


}
