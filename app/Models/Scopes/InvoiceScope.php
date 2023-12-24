<?php

namespace App\Models\Scopes;

use App\Models\ListCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class InvoiceScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->select(
            DB::raw('invoice.*'),
            'users.name','users.image')
            ->from('Invoice')
        ->leftJoin('users','users.id','invoice.userid');
    }
}
