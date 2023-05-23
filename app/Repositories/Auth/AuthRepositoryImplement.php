<?php

namespace App\Repositories\Auth;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;


class AuthRepositoryImplement extends Eloquent implements AuthRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function loginFunction($request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        // Check if login is successful with email
        if (!Auth::attempt($credentials)) {
            // Attempt login with username
            $user = $this->model::where('username', $request->input('email'))
                ->where('active', '=', '1')
                ->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return BaseController::error(NULL, 'UnAuthorized', 400);
            }
        }

        try {
            $user = $this->model::where(function ($query) use ($request) {
                $query->where('email', $request->input('email'))
                    ->orWhere('username', $request->input('email'));
            })
                ->where('active', '=', '1')
                ->first();

            if ($user == NULL) {
                return BaseController::error(NULL, 'User needs verification', 400);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            $accessToken = [
                "accessToken" => $token
            ];

            $result = [
                "sanctum" => $accessToken,
                "user" => $user,
            ];
        } catch (\Throwable $th) {
            throw $th;
        }

        return BaseController::success($result, 'Authorized');
    }

    public function logOutFunction()
    {
        try {
            $logout = auth()->user()->tokens()->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return BaseController::success("", 'Berhasil logged out');
    }

    public function profileFunction()
    {
        $user = auth('sanctum')->user()->load('role');

        return BaseController::success($user, "Berhasil mengambil data user");
    }

    public function createUser($request)
    {
        try {

            $user = $this->model::create([
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'role_id' => $request->role_id,
                'alamat' => $request->alamat,
                'active' => '1',
                'password' => bcrypt($request->password)
            ]);

            $success['token'] =  $user->createToken('auth_token')->plainTextToken;
            $success['name'] =  $user->name;
        } catch (\Throwable $th) {
            throw $th;
        }

        return BaseController::success(NULL, "Berhasil menambahkan user", 200);
    }
    // Write something awesome :)
}
