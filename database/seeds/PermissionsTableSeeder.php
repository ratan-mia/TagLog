<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'country_create',
            ],
            [
                'id'    => '18',
                'title' => 'country_edit',
            ],
            [
                'id'    => '19',
                'title' => 'country_show',
            ],
            [
                'id'    => '20',
                'title' => 'country_delete',
            ],
            [
                'id'    => '21',
                'title' => 'country_access',
            ],
            [
                'id'    => '22',
                'title' => 'industry_create',
            ],
            [
                'id'    => '23',
                'title' => 'industry_edit',
            ],
            [
                'id'    => '24',
                'title' => 'industry_show',
            ],
            [
                'id'    => '25',
                'title' => 'industry_delete',
            ],
            [
                'id'    => '26',
                'title' => 'industry_access',
            ],
            [
                'id'    => '27',
                'title' => 'agent_create',
            ],
            [
                'id'    => '28',
                'title' => 'agent_edit',
            ],
            [
                'id'    => '29',
                'title' => 'agent_show',
            ],
            [
                'id'    => '30',
                'title' => 'agent_delete',
            ],
            [
                'id'    => '31',
                'title' => 'agent_access',
            ],
            [
                'id'    => '32',
                'title' => 'employer_create',
            ],
            [
                'id'    => '33',
                'title' => 'employer_edit',
            ],
            [
                'id'    => '34',
                'title' => 'employer_show',
            ],
            [
                'id'    => '35',
                'title' => 'employer_delete',
            ],
            [
                'id'    => '36',
                'title' => 'employer_access',
            ],
            [
                'id'    => '37',
                'title' => 'experience_create',
            ],
            [
                'id'    => '38',
                'title' => 'experience_edit',
            ],
            [
                'id'    => '39',
                'title' => 'experience_show',
            ],
            [
                'id'    => '40',
                'title' => 'experience_delete',
            ],
            [
                'id'    => '41',
                'title' => 'experience_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
