<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ListLostScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select('*')
            ->from('prospek')
        ->where('lost','>',0);
    }
}
