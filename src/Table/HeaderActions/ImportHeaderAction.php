<?php

namespace Tec\DataSynchronize\Table\HeaderActions;

use Tec\Table\HeaderActions\HeaderAction;

class ImportHeaderAction extends HeaderAction
{
    public static function make(string $name = 'import'): static
    {
        return parent::make($name)
            ->label(trans('packages/datasynchronize::datasynchronize.import.name'))
            ->icon('ti ti-file-import');
    }
}
