<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait AllowedFilterSearch
{


  public function scopeAllowedFilters(Builder $query, ...$keys)
  {
    foreach ($keys as $key) {
      if ($value = request()->query($key)) {
        // Weight, price, etc.
        $arr_value = json_decode($value);
        if (is_array($arr_value) && count($arr_value) === 2) {
          if (is_numeric($arr_value[0]) && is_numeric($arr_value[1])) {
            $query->where($key, '>=', $arr_value[0])->where($key, '<=', $arr_value[1]);
          } else if (is_numeric($arr_value[0])) {
            $query->where($key, '>=', $arr_value[0]);
          } else if (is_numeric($arr_value[1])) {
            $query->where($key, '<=', $arr_value[1]);
          }
        } else {
          $query->where($key, $value);
        }
      }
    }


    return $query;
  }

  public function scopeAllowedSearch(Builder $query, ...$keys)
  {
    if ($search = request()->query('search')) {
      foreach ($keys as $index => $key) {
        $method = $index === 0 ? 'where' : 'orWhere';

        $query->{$method}($key, 'like', "%{$search}%");
      }
    }

    return $query;
  }
}
