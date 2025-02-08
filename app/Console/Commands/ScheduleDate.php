<?php

namespace App\Console\Commands;
use App\Models\tbl_mping_purchase;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ScheduleDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:expired-order {hours=72}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The Order will be dispatched within 5 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $hours = $this->argument('hours');
        tbl_mping_purchase::where('created_at', '<', Carbon::now()->subHours($hours))
        ->delete();
        return Command::SUCCESS;

    }
}
