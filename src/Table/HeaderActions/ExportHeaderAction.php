<?php

namespace Tec\DataSynchronize\Table\HeaderActions;

use Tec\Table\HeaderActions\HeaderAction;

class ExportHeaderAction extends HeaderAction
{
    public static function make(string $name = 'export'): static
    {
        return parent::make($name)
            ->label(trans('packages/datasynchronize::datasynchronize.export.name'))
            ->icon('ti ti-file-export');
    }
}
