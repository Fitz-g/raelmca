<?php

namespace App\Helpers;

class ApiResponse
{
    const SUCCESS = [
        "code" => 200,
        "message" => "Success"
    ];

    const UPDATESUCCESS = [
        "code" => 200,
        "message" => "Successfully update"
    ];
    const DELETESUCCESS = [
        "code" => 200,
        "message" => "Successfully delete"
    ];

    const PASSWORDCHANGE = [
        "code" => 200,
        "message" => 'Password successfully change'
    ];

    const SERVERERROR = [
        "code" => 500,
        "message" => "An Error Occur",
    ];

    const NOTFOUND = [
        "code" => 404,
        "message" => "Resource not found"
    ];

    const UNAUTHENTICATED = [
        "code" => 401,
        "message" => "Must be login to access resource"
    ];

    const UNAUTHORIZED = [
        "code" => 403,
        "message" => "Permission denied"
    ];

    const FORBIDDEN = [
        "code" => 403,
        "message" => "Action forbidden"
    ];

    const CANTEDITSUPERADMIN = [
        "code" => 403,
        "message" => "Can't edit superadmin"
    ];

    const UNPROCESSABLE = [
        "code" => 422,
        "message" => "Validation Error"
    ];

    const EMPTYREQUEST = [
        "code" => 400,
        "message" => "Request can't be empty"
    ];

    const BADREQUEST = [
        "code" => 400,
        "message" => "Bad request, refer to manual"
    ];

    const RESOURCEEXISTE = [
        "code" => 400,
        "message" => "Same request already processed"
    ];

    public static function getRessourceSuccess($code, $resource)
    {
        return $response = [
            "code" => $code,
            "status" => true,
            "message" => "Success",
            "data" => $resource,
        ];
    }

    /**
     * Retourne un message de succès si l'enregistrement s'est bien passé
     *
     * @param $user
     * @param $token
     * @return array
     */
    public static function registerSucces($user, $token)
    {
        return $response = [
            "code" => 200,
            "status" => true,
            "message" => "Success",
            "data" => $user,
            "token" => $token,
        ];
    }

    /**
     * Retourne un message de succès si l'identification s'est bien passé
     *
     * @param $user
     * @param $token
     * @return array
     */
    public static function loginSuccess($user, $token)
    {
        return $response = [
            "code" => 200,
            "status" => true,
            "message" => "Authentication success",
            "data" => ["user" => $user],
            "token" => $token
        ];
    }

    /**
     * Retourne un message d'erreur si les informations de connexions sont incorrectes.
     *
     * @return array
     */
    public static function loginError()
    {
        return $response = [
            'code' => 404,
            'status' => false,
            'message' => 'Email ou mot de passe invalid.'
        ];
    }

    /**
     * Renvoie un message d'erreur en cas d'erreur bien sûr !
     *
     * @param $code
     * @param $error
     * @return array
     */
    public static function error($code, $error)
    {
        return $response = [
            "code" => $code,
            "status" => false,
            "message" => $error,
            "data" => [],
        ];
    }
}
