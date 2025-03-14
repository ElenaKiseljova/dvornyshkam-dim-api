<?php
// https://www.udemy.com/course/laravel-blog-development/learn/lecture/34209260
use Illuminate\Support\Str;

function sortable($label, $column = null)
{
    $column = $column ?? Str::snake($label);

    $sortBy = request()->query('sort_by');

    $direction = '';
    if (ltrim($sortBy, '-') === $column) {
        $direction = strpos($sortBy, '-') === 0 ? 'desc' : 'asc';
    }

    $sortBy = !$sortBy || strpos($sortBy, '-') === 0 ? $column : "-{$column}";

    $url = request()->fullUrlWithQuery(['sort_by' => $sortBy]);

    return "<a class='sortable {$direction}' href='{$url}'>{$label}</a>";
}

function getUndoRoute($name, $resource)
{
    return request()->missing('undo') ? route($name, [$resource->id, 'undo' => true]) : null;
}
