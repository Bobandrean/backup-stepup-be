<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Repositories\Ultra\UltraService;
use App\Repositories\User\UserService;
use Illuminate\Console\Command;

class SyncUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize user list with Ultra.';

    /**
     * @var \App\Repositories\Ultra\UltraService
     */
    protected $service;

    /**
     * @var \App\Repositories\User\UserService
     */
    protected $userService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        UltraService $service,
        UserService $userService
    ) {
        parent::__construct();

        $this->service = $service;
        $this->userService = $userService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $page = 1;
        $maxPage = $this->service->getUsersMeta()->num_pages;

        User::query()->update(['active' => false]);

        $bar = $this->output->createProgressBar($maxPage);
        $bar->start();

        while ($page <= $maxPage) {
            $ultraUsers = $this->service->getUsers($page);
            if ($ultraUsers) {
                $ultraUsers->each(function ($ultraUser) {
                    $this->userService->updateOrCreate($ultraUser, true);
                });
            }


            $page += 1;
            $bar->advance();
        };

        $bar->finish();
        $this->info("\nFinished synchronizing users.");
    }
}
