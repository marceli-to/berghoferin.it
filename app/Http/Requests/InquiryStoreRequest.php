<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class InquiryStoreRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */

  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */

  public function rules()
  {
    return [
      'salutation' => ['required', 'string'],
      'firstname' => ['required', 'string'],
      'name' => ['required', 'string'],
      'street' => ['required', 'string'],
      'zip' => ['required', 'string'],
      'city' => ['required', 'string'],
      'country' => ['required', 'string'],
      'email' => ['required', 'email'],
      'phone' => ['required', 'string'],
      'number_suites' => ['required', 'integer', 'min:1'],
      'number_guests' => ['required', 'integer', 'min:1'],
      'suite_type_id' => ['required', 'string'],
      'arrival_date' => ['required', 'date_format:d.m.Y'],
      'departure_date' => ['required', 'date_format:d.m.Y', 'after:arrival_date'],
    ];
  }

  /**
   * Custom message for validation
   *
   * @return array
   */

  public function messages()
  {
    return [
      'salutation.required' => 'Please enter your salutation.',
      'firstname.required' => 'Please enter your first name.',
      'name.required' => 'Please enter your last name.',
      'street.required' => 'Please enter your street address.',
      'zip.required' => 'Please enter your ZIP code.',
      'city.required' => 'Please enter your city.',
      'country.required' => 'Please enter your country.',
      'email.required' => 'Please enter your email address.',
      'email.email' => 'Please enter a valid email address.',
      'phone.required' => 'Please enter your phone number.',
      'message.required' => 'Please enter your message.',
      'number_suites.required' => 'Please enter the number of suites you need.',
      'number_suites.integer' => 'Please enter a valid number of suites.',
      'number_suites.min' => 'Please enter at least one suite.',
      'number_guests.required' => 'Please enter the number of guests you have.',
      'number_guests.integer' => 'Please enter a valid number of guests.',
      'number_guests.min' => 'Please enter at least one guest.',
      'suite_type_id.required' => 'Please select a suite type.',
      'arrival_date.required' => 'Please enter your arrival date.',
      'arrival_date.date_format' => 'Please enter a valid arrival date in the format YYYY-MM-DD.',
      'departure_date.required' => 'Please enter your departure date.',
      'departure_date.date_format' => 'Please enter a valid departure date in the format YYYY-MM-DD.',
      'departure_date.after' => 'Your departure date must be after your arrival date.',
    ];
  }
}