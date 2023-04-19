<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{

  protected $casts = [
    'arrival_date' => 'date:d.m.Y',
    'departure_date' => 'date:d.m.Y',
  ];

  protected $fillable = [
    'salutation',
    'firstname',
    'name',
    'street',
    'street_number',
    'zip',
    'city',
    'country',
    'email',
    'phone',
    'message',
    'number_suites',
    'number_guests',
    'suite_type',
    'arrival_date',
    'departure_date'
  ];

  public function setArrivalDateAttribute($value)
  {
    $this->attributes['arrival_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', $value);
  }

  public function setDepartureDateAttribute($value)
  {
    $this->attributes['departure_date'] = \Carbon\Carbon::createFromFormat('d.m.Y', $value);
  }

}
