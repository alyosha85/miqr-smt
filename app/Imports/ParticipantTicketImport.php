<?php

namespace App\Imports;

use App\ParticipantTicketTable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantTicketImport implements ToModel, WithHeadingRow
{
  public $id;

  public function __construct($id)
  {
    $this->id = $id;
  }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function generateRandomString($length = 25) {
      $digits    = array_flip(range('0', '9'));
      $lowercase = array_flip(range('a', 'z'));
      $uppercase = array_flip(range('A', 'Z')); 
      //$special   = array_flip(str_split('!@#$%^&*()_+=-}{[}]\|;:<>?/'));
      $combined  = array_merge($digits, $lowercase, $uppercase);

      $password  = str_shuffle(array_rand($digits) .
                              array_rand($lowercase) .
                              array_rand($uppercase) . 
                              //array_rand($special) . 
                              implode(array_rand($combined, rand($length, $length))));

      return $password;
  }

    public function model(array $row)
    {
        return new ParticipantTicketTable([
           'ticket_id' => $this->id,
           'vorname'   => $row['vorname'], 
           'nachname'  => $row['nachname'], 
           'course'  => $row['massnahme'],
           'email'  => $row['email'],
           'notes_participant'  => $row['bemerkung'],
           'password'  =>  $this->generateRandomString(5),
        ]);
    }
}
