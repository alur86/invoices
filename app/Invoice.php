<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    

//set up the created_at and updated_at fields to users table

//@var bool

public $timestamps = true;	
    

/**
* The database table used by the model.
*
* @var string
*/

protected $table = 'invoices';


protected $fillable = array('name','description','due');

/**
 * The attributes that are mass assignable.
*
* @var array
*/



    protected $dates = [
        'created_at',
        'updated_at',
        'due'
    ];




// set up relation to Company Model

 public function company()
    {
        return $this->belongsTo('App\Company');
    }


//static method what returns of all invoices from
// @var array

  static function getAllInvoices(){

         return self::orderBy('created_at','DESC')
                ->get();
    }


//static method what return data by company_id
// @var integer
// @var array

   static function getInvoice($company_id)
    {
         $invoices= self::where('company_id', $company_id)
            ->first();
      return $invoices;
 
    }



}
