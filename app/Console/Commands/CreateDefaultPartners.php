<?php

namespace App\Console\Commands;

use App\Models\Journal;
use App\Models\User;
use App\Policies\PermissionNames;
use App\Policies\RoleNames;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateDefaultPartners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'partners:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default data partners data will be edited after';

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
    public function handle(): int
    {
        $journaux = Journal::all();
        foreach ($journaux as /** @var Journal $journal */$journal) {
            if ($journal->partner == null) {
                $journal->createPartner();
            }
        }
        return  0;
    }
}
