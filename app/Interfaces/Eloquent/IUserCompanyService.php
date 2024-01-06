<?php


use App\Core\ServiceResponse;

/**
 *
 */
interface IUserCompanyService
{
    /**
     * @param int $user_id
     * @param int $company_id
     * @return ServiceResponse
     */
    public function create(int $user_id, int $company_id): ServiceResponse;
}
