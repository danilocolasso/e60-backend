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
        $usedUsernames = $usedEmails = [];

        $activeData = DB::connection('mysql')
            ->table('usuario')
            ->where('excluido_sn', 'N')
            ->whereNotNull('email')
            ->get()
            ->map(function ($row) use (&$usedUsernames, &$usedEmails) {
                    return $this->processUser($row, $usedUsernames, $usedEmails);
            })->toArray();

        $deletedData = DB::connection('mysql')
            ->table('usuario')
            ->where('excluido_sn', 'S')
            ->whereNotNull('email')
            ->get()
            ->map(function ($row) use (&$usedUsernames, &$usedEmails) {
                return $this->processUser($row, $usedUsernames, $usedEmails);
            })->toArray();

        $data = array_merge($deletedData, $activeData);

        DB::connection('pgsql')->table('users')->insert($data);
    }

    private function processUser($row, &$usedUsernames, &$usedEmails)
    {
        $username = $row->usuario;
        $originalUsername = $username;
        $email = $row->usuario;
        $originalEmail = $email;

        $counter = 1;

        while (in_array($username, $usedUsernames)) {
            $username = $originalUsername . $counter++;
        }

        while (in_array($email, $usedEmails)) {
            $email = $originalEmail . $counter++;
        }

        $usedUsernames[] = $username;
        $usedEmails[] = $email;

        return [
            'id' => $row->id_usuario,
            'username' => $username,
            'name' => $row->nome,
            'email' => $email,
            'password' => bcrypt($row->senha),
            'role' => self::ROLE[$row->perfil],
        ];
    }
}
