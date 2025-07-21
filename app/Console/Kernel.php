<?php
   
namespace App\Console;
    
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
    
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\UserExpire::class,
        Commands\DemoCron::class,
    ];
     
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('userexpiry:cron')->daily();
		//$schedule->command('demo:cron')->everyMinute();
	//	$schedule->command('userexpiry:cron')->everyMinute();
                // $schedule->exec('php -d register_argc_argv=On /path/to/artisan userexpiry:cron');
        //$schedule->command('demo:cron')
                // ->everyMinute()->withoutOverlapping();
                $schedule->command('userexpiry:cron')->everyFiveMinutes();
		$schedule->command('demo:cron')->everyMinute();
    }
     
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
     
        require base_path('routes/console.php');
    }
}