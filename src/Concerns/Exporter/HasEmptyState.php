<?php

namespace Tec\DataSynchronize\Concerns\Exporter;

use Illuminate\Contracts\View\View;

trait HasEmptyState
{
    public function getEmptyStateTitle(): string
    {
        return trans('packages/datasynchronize::datasynchronize.export.empty_state.title');
    }

    public function getEmptyStateDescription(): ?string
    {
        return trans('packages/datasynchronize::datasynchronize.export.empty_state.description');
    }

    public function getEmptyStateIcon(): string
    {
        return 'ti ti-mood-empty';
    }

    public function getEmptyStateActionLabel(): ?string
    {
        return trans(
            'packages/datasynchronize::datasynchronize.export.empty_state.back',
            ['page' => trans('packages/datasynchronize::datasynchronize.tools.export_import_data')]
        );
    }

    public function getEmptyStateActionUrl(): string
    {
        return route('tools.datasynchronize');
    }

    public function getEmptyStateContent(): View|string
    {
        return view('packages/datasynchronize::partials.empty-state', [
            'title' => $this->getEmptyStateTitle(),
            'description' => $this->getEmptyStateDescription(),
            'icon' => $this->getEmptyStateIcon(),
            'actionUrl' => $this->getEmptyStateActionUrl(),
            'actionLabel' => $this->getEmptyStateActionLabel(),
        ]);
    }
}
