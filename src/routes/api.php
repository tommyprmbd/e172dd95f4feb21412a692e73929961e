<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 01:29:05
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 13:56:39
 * @ Description:
 */

use App\Infrastructure\Route\Route;

/**
 * Route names must adhere to the following format: [entity_name]-[action_name].
 */
return [
    // Auth
    Route::get("auth-login","/api/auth/login", [\App\Infrastructure\Controllers\Auth\LoginController::class]),
    
    // Users
    Route::get("users-find_all","/api/users", [\App\Infrastructure\Controllers\UserController::class, "findAll"]),
    Route::get("users-find_by_id","/api/users/{id}", [\App\Infrastructure\Controllers\UserController::class, "findById"]),
    Route::post("users-create","/api/users", [\App\Infrastructure\Controllers\UserController::class, "create"]),
    Route::put("users-update","/api/users/{id}", [\App\Infrastructure\Controllers\UserController::class, "update"]),
    Route::delete("users-delete","/api/users/{id}", [\App\Infrastructure\Controllers\UserController::class, "delete"]),

    // Email
    Route::post("email_queue-send", "/api/send-email", [\App\Infrastructure\Controllers\SendEmailController::class, "send"]),
];