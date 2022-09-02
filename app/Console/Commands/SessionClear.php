<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SessionClear extends Command
{
    /**
     * @var string
     */
    protected $signature = 'session:clear {--users : Cleaning remembers tokens on users}';

    /**
     * @var string
     */
    protected $description = 'Clear sessions';

    /**
     * @var array
     */
    private $ignore = ['.gitignore', '.', '..'];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->confirm('Are you sure you want to clear sessions?')) {
            try {
                call_user_func([$this, self::driver()]);

                if ($this->option('users')) {
                    $this->rememberClear();
                }

            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }

    public function databaseDriver(): void
    {
        $table = config('session.table');
        DB::table($table)->truncate();

        $this->info("The {$table} table has been truncated");
    }

    public function fileDriver(): void
    {
        $directory = config('session.files');
        $files     = scandir($directory);
        $ignore    = array_merge($this->ignore, [
            // ...
        ]);

        foreach ($files as $file) {
            if (!in_array($file, $ignore)) {
                unlink($directory . DIRECTORY_SEPARATOR . $file);
            }
        }

        $this->info('The "' . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $directory) . '" directory has been cleared');
    }

    private function rememberClear(): void
    {
        $command = 'remember:clear';
        if (Arr::has(Artisan::all(), $command)) {
            $this->call($command);
        }
    }

    private static function driver(): string
    {
        $method = Str::camel(implode(' ', [config('session.driver'), 'driver']));

        if (method_exists(self::class, $method)) {
            return $method;
        } else {
            throw new \Exception("Method \"{$method}\" not exists");
        }
    }
}
