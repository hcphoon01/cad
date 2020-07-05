<?php

namespace App\Imports;

use App\Models\Helper\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicleImport implements ToModel, SkipsOnFailure, WithHeadingRow
{
  use Importable, SkipsFailures;

  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Vehicle([
      'class' => $row['class'],
      'make' => $row['make'],
      'model' => $row['model'],
      'vrm' => $row['vrm'],
      'division_id' => $row['division'],
      'status' => '1',
      'return' => null,
    ]);
  }
}
