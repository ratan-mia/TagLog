<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => '',
            'name'                       => 'Name',
            'name_helper'                => '',
            'email'                      => 'Email',
            'email_helper'               => '',
            'email_verified_at'          => 'Email verified at',
            'email_verified_at_helper'   => '',
            'password'                   => 'Password',
            'password_helper'            => '',
            'roles'                      => 'Roles',
            'roles_helper'               => '',
            'remember_token'             => 'Remember Token',
            'remember_token_helper'      => '',
            'created_at'                 => 'Created at',
            'created_at_helper'          => '',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => '',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => '',
            'country'                    => 'Country',
            'country_helper'             => '',
            'city'                       => 'City',
            'city_helper'                => '',
            'date_of_birth'              => 'Date Of Birth',
            'date_of_birth_helper'       => '',
            'gender'                     => 'Gender',
            'gender_helper'              => '',
            'education_level'            => 'Education Level',
            'education_level_helper'     => '',
            'phone'                      => 'Phone',
            'phone_helper'               => '',
            'facebook'                   => 'Facebook ID',
            'facebook_helper'            => '',
            'skype'                      => 'Skype',
            'skype_helper'               => '',
            'destination_country'        => 'Destination Country',
            'destination_country_helper' => '',
            'visa_type'                  => 'Visa Type',
            'visa_type_helper'           => '',
            'expected_industries'        => 'Expected Industries',
            'expected_industries_helper' => '',
            'expected_salary'            => 'Expected  monthly Salary',
            'expected_salary_helper'     => '',
            'date_of_leaving'            => 'Date Of Leaving',
            'date_of_leaving_helper'     => '',
            'employer'                   => 'Employer',
            'employer_helper'            => '',
            'agents'                     => 'Agents',
            'agents_helper'              => '',
            'indurstry'                  => 'Indurstry',
            'indurstry_helper'           => '',
            'profile_picture'            => 'Profile Picture',
            'profile_picture_helper'     => '',
        ],
    ],
    'country'        => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'name'                    => 'Name',
            'name_helper'             => '',
            'short_code'              => 'Short Code',
            'short_code_helper'       => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'language'                => 'Language',
            'language_helper'         => '',
            'currency'                => 'Currency',
            'currency_helper'         => '',
            'religion'                => 'Religion',
            'religion_helper'         => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'safe_food'               => 'Safe Food',
            'safe_food_helper'        => '',
            'food'                    => 'Food',
            'food_helper'             => '',
            'safe_medicine'           => 'Safe Medicine',
            'safe_medicine_helper'    => '',
            'health_insurance'        => 'Health Insurance',
            'health_insurance_helper' => '',
            'healthcare'              => 'Healthcare',
            'healthcare_helper'       => '',
            'taxi_available'          => 'Taxi Available',
            'taxi_available_helper'   => '',
            'transport'               => 'Transport',
            'transport_helper'        => '',
            'culture'                 => 'Culture',
            'culture_helper'          => '',
            'politics'                => 'Politics',
            'politics_helper'         => '',
            'flag'                    => 'Flag',
            'flag_helper'             => '',
            'gallery'                 => 'Gallery',
            'gallery_helper'          => '',
            'additional_files'        => 'Additional Files',
            'additional_files_helper' => '',
        ],
    ],
    'city'           => [
        'title'          => 'Cities',
        'title_singular' => 'City',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'category'       => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'icon'              => 'Icon',
            'icon_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'industry'       => [
        'title'          => 'Industries',
        'title_singular' => 'Industry',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => '',
            'name'                         => 'Name',
            'name_helper'                  => '',
            'description'                  => 'Description',
            'description_helper'           => '',
            'minimum_salary'               => 'Minimum Salary (Monthly)',
            'minimum_salary_helper'        => '',
            'maximum_salary'               => 'Maximum Salary(Monthly)',
            'maximum_salary_helper'        => '',
            'education_level'              => 'Education Level',
            'education_level_helper'       => '',
            'training_level'               => 'Training Level',
            'training_level_helper'        => '',
            'language_course'              => 'Language Course',
            'language_course_helper'       => '',
            'language_course_level'        => 'Language Course Level',
            'language_course_level_helper' => '',
            'icon'                         => 'Icon',
            'icon_helper'                  => '',
            'logo'                         => 'Logo',
            'logo_helper'                  => '',
            'banner_titile'                => 'Banner Titile',
            'banner_titile_helper'         => '',
            'banner_image'                 => 'Banner Image',
            'banner_image_helper'          => '',
            'banner_text'                  => 'Banner Text',
            'banner_text_helper'           => '',
            'gallery'                      => 'Gallery',
            'gallery_helper'               => '',
            'sliders'                      => 'Sliders',
            'sliders_helper'               => '',
            'created_at'                   => 'Created at',
            'created_at_helper'            => '',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => '',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => '',
        ],
    ],
    'agent'          => [
        'title'          => 'Agents',
        'title_singular' => 'Agent',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'name'                    => 'Name',
            'name_helper'             => '',
            'address'                 => 'Address',
            'address_helper'          => '',
            'email'                   => 'Email',
            'email_helper'            => '',
            'phone'                   => 'Phone',
            'phone_helper'            => '',
            'map'                     => 'Map',
            'map_helper'              => '',
            'interview_period'        => 'Interview Period',
            'interview_period_helper' => '',
            'total_expense'           => 'Total Expense',
            'total_expense_helper'    => '',
            'language_level'          => 'Language Level',
            'language_level_helper'   => '',
            'destination'             => 'Destination',
            'destination_helper'      => '',
            'industry'                => 'Industry',
            'industry_helper'         => '',
            'leaving_period'          => 'Leaving Period',
            'leaving_period_helper'   => '',
            'workers_sent'            => 'Workers Sent',
            'workers_sent_helper'     => '',
            'logo'                    => 'Logo',
            'logo_helper'             => '',
            'banner_titile'           => 'Banner Titile',
            'banner_titile_helper'    => '',
            'banner_image'            => 'Banner Image',
            'banner_image_helper'     => '',
            'banner_text'             => 'Banner Text',
            'banner_text_helper'      => '',
            'sliders'                 => 'Sliders',
            'sliders_helper'          => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'employers'               => 'Employers',
            'employers_helper'        => '',
        ],
    ],
    'employer'       => [
        'title'          => 'Employers',
        'title_singular' => 'Employer',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'name'                      => 'Name',
            'name_helper'               => '',
            'email'                     => 'Email',
            'email_helper'              => '',
            'phone'                     => 'Phone',
            'phone_helper'              => '',
            'address'                   => 'Address',
            'address_helper'            => '',
            'description'               => 'Description',
            'description_helper'        => '',
            'recruiting_workers'        => 'Recruiting Workers',
            'recruiting_workers_helper' => '',
            'countries'                 => 'Countries',
            'countries_helper'          => '',
            'agents'                    => 'Agents',
            'agents_helper'             => '',
            'industries'                => 'Industries',
            'industries_helper'         => '',
            'monthly_salary'            => 'Monthly Salary',
            'monthly_salary_helper'     => '',
            'working_hours'             => 'Working Hours/Week',
            'working_hours_helper'      => '',
            'days_off'                  => 'Days off per months',
            'days_off_helper'           => '',
            'logo'                      => 'Logo',
            'logo_helper'               => '',
            'banner_titile'             => 'Banner Titile',
            'banner_titile_helper'      => '',
            'banner_image'              => 'Banner Image',
            'banner_image_helper'       => '',
            'banner_text'               => 'Banner Text',
            'banner_text_helper'        => '',
            'gallery'                   => 'Gallery',
            'gallery_helper'            => '',
            'sliders'                   => 'Sliders',
            'sliders_helper'            => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => '',
        ],
    ],
    'company'        => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'address'            => 'Address',
            'address_helper'     => '',
            'description'        => 'Description',
            'description_helper' => '',
            'city'               => 'City',
            'city_helper'        => '',
            'categories'         => 'Categories',
            'categories_helper'  => '',
            'logo'               => 'Logo',
            'logo_helper'        => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'setting'        => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => '',
            'name'                       => 'Name',
            'name_helper'                => '',
            'email'                      => 'Email',
            'email_helper'               => '',
            'phone'                      => 'Phone',
            'phone_helper'               => '',
            'url'                        => 'Url',
            'url_helper'                 => '',
            'address'                    => 'Address',
            'address_helper'             => '',
            'logo'                       => 'Logo',
            'logo_helper'                => '',
            'philosophy_title'           => 'Philosophy Title',
            'philosophy_title_helper'    => '',
            'philosophy_sentence'        => 'Philosophy Sentence',
            'philosophy_sentence_helper' => '',
            'philosophy_image'           => 'Philosophy Image',
            'philosophy_image_helper'    => '',
            'business_title'             => 'Business Title',
            'business_title_helper'      => '',
            'business_sentence'          => 'Business Sentence',
            'business_sentence_helper'   => '',
            'business_image'             => 'Business Image',
            'business_image_helper'      => '',
            'created_at'                 => 'Created at',
            'created_at_helper'          => '',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => '',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => '',
            'slider'                     => 'Slider',
            'slider_helper'              => '',
        ],
    ],
    'comment'        => [
        'title'          => 'Comment',
        'title_singular' => 'Comment',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'rating'                  => 'Rating',
            'rating_helper'           => '',
            'comment_type'            => 'Comment Type',
            'comment_type_helper'     => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'comment'                 => 'Comment',
            'comment_helper'          => '',
            'commenter'               => 'Commenter',
            'commenter_helper'        => '',
            'commentable_type'        => 'Commentable Type',
            'commentable_type_helper' => '',
            'commentable'             => 'Commentable',
            'commentable_helper'      => '',
            'approved'                => 'Approved',
            'approved_helper'         => '',
        ],
    ],
    'destination'       => [
        'title'          => 'Destination',
        'title_singular' => 'Destination',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'name'                  => 'Name',
            'country'               => 'Country',
            'name_helper'           => '',
            'language'              => 'Language',
            'language_helper'       => '',
            'currency'              => 'Currency',
            'currency_helper'       => '',
            'address'               => 'Address',
            'address_helper'        => '',
            'flag'                  => 'Flag',
            'flag_helper'           => '',
            'gallery'               => 'Gallery',
            'gallery_helper'        => '',
            'industries'            => 'Industries',
            'industries_helper'     => '',
            'employers'             => 'Employers',
            'employers_helper'      => '',
            'agents'                => 'Agents',
            'agents_helper'         => '',
            'hourly_salary'         => 'Hourly Salary',
            'hourly_salary_helper'  => '',
            'monthly_salary'        => 'Monthly Salary',
            'monthly_salary_helper' => '',
            'yearly_salary'         => 'Yearly Salary',
            'yearly_salary_helper'  => '',
            'safe_medicine'         => 'Safe Medicine',
            'safe_medicine_helper'  => '',
            'healthcare'            => 'Healthcare',
            'healthcare_helper'     => '',
            'taxi_available'        => 'Taxi Available',
            'taxi_available_helper' => '',
            'safety'                => 'Safety',
            'safety_helper'         => '',
            'culture'               => 'Culture',
            'culture_helper'        => '',
            'politics'              => 'Politics',
            'politics_helper'       => '',
            'insurance'             => 'Insurance',
            'insurance_helper'      => '',
            'documents'             => 'Documents',
            'documents_helper'      => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'visa'              => [
        'title'          => 'Visa Types',
        'title_singular' => 'Visa Type',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => '',
            'name'                          => 'Name',
            'name_helper'                   => '',
            'type'                          => 'Type',
            'type_helper'                   => '',
            'countries_without_visa'        => 'Entry Without Visa(Country)',
            'countries_without_visa_helper' => '',
            'duration'                      => 'Duration',
            'duration_helper'               => '',
            'work_permit'                   => 'Work Permit',
            'work_permit_helper'            => '',
            'working_limit'                 => 'Working Limit(hours)',
            'working_limit_helper'          => '',
            'industries'                    => 'Industries',
            'industries_helper'             => '',
            'language_traning'              => 'Language Traning',
            'language_traning_helper'       => '',
            'training_duration'             => 'Training Duration(months)',
            'training_duration_helper'      => '',
            'countries_restrictred'         => 'Restrictred Countries',
            'countries_restrictred_helper'  => '',
            'created_at'                    => 'Created at',
            'created_at_helper'             => '',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => '',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => '',
        ],
    ],
    'siteSetting'    => [
        'title'          => 'Site Setting',
        'title_singular' => 'Site Setting',
    ],
    'experience'     => [
        'title'          => 'Experience',
        'title_singular' => 'Experience',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => '',
            'user'                           => 'User',
            'user_helper'                    => '',
            'agent'                          => 'Name of Recruitment Agents',
            'agent_helper'                   => '',
            'destination_country'            => 'Destination Country',
            'destination_country_helper'     => '',
            'visa_type'                      => 'Visa Type',
            'visa_type_helper'               => '',
            'application_period'             => 'Period of Apply-Leaving for destination',
            'application_period_helper'      => '',
            'expenses_paid'                  => 'Period of Apply-Leaving for destination',
            'expenses_paid_helper'           => '',
            'language_level'                 => 'Language Level',
            'language_level_helper'          => '',
            'agent_rating'                   => 'Agent Rating',
            'agent_rating_helper'            => '',
            'employer'                       => 'Employer Name',
            'employer_helper'                => '',
            'industry'                       => 'Industry/Job Type',
            'industry_helper'                => '',
            'emloyment_date'                 => 'Emloyment Date',
            'emloyment_date_helper'          => '',
            'employment_period'              => 'Employment Period(Years)',
            'employment_period_helper'       => '',
            'monthly_salary'                 => 'Monthly Salary',
            'monthly_salary_helper'          => '',
            'monthly_living_expenses'        => 'Monthly Living Expenses',
            'monthly_living_expenses_helper' => '',
            'accommodation_type'             => 'Accommodation Type',
            'accommodation_type_helper'      => '',
            'weekly_working_hours'           => 'Weekly Working Hours',
            'weekly_working_hours_helper'    => '',
            'created_at'                     => 'Created at',
            'created_at_helper'              => '',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => '',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => '',
            'agent_feedback'                 => 'Free comment about Recruitment Agent',
            'agent_feedback_helper'          => '',
            'monthly_days_off'               => 'Monthly Days Off',
            'monthly_days_off_helper'        => '',
            'next_year_opportunity'          => 'Next Year Opportunity',
            'next_year_opportunity_helper'   => '',
            'employer_rating'                => 'Recommendation about employer Min0-10Max',
            'employer_rating_helper'         => '',
            'employer_feedback'              => 'Free comment about Employers',
            'employer_feedback_helper'       => '',
        ],
    ],
];