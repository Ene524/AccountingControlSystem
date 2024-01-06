<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;


/**
 *
 */
interface IUserService extends IEloquentService
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return ServiceResponse
     */
    public function register(string $name, string $email, string $password): ServiceResponse;

    /**
     * @param string $email
     * @param string $password
     * @return ServiceResponse
     */
    public function login(string $email, string $password): ServiceResponse;

    /**
     * @param string $email
     * @return ServiceResponse
     */
    public function findByEmail(string $email): ServiceResponse;

    public function forgotPassword(string $email): ServiceResponse;

    public function resetPassword(string $email,string $password, string $token): ServiceResponse;
}
