<?php

namespace App\Console\Commands;

use App\Models\User;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncroles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync roles from hrultra to ultra analytic.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url  = config("hrultra.base_uri") . "/api/access/ultra-analytic/lists";


        $username = config("hrultra.basic_auth_username");
        $password = config("hrultra.basic_auth_password");


        try {
            $response = Http::withBasicAuth($username, $password)
                ->get($url);

            // Request was successful
            $responseData = $response->json();

            if (isset($responseData['super_users']) && isset($responseData['admins'])) {

                // Get all users
                $users = User::all();

                // Mass remove roles from all users
                $users->each(function ($user) {
                    $user->roles()->detach();
                });

                User::whereUsername($responseData['super_users'])->get()->each(function ($user) {
                    $user->assignRole('superadmin');
                });

                User::whereUsername($responseData['admins'])->get()->each(function ($user) {
                    $user->assignRole('admin');
                });
            }


            $this->info("Sync roles done.");
            // Process the response data
        } catch (RequestException $exception) {
            $statusCode = $exception->response->status();
            $errorMessage = $exception->getMessage();
            $this->info($errorMessage);
        }
    }
}
