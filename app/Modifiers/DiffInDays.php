<?php
namespace App\Modifiers;
use Statamic\Modifiers\Modifier;

class DiffInDays extends Modifier
{
  /**
   * Modify a value.
   *
   * @param mixed  $value    The value to be modified
   * @param array  $params   Any parameters used in the modifier
   * @param array  $context  Contextual values
   * @return mixed
   */
  public function index($value, $params, $context)
  {
    $departure_date = \Carbon\Carbon::createFromFormat('Y-m-d', $context['departure_date']->raw());
    $arrival_date = \Carbon\Carbon::createFromFormat('Y-m-d', $context['arrival_date']->raw());
    $number_nights = $arrival_date->diffInDays($departure_date);
    return $number_nights;
  }
}
