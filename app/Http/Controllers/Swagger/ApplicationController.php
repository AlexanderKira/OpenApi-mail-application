<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Application API",
 *     version="1.0.0",
 * ),
 * @OA\Post(
 *     path="/api/applications/store",
 *     summary="Сreate an application",
 *     tags={"Applications"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name",type="string", example="Alexander"),
 *                     @OA\Property(property="email",type="string", example="admin@mail.com"),
 *                     @OA\Property(property="message",type="string", example="Please respond to my application"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Create an application.",
 *         @OA\JsonContent(
 *                      @OA\Property(property="name",type="string", example="Alexander"),
 *                      @OA\Property(property="email",type="string", example="admin@mail.com"),
 *                      @OA\Property(property="message",type="string", example="Please respond to my application"),
 *          )
 *     ),
 * ),
 *
 * @OA\Get(
 *      path="/api/applications/index",
 *      summary="Show all applications or filter by status and date",
 *      tags={"Applications"},
 *
 *
 *     @OA\Parameter(
 *          name="status",
 *          in="query",
 *          description="Application status: Active or Resolved",
 *          required=false,
 *          example="active"
 *      ),
 *
 *     @OA\Parameter(
 *           name="start_date",
 *           in="query",
 *           description="Application start date",
 *           required=false,
 *           example="2024-01-01"
 *       ),
 *
 *     @OA\Parameter(
 *           name="end_date",
 *           in="query",
 *           description="Application end date",
 *           required=false,
 *           example="2024-12-31"
 *       ),
 *
 *      @OA\Response(
 *          response=201,
 *          description="Filtering by status and date we get a list of applications.",
 *          @OA\JsonContent(
 *              @OA\Property(property="applications", type="object",
 *                  @OA\Property(property="id", type="integer", example="10"),
 *                  @OA\Property(property="name", type="string", example="Alexander"),
 *                  @OA\Property(property="email", type="string", example="admin@mail.com"),
 *                  @OA\Property(property="status", type="string", example="active"),
 *                  @OA\Property(property="message", type="string", example="Please respond to my application"),
 *                  @OA\Property(property="comment", example=null),
 *                  @OA\Property(property="created_at", type="string", example="2024-01-28T15:07:09.000000Z"),
 *                  @OA\Property(property="updated_at", type="string", example="2024-01-28T15:07:09.000000Z"),
 *              ),
 *          )
 *      ),
 *  ),
 *
 * @OA\Put(
 *       path="/api/applications/update/{application}",
 *       summary="status update and reply to email",
 *       tags={"Applications"},
 *
 *       @OA\Parameter(
 *           description="ID",
 *           in="path",
 *           name="application",
 *           required=true,
 *           example=1
 *       ),
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="comment", type="string", example="Responding to your e-mail request, thank you."),
 *                   )
 *               }
 *           )
 *       ),
 *
 *       @OA\Response(
 *           response=201,
 *           description="Send an email to the request id.",
 *           @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="Reply sent"),
 *           )
 *       ),
 *   ),
 *
 *
 */

class ApplicationController extends Controller
{

}
