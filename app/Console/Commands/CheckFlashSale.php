<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;

class CheckFlashSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:flashSale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Flash Sale';

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
        //Update Untuk Flash Sale Yang Sudah Tidak Berlaku
        Item::where('end_flash', '<=', now())->update([
            'end_flash'     => null,
            'start_flash'   =>  null,
            'flag_flash'    =>  0,
            'harga_flash'   =>  null,
        ]);
    }
}
