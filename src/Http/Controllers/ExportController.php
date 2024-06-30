<?php

namespace Tec\DataSynchronize\Http\Controllers;

use Tec\Base\Facades\BaseHelper;
use Tec\Base\Http\Controllers\BaseController;
use Tec\Base\Supports\Breadcrumb;
use Tec\DataSynchronize\Exporter\Exporter;
use Tec\DataSynchronize\Http\Requests\ExportRequest;
use Throwable;

abstract class ExportController extends BaseController
{
    abstract protected function getExporter(): Exporter;

    protected function allowsSelectColumns(): bool
    {
        return true;
    }

    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('core/base::layouts.tools'))
            ->add(trans('packages/datasynchronize::datasynchronize.tools.export_import_data'), route('tools.datasynchronize'));
    }

    public function index()
    {
        $this->pageTitle($this->getExporter()->getHeading());

        return $this->getExporter()->render();
    }

    public function store(ExportRequest $request)
    {
        if (BaseHelper::hasDemoModeEnabled()) {
            return $this
                ->httpResponse()
                ->setError()
                ->setMessage(trans('core/base::system.disabled_in_demo_mode'));
        }

        try {
            $exporter = $this
                ->getExporter()
                ->format($request->input('format'));

            if ($this->allowsSelectColumns()) {
                $exporter->acceptedColumns($request->input('columns'));
            }

            return $exporter->export();
        } catch (Throwable $e) {
            BaseHelper::logError($e);

            return $this
                ->httpResponse()
                ->setError()
                ->setCode(400)
                ->setMessage($e->getMessage());
        }
    }
}
