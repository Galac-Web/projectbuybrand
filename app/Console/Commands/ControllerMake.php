<?php

namespace App\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Symfony\Component\Console\Input\InputOption;

class ControllerMake extends Command
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        $namespace = $rootNamespace . '\Http\Controllers';

        if ($this->option('dashboard')) {
            $namespace = $namespace . '\Dashboard';
        }

        return $namespace;
    }

    protected function getOptions(): array
    {
        return [
            ...parent::getOptions(),
            ['dashboard', 'd', InputOption::VALUE_NONE, 'Generate controller on dashboard namespace.'],
        ];
    }
}
