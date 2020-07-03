<?php

namespace App\Rules;

use App\Models\FMS\Unit;
use Illuminate\Contracts\Validation\Rule;

class ValidUnit implements Rule
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
    return $value == null || Unit::where('id', $value)->exists();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return 'The assigned unit must be a valid unit or null';
  }
}
