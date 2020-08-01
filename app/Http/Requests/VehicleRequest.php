<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
    if ($this->status == 0 && $this->return != null) {
      $rules['return'] = 'date';
    }
    $rules['class'] = 'required';
    $rules['make'] = 'required';
    $rules['model'] = 'required';
    $rules['vrm'] = 'required';
    $rules['division'] = 'required|exists:divisions,id';
    return $rules;
  }
}
