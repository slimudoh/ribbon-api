<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function sendRSVP(Request $request) {
      $fname = $request->input('fname');
      $email = $request->input('email');
      $phone = $request->input('phone');
      $guest = $request->input('guest');
      $msg = $request->input('message');
      $tag = $request->input('tag');

      try {
            $data = array(
              'fname' => $fname,
              'email' => $email,
              'phone' => $phone,
              'guest' => $guest,
              'msg' => $msg,
              'tag' => $tag
            );

              Mail::send('email.rsvp', $data, function ($m) use ($data) {
                  $m->from($data['email'], $data['fname']);
                  $m->to(env('RIBBON_EMAIL'), "Ribbon web")->subject('New Message for Ribbon web!');
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
      $total = $request->input('total');
      $cart = json_decode($request->input('cart'));
      $fname = $request->input('fname');
      $email = $request->input('email');
      $phone = $request->input('phone');
      $country = $request->input('country');
      $paystack_ref = $request->input('paystackRef');
      $tag = $request->input('tag');

      try {
            $data = array(
              'total' => $total,
              'cart' => $cart,
              'fname' => $fname,
              'email' => $email,
              'phone' => $phone,
              'country' => $country,
              'paystack' => $paystack_ref,
              'tag' => $tag
            );

              Mail::send('email.checkout', $data, function ($m) use ($data) {
                  $m->from($data['email'], $data['fname']);
                  $m->to(env('RIBBON_EMAIL'), "Ribbon web")->subject('New Message for Ribbon web!');
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
}
