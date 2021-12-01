<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\GroupMember1;
use App\Models\GroupMember;
use DB;
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
        // return Command::SUCCESS;
        // \Log::info('cron is working');
        // User::latest()->take(2)->delete();
        // echo "deleted";
         $user= GroupMember::latest()->take(2)->get();
         $gm1=new GroupMember1();
         foreach($user as $data)
         {
            // DB::table('group_member1s')->insert(['staff'=>$data->staff,
            //     'customers'=>$data->customers,
            //     'count'=>$data->count]);
         GroupMember1::insert(['staff'=>$data->staff,
              'customers'=>$data->customers,
             'count'=>$data->count]);
         } 
         




    }
}
