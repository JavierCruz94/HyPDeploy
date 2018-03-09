<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Period;
use App\Admin;
use App\Consultant;
use App\Customer;
use App\Request;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SEED TESTING FROM 0
        /*
        //User
        User::create([
            'username' => 'AdminJavi',
            'password' => bcrypt('root'),
            'email' =>'melissa.cbrc@hotmail.com',
            'role' => 'admin'
        ]);
        //Admin
        Admin::create([
            'id_admin' => 1,
            'firstname' => 'Javier',
            'lastname' => 'Cruz Admin',
            'registeredBy' => 1
        ]);
           */

        //MAIN SEED
        //User
        User::create([
            'username' => 'TFierro',
            'password' => bcrypt('Admin@Hyp17!'),
            'email' =>'hectorcg@hypcs.com',
            'role' => 'admin'
        ]);
        //Admin
        Admin::create([
            'id_admin' => 1,
            'firstname' => 'Hector',
            'lastname' => 'Cruz Admin',
            'registeredBy' => 1
        ]);

        //FOR TESTIN PURPOSES
        /*
        //Create users
        User::create([
            'username' => 'admin1',
            'password' => bcrypt('root'),
            'email' =>'admin1@gmail.com',
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'consult1',
            'password' => bcrypt('root'),
            'email' => 'consult1@gmail.com',
            'role' => 'consultant'
        ]);

        User::create([
            'username' => 'client1',
            'password' => bcrypt('root'),
            'email' => 'client1@gmail.com',
            'role' => 'customer'
        ]);

        User::create([
            'username' => 'admin2',
            'password' => bcrypt('root'),
            'email' => 'admin2@gmail.com',
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'consult2',
            'password' => bcrypt('root'),
            'email' => 'consult2@gmail.com',
            'role' => 'consultant'
        ]);

        User::create([
            'username' => 'client2',
            'password' => bcrypt('root'),
            'email' => 'client2@gmail.com',
            'role' => 'customer'
        ]);

        User::create([
            'username' => 'admin3',
            'password' => bcrypt('root'),
            'email' => 'admin3@gmail.com',
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'consult3',
            'password' => bcrypt('root'),
            'email' => 'consult3@gmail.com',
            'role' => 'consultant'
        ]);

        User::create([
            'username' => 'client3',
            'password' => bcrypt('root'),
            'email' => 'client3@gmail.com',
            'role' => 'customer'
        ]);

        //Create admins
        Admin::create([
            'id_admin' => 1,
            'firstname' => 'Hector',
            'lastname' => 'Cruz Admin',
            'registeredBy' => 1
        ]);

        Admin::create([
            'id_admin' => 4,
            'firstname' => 'Admin2',
            'lastname' => 'Admin2',
            'registeredBy' => 1
        ]);

        Admin::create([
            'id_admin' => 7,
            'firstname' => 'Admin3',
            'lastname' => 'Admin3',
            'registeredBy' => 1
        ]);

        //Create consultants
        Consultant::create([
            'id_consultant' => 2,
            'firstname' => 'Cons1',
            'lastname' => 'Cons1',
            'level' => 'master',
            'registeredBy' => 1
        ]);

        Consultant::create([
            'id_consultant' => 5,
            'firstname' => 'Cons2',
            'lastname' => 'Cons2',
            'level' => 'novice',
            'registeredBy' => 1
        ]);

        Consultant::create([
            'id_consultant' => 8,
            'firstname' => 'Cons3',
            'lastname' => 'Cons3',
            'level' => 'intermediate',
            'registeredBy' => 1
        ]);

        //Create customers
        Customer::create([
            'id_customer' => 3,
            'code' => 'CT1',
            'name' => 'Customer Test 1',
            'registeredBy' => 1
        ]);

        Customer::create([
            'id_customer' => 6,
            'code' => 'CT2',
            'name' => 'Customer Test 2',
            'registeredBy' => 1
        ]);

        Customer::create([
            'id_customer' => 9,
            'code' => 'CT3',
            'name' => 'Customer Test 3',
            'registeredBy' => 1
        ]);

        //Create Request
        Request::create([
            'id_customer' => 3,
            'id_admin' => 1,
            'id_consultant' => null,
            'schedule' => false,
            'subject' => 'Limpieza Equipo',
            'description' => 'Esta muy sucio',
            'importance' => 'Baja',
            'deadline' => date("2017/12/31"),
            'solved' => false,
            'date_scheduled' => date("2017/11/29"),
            'time_scheduled' => date("101112"),
            'id_report' => null
        ]);

        Request::create([
            'id_customer' => 3,
            'id_admin' => 1,
            'id_consultant' => null,
            'schedule' => false,
            'subject' => 'Impresora no Sirve',
            'description' => 'No imprime',
            'importance' => 'Media',
            'deadline' => date("2017/11/29"),
            'solved' => false,
            'date_scheduled' => date("2017/11/29"),
            'time_scheduled' => date("101112"),
            'id_report' => null
        ]);

        Request::create([
            'id_customer' => 9,
            'id_admin' => 1,
            'id_consultant' => null,
            'schedule' => false,
            'subject' => 'Computadora no Sirve',
            'description' => 'No prende',
            'importance' => 'Alta',
            'deadline' => date("2017/10/28"),
            'solved' => false,
            'date_scheduled' => date("2017/11/29"),
            'time_scheduled' => date("101112"),
            'id_report' => null
        ]);
    */
    }
}