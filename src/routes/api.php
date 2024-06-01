<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 01:29:05
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 01:31:24
 * @ Description:
 */

use App\Infrastructure\Route\Route;

return [
    // Auth
    Route::get("login","/api/auth/login", [\App\Infrastructure\Controllers\Auth\LoginController::class]),
    
    // Users
    Route::get("users-find-all","/api/users", [\App\Infrastructure\Controllers\UserController::class, "findAll"]),
    Route::get("users-find-by-id","/api/users/{id}", [\App\Infrastructure\Controllers\UserController::class, "findById"]),
    Route::post("users-create","/api/users", [\App\Infrastructure\Controllers\UserController::class, "create"]),
    Route::put("users-update","/api/users/{id}", [\App\Infrastructure\Controllers\UserController::class, "update"]),
    Route::delete("users-delete","/api/users/{id}", [\App\Infrastructure\Controllers\UserController::class, "delete"]),

    // Send Email
    Route::post("send-email", "/api/send-email", []),
];