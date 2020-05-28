<?php
/**
 * Author : Wilfried KORANDJI
 * Date : 28/05/2020
 *
 * API / User create and login.
 */
namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register user.
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        DB::beginTransaction();
        try {
            $user = User::create($validatedData);

            $token = $user->createToken('RAELMCA TOKEN')->accessToken;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(ApiResponse::error(400, $e->getMessage()));
        }
        return response()->json(ApiResponse::registerSucces($user, $token));
    }

    /**
     * Login user.
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            try {
                $user = User::where('email', $data['email'])->first();
                $token = $user->createToken('RAELMCA TOKEN')->accessToken;
                $user->last_connected = new \DateTime();
                $user->save();

                return response()->json(ApiResponse::loginSuccess($user, $token));
            } catch (\Exception $e) {
                return response()->json(ApiResponse::error(400, $e->getMessage()));
            }
        } else {
            return response()->json(ApiResponse::loginError());
        }
    }
}
