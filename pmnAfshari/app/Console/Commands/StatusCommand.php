<?php

namespace App\Console\Commands;

use App\Models\Discount;
use Illuminate\Console\Command;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        foreach (Discount::DiscountStatus()->get() as $discounts) {
            if ($discounts->status == 'فعال') {
                $discounts->status = 'غیرفعال';
            }

        }

    }
}
