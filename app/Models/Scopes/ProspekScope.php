<?php

namespace App\Models\Scopes;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ProspekScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select(
            DB::raw('prospek.*'), 'leads.brand')
            ->from('prospek')
            ->leftJoin('leads','prospek.leadsid','leads.id');
    }
}
