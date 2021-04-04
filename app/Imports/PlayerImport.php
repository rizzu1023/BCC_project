<?php

namespace App\Imports;

use App\Players;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class PlayerImport implements ToModel, WithHeadingRow, WithValidation
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function model(array $row)
    {
        return new Players([
            'player_id' => $row['player_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'role' => $row['role'],
            'batting_style' => $row['batting_style'],
            'bowling_style' => $row['bowling_style'],
//            'dob' => $row['dob'],
            'user_id' => $this->user->id,
        ]);
    }


    public function rules(): array
    {
        return [
            '*.player_id' => 'required|unique:players,player_id',
            '*.first_name' => 'required|string',
            '*.last_name' => 'required|string',
            '*.role' => 'required|string',
            '*.batting_style' => 'required|string',
            '*.bowling_style' => 'required|string',
        ];
    }
}
