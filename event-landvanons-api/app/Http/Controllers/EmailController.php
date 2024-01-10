<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;

class EmailController extends Controller
{
    public function sendEmail() {
        $name = "Cody";
        $event = "Bessen pukken";
        $begin_time = "15:00";
        $end_time = "20:00";
        $street_name = "Willemweg";
        $house_number = "12";
        $postal_code = "TR14";

        Mail::to('pascalheikamp17@gmail.com')->send(new ConfirmationMail($name, $event, $begin_time, $end_time, $street_name, $house_number, $postal_code));
    }
}
