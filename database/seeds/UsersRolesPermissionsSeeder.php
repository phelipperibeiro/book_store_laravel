<?php

use Illuminate\Database\Seeder;

class UsersRolesPermissionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* cria o usuario */
        $user = factory(\App\Models\User::class)->create([
            'name' => 'Admin da silva',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
        ]);
        /* cria a role */
        $roleAdmin = factory(\App\Models\Role::class)->create([
            'name' => 'Admin',
            'description' => 'System Administrator'
        ]);

        /* adiciona o admin para o usuario */
        $user->addRole($roleAdmin);

        ////////////////////////////////////////////////////////////////////////

        $userManager = factory(\App\Models\User::class)->create([
            'name' => 'Manager da silva',
            'email' => 'manager@manager.com',
            'password' => bcrypt(123456),
        ]);

        $roleManager = factory(\App\Models\Role::class)->create([
            'name' => 'Manager',
            'description' => 'System Manager'
        ]);

        $userManager->addRole($roleManager);

        /////////////////////////////////////////////////////////////////////////

        $userSupervisor = factory(\App\Models\User::class)->create([
            'name' => 'Supervisor da silva',
            'email' => 'supervisor@supervisor.com',
            'password' => bcrypt(123456),
        ]);

        $roleSupervisor = factory(\App\Models\Role::class)->create([
            'name' => 'Supervisor',
            'description' => 'System Supervisor'
        ]);

        $userSupervisor->addRole($roleSupervisor);

        /////////////////////////////////////////////////////////////////////////

        $userList = factory(\App\Models\Permission::class)->create([
            'name' => 'user_list',
            'description' => 'can list all users',
        ]);

        $userAdd = factory(\App\Models\Permission::class)->create([
            'name' => 'user_add',
            'description' => 'can add users',
        ]);

        $userEdit = factory(\App\Models\Permission::class)->create([
            'name' => 'user_edit',
            'description' => 'can edit users',
        ]);

        $userDestroy = factory(\App\Models\Permission::class)->create([
            'name' => 'user_destroy',
            'description' => 'can destroy an users',
        ]);

        $userViewRoles = factory(\App\Models\Permission::class)->create([
            'name' => 'user_view_roles',
            'description' => 'can view the users roles',
        ]);

        $userAddRole = factory(\App\Models\Permission::class)->create([
            'name' => 'user_add_role',
            'description' => 'can add a new role for an user',
        ]);

        $userRevokeRole = factory(\App\Models\Permission::class)->create([
            'name' => 'user_revoke_role',
            'description' => 'can revoke a role for an user',
        ]);

        $managerPermissions = factory(\App\Models\Permission::class)->create([
            'name' => 'permission_admin',
            'description' => 'can admin all permissions',
        ]);

        $AdminRoles = factory(\App\Models\Permission::class)->create([
            'name' => 'role_admin',
            'description' => 'can admin all roles',
        ]);

        $roleManager->addPermission($userList);
        $roleManager->addPermission($userAdd);
        $roleManager->addPermission($userEdit);
        $roleManager->addPermission($userDestroy);
        $roleManager->addPermission($userViewRoles);

        $roleSupervisor->addPermission($userList);
        $roleSupervisor->addPermission($userViewRoles);
    }

}
