<?php

namespace Tec\DataSynchronize\PanelSections;

use Tec\Base\PanelSections\PanelSection;

class ImportPanelSection extends PanelSection
{
    public function setup(): void
    {
        $this
            ->setId('datasynchronize-import')
            ->setTitle(trans('packages/datasynchronize::datasynchronize.import.name'))
            ->withPriority(99999);
    }
}
