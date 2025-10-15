<?php

return [
    'permissions' => [
        // Dashboard
        [
            'name' => 'admin.dashboard',
            'display_name' => 'View Dashboard',
            'url' => '/admin/dashboard',
        ],

        // Models
        [
            'name' => 'models.index',
            'display_name' => 'View Models',
            'url' => '/admin/models',
        ],
        [
            'name' => 'models.create',
            'display_name' => 'Create Model',
            'url' => '/admin/models/create',
        ],
        [
            'name' => 'models.store',
            'display_name' => 'Store Model',
            'url' => '/admin/models',
        ],
        [
            'name' => 'models.show',
            'display_name' => 'Show Model Detail',
            'url' => '/admin/models',
        ],
        [
            'name' => 'models.edit',
            'display_name' => 'Edit Model',
            'url' => '/admin/models/{id}/edit',
        ],
        [
            'name' => 'models.update',
            'display_name' => 'Update Model',
            'url' => '/admin/models/{id}',
        ],
        [
            'name' => 'models.destroy',
            'display_name' => 'Delete Model',
            'url' => '/admin/models/{id}',
        ],

        // Events
        [
            'name' => 'event.index',
            'display_name' => 'View Events',
            'url' => '/admin/event',
        ],
        [
            'name' => 'event.show',
            'display_name' => 'Show Event Detail',
            'url' => '/admin/event',
        ],
        [
            'name' => 'event.create',
            'display_name' => 'Create Event',
            'url' => '/admin/event/create',
        ],
        [
            'name' => 'event.store',
            'display_name' => 'Store Event',
            'url' => '/admin/event',
        ],
        [
            'name' => 'event.edit',
            'display_name' => 'Edit Event',
            'url' => '/admin/event/{id}/edit',
        ],
        [
            'name' => 'event.update',
            'display_name' => 'Update Event',
            'url' => '/admin/event/{id}',
        ],
        [
            'name' => 'event.destroy',
            'display_name' => 'Delete Event',
            'url' => '/admin/event/{id}',
        ],

        // Volunteers
        [
            'name' => 'volunteers.index',
            'display_name' => 'View Volunteers',
            'url' => '/admin/volunteers',
        ],
        [
            'name' => 'volunteers.create',
            'display_name' => 'Create Volunteer',
            'url' => '/admin/volunteers/create',
        ],
        [
            'name' => 'volunteers.show',
            'display_name' => 'Show Volunteer',
            'url' => '/admin/volunteers/create',
        ],
        [
            'name' => 'volunteers.store',
            'display_name' => 'Store Volunteer',
            'url' => '/admin/volunteers',
        ],
        [
            'name' => 'volunteers.edit',
            'display_name' => 'Edit Volunteer',
            'url' => '/admin/volunteers/{id}/edit',
        ],
        [
            'name' => 'volunteers.update',
            'display_name' => 'Update Volunteer',
            'url' => '/admin/volunteers/{id}',
        ],
        [
            'name' => 'volunteers.destroy',
            'display_name' => 'Delete Volunteer',
            'url' => '/admin/volunteers/{id}',
        ],


        // Hire Requests
        [
            'name' => 'hireRequests.index',
            'display_name' => 'View Hire Requests',
            'url' => '/admin/hireRequests',
        ],
        [
            'name' => 'hireRequests.updateStatus',
            'display_name' => 'Update Hire Request Status',
            'url' => '/admin/hire-requests/{id}/{status}',
        ],

        // Ramp Walk Applications
        [
            'name' => 'ramp-applications.index',
            'display_name' => 'View Ramp Walk Applications List',
            'url' => '/admin/ramp-applications',
        ],
        [
            'name' => 'ramp-applications.show',
            'display_name' => 'Show Ramp Walk Applications Details',
            'url' => '/admin/ramp-applications',
        ],
        [
            'name' => 'ramp-applications.approve',
            'display_name' => 'Approve Ramp Walk Application',
            'url' => '/admin/ramp-applications/{id}/approve',
        ],
        [
            'name' => 'ramp-applications.reject',
            'display_name' => 'Reject Ramp Walk Application',
            'url' => '/admin/ramp-applications/{id}/reject',
        ],

        // Bookings
        [
            'name' => 'bookings.index',
            'display_name' => 'View Bookings',
            'url' => '/admin/bookings',
        ],
        [
            'name' => 'bookings.create',
            'display_name' => 'Create Booking',
            'url' => '/admin/bookings/create',
        ],
        [
            'name' => 'bookings.show',
            'display_name' => 'Show Booking Details',
            'url' => '/admin/bookings/create',
        ],
        [
            'name' => 'bookings.edit',
            'display_name' => 'Edit Booking',
            'url' => '/admin/bookings/{id}/edit',
        ],
        [
            'name' => 'bookings.destroy',
            'display_name' => 'Delete Booking',
            'url' => '/admin/bookings/{id}',
        ],
        [
            'name' => 'bookings.update',
            'display_name' => 'Update Booking',
            'url' => '/admin/bookings/{id}',
        ],

        // Packages
        [
            'name' => 'packages.index',
            'display_name' => 'View Packages',
            'url' => '/admin/packages',
        ],
        [
            'name' => 'packages.create',
            'display_name' => 'Create Package',
            'url' => '/admin/packages/create',
        ],
        [
            'name' => 'packages.show',
            'display_name' => 'Show Package',
            'url' => '/admin/packages/create',
        ],
        [
            'name' => 'packages.store',
            'display_name' => 'Store Package',
            'url' => '/admin/packages/create',
        ],
        [
            'name' => 'packages.edit',
            'display_name' => 'Edit Package',
            'url' => '/admin/packages/{id}/edit',
        ],
        [
            'name' => 'packages.update',
            'display_name' => 'Update Package',
            'url' => '/admin/packages/{id}/edit',
        ],
        [
            'name' => 'packages.destroy',
            'display_name' => 'Delete Package',
            'url' => '/admin/packages/{id}',
        ],

        //Sponsorship

        [
            'name' => 'sponsership.index',
            'display_name' => 'View Sponsorship',
            'url' => '/admin/sponsorship',
        ],
        [
            'name' => 'sponsership.create',
            'display_name' => 'Create Sponsorship',
            'url' => '/admin/sponsorship/create',
        ],
        [
            'name' => 'sponsership.show',
            'display_name' => 'Show Sponsorship',
            'url' => '/admin/sponsorship/create',
        ],
        [
            'name' => 'sponsership.store',
            'display_name' => 'Store Sponsorship',
            'url' => '/admin/sponsorship/create',
        ],
        [
            'name' => 'sponsership.edit',
            'display_name' => 'Edit Sponsorship',
            'url' => '/admin/sponsorship/{id}/edit',
        ],
        [
            'name' => 'sponsership.destroy',
            'display_name' => 'Delete Sponsorship',
            'url' => '/admin/sponsorship/{id}',
        ],
        [
            'name' => 'sponsership.update',
            'display_name' => 'Delete Sponsorship',
            'url' => '/admin/sponsorship/{id}',
        ],

        // Roles
        [
            'name' => 'role.index',
            'display_name' => 'View Roles',
            'url' => '/admin/role',
        ],
        [
            'name' => 'role.create',
            'display_name' => 'Create Role',
            'url' => '/admin/role/create',
        ],
        [
            'name' => 'role.show',
            'display_name' => 'Show Role',
            'url' => '/admin/role/create',
        ],
        [
            'name' => 'role.store',
            'display_name' => 'Store Role',
            'url' => '/admin/role',
        ],
        [
            'name' => 'role.edit',
            'display_name' => 'Edit Role',
            'url' => '/admin/role/{id}/edit',
        ],
        [
            'name' => 'role.update',
            'display_name' => 'Update Role',
            'url' => '/admin/role/{id}',
        ],
        [
            'name' => 'role.destroy',
            'display_name' => 'Delete Role',
            'url' => '/admin/role/{id}',
        ],
        // Users
        [
            'name' => 'user.index',
            'display_name' => 'View Users',
            'url' => '/admin/user',
        ],
        [
            'name' => 'user.create',
            'display_name' => 'Create User',
            'url' => '/admin/user/create',
        ],
        [
            'name' => 'user.show',
            'display_name' => 'Show User',
            'url' => '/admin/user/create',
        ],
        [
            'name' => 'user.store',
            'display_name' => 'Store User',
            'url' => '/admin/user/create',
        ],
        [
            'name' => 'user.edit',
            'display_name' => 'Edit User',
            'url' => '/admin/user/{id}/edit',
        ],
        [
            'name' => 'user.destroy',
            'display_name' => 'Delete User',
            'url' => '/admin/user/{id}',
        ],
        [
            'name' => 'user.update',
            'display_name' => 'Update User',
            'url' => '/admin/user/{id}',
        ],

        // Payments
        // [
        //     'name' => 'payments.index',
        //     'display_name' => 'View Payments',
        //     'url' => '/admin/payments',
        // ],
        // [
        //     'name' => 'payments.create',
        //     'display_name' => 'Create Payment',
        //     'url' => '/admin/payments/create',
        // ],
        // [
        //     'name' => 'payments.edit',
        //     'display_name' => 'Edit Payment',
        //     'url' => '/admin/payments/{id}/edit',
        // ],
        // [
        //     'name' => 'payments.destroy',
        //     'display_name' => 'Delete Payment',
        //     'url' => '/admin/payments/{id}',
        // ],

        // Gallery
        [
            'name' => 'gallery.index',
            'display_name' => 'View Gallery',
            'url' => '/admin/gallery',
        ],
        [
            'name' => 'gallery.create',
            'display_name' => 'Add Gallery Item',
            'url' => '/admin/gallery/create',
        ],
        [
            'name' => 'gallery.show',
            'display_name' => 'Show Gallery Item',
            'url' => '/admin/gallery/create',
        ],
        [
            'name' => 'gallery.store',
            'display_name' => 'Store Gallery Item',
            'url' => '/admin/gallery/create',
        ],
        [
            'name' => 'gallery.edit',
            'display_name' => 'Edit Gallery Form',
            'url' => '/admin/gallery/{id}/edit',
        ],
        [
            'name' => 'gallery.update',
            'display_name' => 'Update Gallery Item',
            'url' => '/admin/gallery/{id}/edit',
        ],
        [
            'name' => 'gallery.destroy',
            'display_name' => 'Delete Gallery Item',
            'url' => '/admin/gallery/{id}',
        ],

        // Subscribers
        [
            'name' => 'subscribers.index',
            'display_name' => 'View Subscribers',
            'url' => '/admin/subscribers',
        ],
        [
            'name' => 'subscribers.destroy',
            'display_name' => 'Delete Subscribers',
            'url' => '/admin/subscribers',
        ],

        // Profile
        [
            'name' => 'admin.profile.edit',
            'display_name' => 'Profile Edit Form',
            'url' => '/admin/profile',
        ],
        [
            'name' => 'admin.profile.update',
            'display_name' => 'Update Profile',
            'url' => '/admin/profile',
        ],
        [
            'name' => 'admin.profile.password.update',
            'display_name' => 'Change Password',
            'url' => '/admin/profile/password',
        ],

        //Logout

        [
            'name' => 'logout',
            'display_name' => 'Logout',
            'url' => '/logout',
        ],
    ],
];
