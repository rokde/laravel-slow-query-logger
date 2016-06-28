<?php

namespace Rokde\LaravelSlowQueryLogger;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Log\Writer;
use Illuminate\Support\ServiceProvider;

class LaravelSlowQueryLoggerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @param Dispatcher $events
     * @param Writer $log
     */
    public function boot(Dispatcher $events, Writer $log)
    {
        $this->publishes([
            __DIR__ . '/../config/slow-query-logger.php' => config_path('slow-query-logger.php'),
        ], 'config');

        $this->setupListener($events, $log);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/slow-query-logger.php', 'slow-query-logger'
        );
    }

    /**
     * setting up listener
     *
     * @param Dispatcher $events
     * @param Writer $log
     */
    private function setupListener(Dispatcher $events, Writer $log)
    {
        $environments = config('slow-query-logger.environments', []);

        if (!$this->app->environment($environments)) {
            return;
        }

        $events->listen(QueryExecuted::class, function (QueryExecuted $queryExecuted) use ($log) {
            $sql = $queryExecuted->sql;
            $bindings = $queryExecuted->bindings;
            $time = $queryExecuted->time;

            $logSqlQueriesSlowerThan = config('slow-query-logger.time-to-log');
            if ($logSqlQueriesSlowerThan < 0 || $time < $logSqlQueriesSlowerThan) {
                return;
            }

            $level = config('slow-query-logger.log-level', 'debug');
            try {
                foreach ($bindings as $val) {
                    $sql = preg_replace('/\?/', "'{$val}'", $sql, 1);
                }

                $log->log($level, $time . '  ' . $sql);
            } catch (\Exception $e) {
                //  be quiet on error
            }
        });
    }
}
