<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IUserCompanyConnectService;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;

/**
 *
 */
class UserCompanyConnectService implements IUserCompanyConnectService
{
    /**
     * @param int $user_id
     * @param int $company_id
     * @return ServiceResponse
     */
    public function create(int $user_id, int $company_id): ServiceResponse
    {
        $company = Company::find($company_id);
        $user = User::find($user_id);

        if (!$company || !$user) {
            return new ServiceResponse(
                false,
                'Company or user not found',
                null,
                404
            );
        } else {
            $company->user()->syncWithoutDetaching($user);

            return new ServiceResponse(
                true,
                'User Company Connect created successfully',
                null,
                200
            );
        }
    }

    /**
     * @param int $user_id
     * @return ServiceResponse
     */
    public function getCompaniesByUserId(int $user_id): ServiceResponse
    {
        // TODO: Implement getCompaniesByUserId() method.
    }

    /**
     * @param int $company_id
     * @return ServiceResponse
     */
    public function getUsersByCompanyId(int $company_id): ServiceResponse
    {
        // TODO: Implement getUsersByCompanyId() method.
    }

    /**
     * @param int $user_id
     * @param int $company_id
     * @return ServiceResponse
     */
    public function delete(int $user_id, int $company_id): ServiceResponse
    {
        $company = Company::find($company_id);
        $user = User::find($user_id);

        if (!$company || !$user) {
            return new ServiceResponse(
                false,
                'Company or user not found',
                null,
                404
            );
        } else {
            $company->user()->detach($user);

            return new ServiceResponse(
                true,
                'User Company Connect deleted successfully',
                null,
                200
            );
        }
    }
}
