<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use Filament\Actions;
use App\Models\NewsPost;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\NewsPostResource;
use Filament\Resources\Components\Tab;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use Illuminate\Database\Eloquent\Builder;

class ListNewsPosts extends ListRecords
{
    protected static string $resource = NewsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            ExportAction::make()->exports([
                ExcelExport::make()->withColumns([
                    Column::make('id')->heading('ID'),
                    Column::make('created_at')->heading('Date'),
                    Column::make('categories')->formatStateUsing(function ($record) {
                        $list = '';
                        foreach($record->categories as $category){
                            $list .= $category->title . ", ";
                        }
                        return substr($list,0,-2);
                     })->heading('Category'),
                    Column::make('tags')->formatStateUsing(function ($record) {
                        $list = '';
                        foreach($record->tags as $tag){
                            $list .= $tag->name . ", ";
                        }
                      return substr($list,0,-2);
                     })->heading('Tags'),
                    Column::make('author.nama')->heading('Author'),
                    Column::make('title')->heading('Title'),
                    Column::make('slug')->heading('URL')
                    ->formatStateUsing(function ($state) {
                       return env("APP_URL",'https://www.mediaoto.id').'/news/'. $state;
                    }),
                ])->withFilename('Site_News_' . date("Y-m-d")),
            ])
                ->color('info')
        ];
    }


    public function getTabs(): array
    {

        return [
            "active" => Tab::make('Active')
                ->modifyQueryUsing(function ($query) {
                    $query->active();
                    return $query->active(); ;
                }),
            "all" => Tab::make('All'),
        ];
    }
}
