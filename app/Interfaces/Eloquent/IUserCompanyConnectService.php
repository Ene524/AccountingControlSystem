<?php

namespace App\Interfaces\Eloquent;
use App\Core\ServiceResponse;

/**
 *
 */
interface IUserCompanyConnectService
{
    /**
     * @param int $user_id
     * @param int $company_id
     * @return ServiceResponse
     */
    public function create(int $user_id, int $company_id): ServiceResponse;

    /**
     * @param int $user_id
     * @return ServiceResponse
     */
    public function getCompaniesByUserId(int $user_id): ServiceResponse;

    /**
     * @param int $company_id
     * @return ServiceResponse
     */
    public function getUsersByCompanyId(int $company_id): ServiceResponse;

    /**
     * @param int $user_id
     * @param int $company_id
     * @return ServiceResponse
     */
    public function delete(int $user_id, int $company_id): ServiceResponse;
}
