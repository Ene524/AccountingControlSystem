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
     * @param bool|null $remember
     * @return ServiceResponse
     */
    public function login(string $email, string $password, ?bool $remember): ServiceResponse;

    /**
     * @param string $email
     * @return ServiceResponse
     */
    public function findByEmail(string $email): ServiceResponse;

    /**
     * @param string $email
     * @return ServiceResponse
     */
    public function forgotPassword(string $email): ServiceResponse;

    /**
     * @param string $email
     * @param string $password
     * @param string $token
     * @return ServiceResponse
     */
    public function resetPassword(string $email, string $password): ServiceResponse;

    /**
     * @param string $email
     * @param string $oldPassword
     * @param string $password
     * @return ServiceResponse
     */
    public function updatePassword(string $email, string $oldPassword, string $password): ServiceResponse;

    /**
     * @param string $email
     * @param string $name
     * @return ServiceResponse
     */
    public function updateProfile(string $email, string $name): ServiceResponse;

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse;

    public function logout(): ServiceResponse;
}
