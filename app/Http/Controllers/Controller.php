<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  protected int $itemPerPage = 10;

  // Tool Functions Start
  public function putSL($collection): void
  {
    $start = ($collection->currentPage() * $this->itemPerPage - $this->itemPerPage) + 1;
    $collection->each(function ($value) use (&$start) {
      $value->sl = $start++;
    });
  }

  public function checkPermission($permission, $message = "Permission denied."): void
  {
    abort_if(!(is_array($permission) ? auth()->user()->canany($permission) : $ability = auth()->user()->can($permission)), 403, $message);
  }

  public function getUniqueFileName($key): string
  {
    return Str::uuid().'.'.request()->file($key)->extension();
  }
}
