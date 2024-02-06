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
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $userCompanyConnects = CompanyUser::paginate(10);
        return new ServiceResponse(
            true,
            'User Company Connects retrieved successfully',
            $userCompanyConnects,
            200
        );
    }


    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $companyUser = CompanyUser::where('id', $id)->first();
        if (!$companyUser) {
            return new ServiceResponse(false, "Company User Connection not found", null, 404);
        }
        return new ServiceResponse(true, "Company User Connection is found", $companyUser, 200);
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */


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

    public function getCompaniesByUserId(int $user_id): ServiceResponse
    {
        // TODO: Implement getCompaniesByUserId() method.
    }

    public function getUsersByCompanyId(int $company_id): ServiceResponse
    {
        // TODO: Implement getUsersByCompanyId() method.
    }

    public function delete(int $user_id, int $company_id): ServiceResponse
    {

    }
}
