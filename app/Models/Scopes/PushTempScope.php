<?php

namespace App\Models\Scopes;

use App\Models\ListCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class PushTempScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select(
            DB::raw('leads.id as leadsid'),
            'leads.name','leads.model', 'leads.variant', 'leads.brand','leads.create',
            'push_temp.id','push_temp.userid')
            ->from('push_temp')
        ->leftjoin('leads','leads.id' ,'push_temp.leadsid')->orderBy('leads.create','asc');
    }
}
