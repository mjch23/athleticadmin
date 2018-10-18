<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Controllers\Redirect;

class MailController extends Controller
{
    
/*public function index()
{
     return View::make('contact');
}*/

public function send(Request $request)
   {


       //guarda el valor de los campos enviados desde el form en un array
       $data = $request->all();
       $showDialog = true;

 
       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
       \Mail::raw($request->body, function($message) use ($request)
       {

           //remitente
           $message->from('postmaster@mg.lorenafariasfotografia.com.ar', $request->name);
 
           //asunto
           $message->subject($request->email);

 
           //receptor
           $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));

          

 
       });

       \Mail::send('emails.message', $data, function($message) use ($request)
       {

           //remitente
           $message->from('postmaster@mg.lorenafariasfotografia.com.ar', 'Lorena Farías Fotografía');
 
           //asunto
           $message->subject('Gracias por tu consulta');

 
           //receptor
           $message->to($request->email);

          

 
       });




       return redirect('/')->with('success', true)->with('message','That was great!');
   }


}



