<?php

define('PERMISSIONS_GROUPS', [

    'Dashboard',   //1
    'Model Management', //2
    'Ramp Walk Applications Management', //3
    'Story Contest Management', //4
    'Product Management', //5
    'Orders Management', //6
    'Package Management', //7
    'Event Management', //8
    'Sponsorship  Management', //9
    'Influencer Sponsorship Management', //10
    'Bookings / Photoshoot Management', //11
    'Hire Requests Management', //12
    'Logs / Login Trails Management', //13
    'Subscribers / Newsletter Management', //14
    'Role Management', //15
    'User Management', //16
    'Gallery Management', //17
    'Hero Section Management', //18

]);


define('PERMISSIONS', [

    // Dashboard
    [
        'name' => 'admin.dashboard',
        'display_name' => 'View Dashboard',
        'group_id' => 1,
    ],

    // Profile
    [
        'name' => 'admin.profile.edit',
        'display_name' => 'Profile Edit Form',
        'group_id' => 1,
    ],
    [
        'name' => 'admin.profile.update',
        'display_name' => 'Update Profile',
        'group_id' => 1,
    ],
    [
        'name' => 'admin.profile.password.update',
        'display_name' => 'Change Password',
        'group_id' => 1,
    ],

    //Logout

    [
        'name' => 'logout',
        'display_name' => 'Logout',
        'group_id' => 1,
    ],


    // Models
    [
        'name' => 'models.index',
        'display_name' => 'View Models',
        'group_id' => 2,
    ],
    [
        'name' => 'models.create',
        'display_name' => 'Create Model',
        'group_id' => 2,

    ],
    [
        'name' => 'models.store',
        'display_name' => 'Store Model',
        'group_id' => 2,
    ],
    [
        'name' => 'models.show',
        'display_name' => 'Show Model Detail',
        'group_id' => 2,
    ],
    [
        'name' => 'models.edit',
        'display_name' => 'Edit Model',
        'group_id' => 2,

    ],
    [
        'name' => 'models.update',
        'display_name' => 'Update Model',
        'group_id' => 2,

    ],
    [
        'name' => 'models.destroy',
        'display_name' => 'Delete Model',
        'group_id' => 2,

    ],


    // Ramp Walk Applications
    [
        'name' => 'ramp-applications.index',
        'display_name' => 'View Ramp Walk Applications List',
        'group_id' => 3,
    ],
    [
        'name' => 'ramp-applications.show',
        'display_name' => 'Show Ramp Walk Applications Details',
        'group_id' => 3,
    ],
    [
        'name' => 'ramp-applications.approve',
        'display_name' => 'Approve Ramp Walk Application',
        'group_id' => 3,
    ],
    [
        'name' => 'ramp-applications.reject',
        'display_name' => 'Reject Ramp Walk Application',
        'group_id' => 3,
    ],


    // Story Contest Management
    [
        'name' => 'stories.index',
        'display_name' => 'View stories',
        'group_id' => 4,
    ],
    [
        'name' => 'stories.create',
        'display_name' => 'Create Stories',
        'group_id' => 4,

    ],
    [
        'name' => 'stories.store',
        'display_name' => 'Store Stories',
        'group_id' => 4,
    ],
    [
        'name' => 'stories.show',
        'display_name' => 'Show Stories Detail',
        'group_id' => 4,
    ],
    [
        'name' => 'stories.edit',
        'display_name' => 'Edit Stories',
        'group_id' => 4,

    ],
    [
        'name' => 'stories.update',
        'display_name' => 'Update Stories',
        'group_id' => 4,

    ],
    [
        'name' => 'stories.destroy',
        'display_name' => 'Delete Stories',
        'group_id' => 4,

    ],

    // Product Management
    [
        'name' => 'products.index',
        'display_name' => 'View Products',
        'group_id' => 5,
    ],
    [
        'name' => 'products.show',
        'display_name' => 'Show Product Detail',
        'group_id' => 5,
    ],
    [
        'name' => 'products.create',
        'display_name' => 'Create Product',
        'group_id' => 5,
    ],
    [
        'name' => 'products.store',
        'display_name' => 'Store Product',
        'group_id' => 5,
    ],
    [
        'name' => 'products.edit',
        'display_name' => 'Edit Product',
        'group_id' => 5,
    ],
    [
        'name' => 'products.update',
        'display_name' => 'Update Product',
        'group_id' => 5,
    ],
    [
        'name' => 'products.destroy',
        'display_name' => 'Delete Product',
        'group_id' => 5,
    ],


    // Colors Management
    [
        'name' => 'colors.index',
        'display_name' => 'View Color',
        'group_id' => 5,
    ],
    [
        'name' => 'colors.show',
        'display_name' => 'Show Color Detail',
        'group_id' => 5,
    ],
    [
        'name' => 'colors.create',
        'display_name' => 'Create Color',
        'group_id' => 5,
    ],
    [
        'name' => 'colors.store',
        'display_name' => 'Store Color',
        'group_id' => 5,
    ],
    [
        'name' => 'colors.edit',
        'display_name' => 'Edit Color',
        'group_id' => 5,
    ],
    [
        'name' => 'colors.update',
        'display_name' => 'Update Color',
        'group_id' => 5,
    ],
    [
        'name' => 'colors.destroy',
        'display_name' => 'Delete Color',
        'group_id' => 5,
    ],

    // Sizes Management
    [
        'name' => 'size.index',
        'display_name' => 'View Size',
        'group_id' => 5,
    ],
    [
        'name' => 'size.show',
        'display_name' => 'Show Size Detail',
        'group_id' => 5,
    ],
    [
        'name' => 'size.create',
        'display_name' => 'Create Size',
        'group_id' => 5,
    ],
    [
        'name' => 'size.store',
        'display_name' => 'Store Size',
        'group_id' => 5,
    ],
    [
        'name' => 'size.edit',
        'display_name' => 'Edit Size',
        'group_id' => 5,
    ],
    [
        'name' => 'size.update',
        'display_name' => 'Update Size',
        'group_id' => 5,
    ],
    [
        'name' => 'size.destroy',
        'display_name' => 'Delete Size',
        'group_id' => 5,
    ],






    // Order Management
    [
        'name' => 'orders.index',
        'display_name' => 'View Orders',
        'group_id' => 6,
    ],
    [
        'name' => 'orders.show',
        'display_name' => 'Show Orders Detail',
        'group_id' => 6,
    ],
    [
        'name' => 'orders.create',
        'display_name' => 'Create Orders',
        'group_id' => 6,
    ],
    [
        'name' => 'orders.store',
        'display_name' => 'Store Orders',
        'group_id' => 6,
    ],
    [
        'name' => 'orders.edit',
        'display_name' => 'Edit Orders',
        'group_id' => 6,
    ],
    [
        'name' => 'orders.update',
        'display_name' => 'Update Orders',
        'group_id' => 6,
    ],
    [
        'name' => 'orders.destroy',
        'display_name' => 'Delete Orders',
        'group_id' => 6,
    ],

    // Packages Management
    [
        'name' => 'packages.index',
        'display_name' => 'View Package',
        'group_id' => 7,
    ],
    [
        'name' => 'packages.show',
        'display_name' => 'Show Package Detail',
        'group_id' => 7,
    ],
    [
        'name' => 'packages.create',
        'display_name' => 'Create Package',
        'group_id' => 7,
    ],
    [
        'name' => 'packages.store',
        'display_name' => 'Store Package',
        'group_id' => 7,
    ],
    [
        'name' => 'packages.edit',
        'display_name' => 'Edit Package',
        'group_id' => 7,
    ],
    [
        'name' => 'packages.update',
        'display_name' => 'Update Package',
        'group_id' => 7,
    ],
    [
        'name' => 'packages.destroy',
        'display_name' => 'Delete Package',
        'group_id' => 7,
    ],


    // Event Management
    [
        'name' => 'event.index',
        'display_name' => 'View Event',
        'group_id' => 8,
    ],
    [
        'name' => 'event.show',
        'display_name' => 'Show Event Detail',
        'group_id' => 8,
    ],
    [
        'name' => 'event.create',
        'display_name' => 'Create Event',
        'group_id' => 8,
    ],
    [
        'name' => 'event.store',
        'display_name' => 'Store Event',
        'group_id' => 8,
    ],
    [
        'name' => 'event.edit',
        'display_name' => 'Edit Event',
        'group_id' => 8,
    ],
    [
        'name' => 'event.update',
        'display_name' => 'Update Event',
        'group_id' => 8,
    ],
    [
        'name' => 'event.destroy',
        'display_name' => 'Delete Event',
        'group_id' => 8,
    ],

    [
        'name' => 'milestone.index',
        'display_name' => 'View Milestone',
        'group_id' => 8,
    ],
    [
        'name' => 'milestone.show',
        'display_name' => 'Show Milestone Detail',
        'group_id' => 8,
    ],
    [
        'name' => 'milestone.create',
        'display_name' => 'Create Milestone',
        'group_id' => 8,
    ],
    [
        'name' => 'milestone.store',
        'display_name' => 'Store Milestone',
        'group_id' => 8,
    ],
    [
        'name' => 'milestone.edit',
        'display_name' => 'Edit Milestone',
        'group_id' => 8,
    ],
    [
        'name' => 'milestone.update',
        'display_name' => 'Update Milestone',
        'group_id' => 8,
    ],
    [
        'name' => 'milestone.destroy',
        'display_name' => 'Delete Milestone',
        'group_id' => 8,
    ],

    //

    [
        'name' => 'onboard-participants',
        'display_name' => 'Onboard Participants Image Selection Screen',
        'group_id' => 8,
    ],
    [
        'name' => 'onboard-participants.store',
        'display_name' => 'Onboard Participants Image Store',
        'group_id' => 8,
    ],
    [
        'name' => 'participants.eligiblity',
        'display_name' => 'Check Eligiblity Screen',
        'group_id' => 8,
    ],




    // Sponsorship Management
    [
        'name' => 'sponsership.index',
        'display_name' => 'View Sponsorship',
        'group_id' => 9,
    ],
    [
        'name' => 'sponsership.create',
        'display_name' => 'Create Sponsorship',
        'group_id' => 9,
    ],
    [
        'name' => 'sponsership.show',
        'display_name' => 'Show Sponsorship',
        'group_id' => 9,
    ],
    [
        'name' => 'sponsership.store',
        'display_name' => 'Store Sponsorship',
        'group_id' => 9,
    ],
    [
        'name' => 'sponsership.edit',
        'display_name' => 'Edit Sponsorship',
        'group_id' => 9,
    ],
    [
        'name' => 'sponsership.update',
        'display_name' => 'Update Sponsorship',
        'group_id' => 9,
    ],
    [
        'name' => 'sponsership.destroy',
        'display_name' => 'Delete Sponsorship',
        'group_id' => 9,
    ],

    // Influencer Sponsorship Management
    [
        'name' => 'influencers.index',
        'display_name' => 'View Sponsorship',
        'group_id' => 10,
    ],
    [
        'name' => 'influencers.create',
        'display_name' => 'Create Sponsorship',
        'group_id' => 10,
    ],
    [
        'name' => 'influencers.show',
        'display_name' => 'Show Sponsorship',
        'group_id' => 10,
    ],
    [
        'name' => 'influencers.store',
        'display_name' => 'Store Sponsorship',
        'group_id' => 10,
    ],
    [
        'name' => 'influencers.edit',
        'display_name' => 'Edit Sponsorship',
        'group_id' => 10,
    ],
    [
        'name' => 'influencers.update',
        'display_name' => 'Update Sponsorship',
        'group_id' => 10,
    ],
    [
        'name' => 'influencers.destroy',
        'display_name' => 'Delete Sponsorship',
        'group_id' => 10,
    ],


    // Booking / Photoshoot Management
    [
        'name' => 'bookings.index',
        'display_name' => 'View Bookings',
        'group_id' => 10,
    ],
    [
        'name' => 'bookings.create',
        'display_name' => 'Create Bookings',
        'group_id' => 11,
    ],
    [
        'name' => 'bookings.show',
        'display_name' => 'Show Bookings',
        'group_id' => 11,
    ],
    [
        'name' => 'bookings.store',
        'display_name' => 'Store Bookings',
        'group_id' => 11,
    ],
    [
        'name' => 'bookings.edit',
        'display_name' => 'Edit Bookings',
        'group_id' => 11,
    ],
    [
        'name' => 'bookings.update',
        'display_name' => 'Update Bookings',
        'group_id' => 11,
    ],
    [
        'name' => 'bookings.destroy',
        'display_name' => 'Delete Bookings',
        'group_id' => 11,
    ],


    // Hire Requests
    [
        'name' => 'hireRequests.index',
        'display_name' => 'View Hire Requests',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.updateStatus',
        'display_name' => 'Update Hire Request Status',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.create',
        'display_name' => 'Create Hire Request',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.show',
        'display_name' => 'Show Hire Request',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.store',
        'display_name' => 'Store Hire Request',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.edit',
        'display_name' => 'Edit Hire Request',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.update',
        'display_name' => 'Update Hire Request',
        'group_id' => 12,
    ],
    [
        'name' => 'hireRequests.destroy',
        'display_name' => 'Delete Hire Request',
        'group_id' => 12,
    ],



    // Login Log Management
    [
        'name' => 'logs.index',
        'display_name' => 'View Login Logs',
        'group_id' => 13,
    ],
    [
        'name' => 'logs.create',
        'display_name' => 'Create Login Log',
        'group_id' => 13,
    ],
    [
        'name' => 'logs.show',
        'display_name' => 'Show Login Log',
        'group_id' => 13,
    ],
    [
        'name' => 'logs.store',
        'display_name' => 'Store Login Log',
        'group_id' => 13,
    ],
    [
        'name' => 'logs.edit',
        'display_name' => 'Edit Login Log',
        'group_id' => 13,
    ],
    [
        'name' => 'logs.update',
        'display_name' => 'Update Login Log',
        'group_id' => 13,
    ],
    [
        'name' => 'logs.destroy',
        'display_name' => 'Delete Login Log',
        'group_id' => 13,
    ],



    // Subscribers Management
    [
        'name' => 'subscribers.index',
        'display_name' => 'View Subscribers',
        'group_id' => 14,
    ],
    [
        'name' => 'subscribers.create',
        'display_name' => 'Create Subscriber',
        'group_id' => 14,
    ],
    [
        'name' => 'subscribers.show',
        'display_name' => 'Show Subscriber',
        'group_id' => 14,
    ],
    [
        'name' => 'subscribers.store',
        'display_name' => 'Store Subscriber',
        'group_id' => 14,
    ],
    [
        'name' => 'subscribers.edit',
        'display_name' => 'Edit Subscriber',
        'group_id' => 14,
    ],
    [
        'name' => 'subscribers.update',
        'display_name' => 'Update Subscriber',
        'group_id' => 14,
    ],
    [
        'name' => 'subscribers.destroy',
        'display_name' => 'Delete Subscriber',
        'group_id' => 14,
    ],


    // Role Management
    [
        'name' => 'role.index',
        'display_name' => 'View Roles',
        'group_id' => 15,
    ],
    [
        'name' => 'role.create',
        'display_name' => 'Create Role',
        'group_id' => 15,
    ],
    [
        'name' => 'role.show',
        'display_name' => 'Show Role',
        'group_id' => 15,
    ],
    [
        'name' => 'role.store',
        'display_name' => 'Store Role',
        'group_id' => 15,
    ],
    [
        'name' => 'role.edit',
        'display_name' => 'Edit Role',
        'group_id' => 15,
    ],
    [
        'name' => 'role.update',
        'display_name' => 'Update Role',
        'group_id' => 15,
    ],
    [
        'name' => 'role.destroy',
        'display_name' => 'Delete Role',
        'group_id' => 15,
    ],



    // User Management
    [
        'name' => 'user.index',
        'display_name' => 'View Users',
        'group_id' => 16,
    ],
    [
        'name' => 'user.create',
        'display_name' => 'Create User',
        'group_id' => 16,
    ],
    [
        'name' => 'user.show',
        'display_name' => 'Show User',
        'group_id' => 16,
    ],
    [
        'name' => 'user.store',
        'display_name' => 'Store User',
        'group_id' => 16,
    ],
    [
        'name' => 'user.edit',
        'display_name' => 'Edit User',
        'group_id' => 16,
    ],
    [
        'name' => 'user.update',
        'display_name' => 'Update User',
        'group_id' => 16,
    ],
    [
        'name' => 'user.destroy',
        'display_name' => 'Delete User',
        'group_id' => 16,
    ],



    // Gallery Management
    [
        'name' => 'gallery.index',
        'display_name' => 'View Gallerys',
        'group_id' => 17,
    ],
    [
        'name' => 'gallery.create',
        'display_name' => 'Create Gallery',
        'group_id' => 17,
    ],
    [
        'name' => 'gallery.show',
        'display_name' => 'Show Gallery',
        'group_id' => 17,
    ],
    [
        'name' => 'gallery.store',
        'display_name' => 'Store Gallery',
        'group_id' => 17,
    ],
    [
        'name' => 'gallery.edit',
        'display_name' => 'Edit Gallery',
        'group_id' => 17,
    ],
    [
        'name' => 'gallery.update',
        'display_name' => 'Update Gallery',
        'group_id' => 17,
    ],
    [
        'name' => 'gallery.destroy',
        'display_name' => 'Delete Gallery',
        'group_id' => 17,
    ],


    // Hero Section Management
    [
        'name' => 'hero.index',
        'display_name' => 'View Hero',
        'group_id' => 18,
    ],
    [
        'name' => 'hero.create',
        'display_name' => 'Create Hero',
        'group_id' => 18,
    ],
    [
        'name' => 'hero.show',
        'display_name' => 'Show Hero',
        'group_id' => 18,
    ],
    [
        'name' => 'hero.store',
        'display_name' => 'Store Hero',
        'group_id' => 18,
    ],
    [
        'name' => 'hero.edit',
        'display_name' => 'Edit Hero',
        'group_id' => 18,
    ],
    [
        'name' => 'hero.update',
        'display_name' => 'Update Hero',
        'group_id' => 18,
    ],
    [
        'name' => 'hero.destroy',
        'display_name' => 'Delete Hero',
        'group_id' => 18,
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




]);
