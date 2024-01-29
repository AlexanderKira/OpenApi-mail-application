<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *         path="/api/auth/login",
 *         summary="get admin access token(sample).",
 *         tags={"Applications"},
 *
 *         @OA\RequestBody(
 *             @OA\JsonContent(
 *                 allOf={
 *                     @OA\Schema(
 *                         @OA\Property(property="email", type="string", example="admin@admin.com"),
 *                         @OA\Property(property="password", type="string", example="password"),
 *                     )
 *                 }
 *             )
 *         ),
 *
 *         @OA\Response(
 *             response=201,
 *             description="Сopy the access token into the authorization.",
 *             @OA\JsonContent(
 *                 @OA\Property(property="access_token", type="string", example="access_token"),
 *             )
 *         ),
 *     ),
 */

class UserController extends Controller
{

}
