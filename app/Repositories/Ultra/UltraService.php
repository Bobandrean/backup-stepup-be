<?php

namespace App\Repositories\Ultra;

use App\Repositories\EncryptionService;
use Illuminate\Validation\ValidationException;

class UltraService
{
    /**
     * @var UltraClient
     */
    private $client;

    public function __construct(UltraClient $client)
    {
        $this->client = $client;
    }

    /**
     * Send request to Ultra API
     *
     * @param string $method
     * @param string $path
     * @param array $query
     * @param array $data
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function sendRequest(
        $method = 'GET',
        $path = '',
        $query = [],
        $data = []
    ) {
        try {
            return $this->client->request($method, $path, [
                'query' => $query,
                'json' => $data,
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $clientException) {
            throw ValidationException::withMessages([
                'username' => [__('auth.failed')],
            ]);
        } catch (\GuzzleHttp\Exception\ServerException $serverException) {
            abort(500, __('auth.server.fail'));
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            abort(500);
        }
    }

    /**
     * Generate signature for Ultra API
     *
     * @return string
     */
    private function generateSignature()
    {
        $sigKey = config('ultra.sig_key');
        return hashTokenWithDate($sigKey);
    }

    /**
     * Authenticate using Ultra API
     *
     * @param string $username
     * @param string $password
     *
     * @return \App\Repositories\Ultra\UltraUser
     */
    public function login($username, $password)
    {
        $response = $this->sendRequest(
            'POST',
            'users/auth',
            ['dchl' => 1],
            [
                'username' => $username,
                'password' => $password,
            ]
        );

        $body = json_decode((string) $response->getBody());

        $user = new UltraUser();
        $user->moodleId = $body->data->id;
        $user->username = $username;
        $user->password = $password;
        $user->email = $body->data->email;
        $user->fullName = $body->data->name;

        return $user;
    }

    /**
     * Get users from Ultra.
     *
     * @param int $page
     *
     * @return \Illuminate\Support\Collection
     */
    public function getUsers(int $page = 1)
    {
        $response = $this->sendRequest('GET', 'users/get_users', [
            'page' => $page,
            'signature' => $this->generateSignature(),
        ]);
        $body = json_decode((string) $response->getBody());
        if (isset($body->data) && isset($body->data->data)) {
            $users = collect($body->data->data)->map(static function ($item) {
                $user = new UltraUser();
                $user->moodleId = $item->moodle_user_id
                    ? $item->moodle_user_id
                    : rand(50000, 100000);
                $user->username = $item->user_id;
                $user->fullName = $item->full_name;
                $user->function = $item->function;
                $user->division = $item->division;
                $user->area = $item->area;
                $user->sub_area = $item->sub_area;
                $user->position = $item->position;
                $user->password = 'secret';
                $user->cfh = $item->cfh === '1';
                $user->active = $item->suspended === '0';

                $personal = $item->moodle_data->email ?? false;
                $email = $item->email_company ?? false;
                if ($email === '-' && $personal) {
                    $user->email = $item->moodle_data->email;
                } else if ($email) {
                    $user->email = $email;
                } else {
                    $user->email = $user->username . '@fake.com';
                }

                return $user;
            });
            return $users;
        }
    }

    /**
     * Get meta on get_users endpoint.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getUsersMeta()
    {
        $response = $this->sendRequest('GET', 'users/get_users', [
            'page' => 1,
            'signature' => $this->generateSignature(),
        ]);

        $body = json_decode((string) $response->getBody());
        return $body->data->meta;
    }
}
