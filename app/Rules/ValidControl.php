<?php

namespace App\Rules;

use App\Models\FMS\ControllerModel;
use Illuminate\Contracts\Validation\Rule;

class ValidControl implements Rule
{
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    return $value == null || ControllerModel::where('id', $value)->exists();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return 'The assigned unit must be a valid controller or null';
  }
}
