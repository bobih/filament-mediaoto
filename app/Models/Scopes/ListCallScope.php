<?php

namespace App\Models\Scopes;

use App\Models\ListCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ListCallScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select(
            'prospek.leadsid','prospek.userid', 'leads.brand',
            'list_call.tanggal','list_call.id','list_call.created_at')
            ->from('list_call')
        ->leftJoin('prospek','prospek.id','list_call.leadsid')
        ->join('leads','leads.id' ,'prospek.leadsid');
    }
}
