<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    private const ROLE = [
        'ADMINISTRADOR' => 'admin',
        'MASTER' => 'admin',
        'USUARIO' => 'user',
        'AGENCIA' => 'agency',
        'RECEPCAO' => 'reception',
    ];

    public function run(): void
    {

        DB::connection('pgsql')->table('users')->insert([
            'name' => 'Root',
            'username' => 'root',
            'email' => 'root@user.com',
            'password' => bcrypt('password'),
            'role' => UserRoles::ADMIN,
        ]);


        // $usedUsernames = $usedEmails = [];
        // $data = DB::connection('mysql')
        //     ->table('usuario')
        //     ->where('excluido_sn', 'N')
        //     ->whereNotNull('email')
        //     ->get()
        //     ->map(function ($row) use (&$usedUsernames, &$usedEmails) {
        //             $username = $row->usuario;
        //             $originalUsername = $username;
        //             $email = $row->usuario;
        //             $originalEmail = $email;

        //             $counter = 1;
        //             while (in_array($username, $usedUsernames)) {
        //                 $username = $originalUsername . $counter++;
        //             }

        //             while (in_array($email, $usedEmails)) {
        //                 $email = $originalEmail . $counter++;
        //             }

        //             $usedUsernames[] = $username;
        //             $usedEmails[] = $email;

        //             return [
        //                 'id' => $row->id_usuario,
        //                 'username' => $username,
        //                 'name' => $row->nome,
        //                 'email' => $email,
        //                 'password' => bcrypt($row->senha),
        //                 'role' => self::ROLE[$row->perfil],
        //             ];
        //         }
        //     )->toArray();

        // DB::connection('pgsql')->table('users')->insert($data);
    }
}
