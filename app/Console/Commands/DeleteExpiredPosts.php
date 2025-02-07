<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Coupon;

class DeleteExpiredPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupons:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $updatedCoupons = Coupon::expired()->delete();

        if ($updatedCoupons > 0) {
            $this->info("$updatedCoupons deleted");
        } else {
            $this->info('No expired coupons found.');
        }
    }
}
