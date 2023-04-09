<?php

namespace App\Imports;

use App\Models\User;

use App\Traits\ConektaMethods;
use App\Traits\GeneralFunctions;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    use ConektaMethods, GeneralFunctions;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            dd($row);
            $exist = User::where('email', $row['email'])->first();
            dd($exist);

            // if ( $exist ) { return; }
            // $res = $this->saveCustomer($req);
            // if ( $res['status'] != 'success' ) { return response($res, 500); }#Customer wasn't created on openpay
            
            // Se obtiene la clabe para pagos recurrentes (SPEI)
            // $clabe = $res['data']->payment_sources->params['data'][0]['reference'];
            
            // $img = $this->uploadFile($req->file('photo'), 'img/users/clientes', true);
            
            // $customer = new User;

            // $customer->password = bcrypt($req->password);// Contraseña que será modificada
            // $customer->change_password = 1;
            // $customer->fullname = $req->fullname; 
            // $customer->email = $req->email;
            // $customer->genre = $req->genre;
            // $customer->photo = $img ?? 'img/users/default.jpg';
            // $customer->player_id = $req->player_id ?? null;
            // $customer->phone = $req->phone ?? null;
            // $customer->country = $req->country ?? 'México';
            // $customer->country_iso = $req->country_iso ?? 'MX';
            // $customer->date_of_birth = $req->date_of_birth ?? null;
            // $customer->receive_emails = 1;
            // $customer->receive_notifications = 1;
            // $customer->role_id = 2;//Role customer
            // $customer->payment_token = $res['data']->id;
            // $customer->clabe = $clabe;

            // $customer->save();

            // $token = $customer->createToken( Str::random(64) )->plainTextToken;
            // return [
            //     'email' => $row['email'],
            //     'name'  => $row['fullname'],
            // ];
            return new User([
                'email'     => $row['email'],
                'fullname'  => $row['fullname'],
                //
            ]);
        }  catch (\Exception $e) {
            return ['msg' => 'Algo salió mal: '.$e->getMessage(), 'status' => 'error'];
            //throw $th;
        }
    }
}
