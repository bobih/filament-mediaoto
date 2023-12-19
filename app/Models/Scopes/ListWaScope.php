<?php

namespace App\Models\Scopes;

use App\Models\ListCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ListWaScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select(
            DB::raw('leads.id as leadsid'),
            'leads.name','leads.model','leads.variant', 'leads.brand', 'prospek.userid',
            'list_wa.tanggal','list_wa.id','list_wa.created_at')
        ->from('list_wa')
        ->leftJoin('prospek','prospek.id','list_wa.leadsid')
        ->join('leads','leads.id' ,'prospek.leadsid');
    }
}
