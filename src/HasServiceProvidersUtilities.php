<?php

namespace Apsonex\PackageTools\HasServiceProvidersUtilities;

use Generator;
use Illuminate\Support\Carbon;

trait HasServiceProvidersUtilities
{

    /**
     * Searches migrations and publishes them as assets.
     */
    protected function registerMigrations(string $directory): void
    {
        if (app()->runningInConsole()) {
            $generator = function (string $directory): Generator {
                foreach (app()->make('files')->allFiles($directory) as $file) {
                    yield $file->getPathname() => app()->databasePath(
                        'migrations/' . Carbon::now()->format('Y_m_d_His') . '_' . $file->getFilename()
                    );
                }
            };

            $this->publishes(iterator_to_array($generator($directory)), 'migrations');
        }
    }

}