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
        $builder->select('leads.brand', 'prospek.leadsid' , 'prospek.userid','list_wa.tanggal','list_wa.created_at','list_wa.id')
        ->from('list_wa')
        ->leftJoin('prospek','prospek.id','list_wa.leadsid')
        ->join('leads','leads.id' ,'prospek.leadsid');
    }
}
