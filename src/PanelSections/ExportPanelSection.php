<?php

namespace Tec\DataSynchronize\PanelSections;

use Tec\Base\PanelSections\PanelSection;

class ExportPanelSection extends PanelSection
{
    public function setup(): void
    {
        $this
            ->setId('datasynchronize-export')
            ->setTitle(trans('packages/datasynchronize::datasynchronize.export.name'))
            ->withPriority(99999);
    }
}
