<?php

namespace App\Models\Scopes;

use App\Models\ListCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class PushListScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select(
            DB::raw('leads.id as leadsid'),
            'leads.brand',DB::raw('push_list.*'))
            ->from('push_list')
        ->leftjoin('leads','leads.id' ,'push_list.leadsid')->orderBy('push_list.tanggal','asc');
    }
}
