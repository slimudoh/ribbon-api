<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function sendRSVP(Request $request) {
      $fname = $request->input('fname');
      $email = $request->input('email');
      $guest = $request->input('guest');
      $msg = $request->input('message');
      $tag = $request->input('tag');

      try {
            $data = array('fname' => $fname, 'email' => $email, 'guest' => $guest, 'msg' => $msg, 'tag' => $tag);

              Mail::send('email.rsvp', $data, function ($m) use ($data) {
                  $m->from($data['email'], $data['fname']);
                  $m->to("ourloveribbons@gmail.com", "Ribbon web")->subject('New Message for Ribbon web!');
              });

            return response()->json([
                'status' => true,
              'message' => 'message sent successfully.'
            ]);

      } catch (Exception $ex) {
        return response()->json([
            'status' => false,
            'message' => 'failed to send email'
        ]);
      }


    }

    public function sendGiftCardDetails(Request $request) {
      $fname = $request->input('fname');
      echo $fname;
    }
}
