<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller {
    use HttpResponses;

    public function store(Request $request) {
        try {
            $data = $request->only(['email', 'password']);

            $request->validate([
                'email' => 'string|required',
                'password' => 'string|required'
            ]);

            $authenticated = Auth::attempt($data);

            if (!$authenticated) {
                return $this->error('Credenciais inválidas', Response::HTTP_UNAUTHORIZED);
            }

            $request->user()->tokens()->delete();
            $token = $request->user()->createToken('authToken');

            return $this->response('Autorizado', Response::HTTP_OK, [
                'token' => $token->plainTextToken,
            ]);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return $this->response('', Response::HTTP_NO_CONTENT);
    }
}
