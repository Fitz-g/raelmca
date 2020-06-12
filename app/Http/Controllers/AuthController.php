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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login user
     * @param Request $request
     * @return RedirectResponse|string
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            try {
                $user = User::where('email', $data['email'])->first();
                $user->last_connected = new \DateTime();
                $user->save();

                return redirect()->intended('admin/dashboard');
            } catch (\Exception $e) {
                return 'Une erreur est survenu ' . $e->getMessage();
            }
        } else {
            return redirect()->route('login')->with('danger', "Les informations entrées ne correspondent a aucun enregistrement dans notre base de données.\n Veuillez réessayer s'il vous plaît.");
        }
    }

    public function register(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        DB::beginTransaction();
        try {
            $user = User::create($validatedData);
            DB::commit();
            return redirect()->back()->with('success', 'Nouvel utilisateur créé avec succès');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('danger', 'Une erreur est survenu ' . $e->getMessage());
        }
    }

    /**
     * API Register user.
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function apiRegister(UserRegisterRequest $request)
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
     * API Login user.
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function apiLogin(UserLoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            try {
                $user = User::where('email', $data['email'])->first();
                $token = Auth::user()->createToken('RAELMCA TOKEN')->accessToken;
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

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->last_disconnected = new \DateTime();
            $user->save();
            Auth::logout();

            return redirect('/');
        }
    }
}
