<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->params;
        $id  = $search['iduse'];
        $seh = $search['search'];
        
        $email = Email::where('user_id', $id)->where(function($q) use ($seh) {
            $q->where('mensaje', 'like', "%$seh%")
            ->orWhere('destino', 'LIKE', "%$seh%")
            ->orWhere('asunto', 'LIKE', "%$seh%");
    
        })->orderBy('created_at', 'desc')->paginate(5);
         return response($email, 200);
    }
   
    public function allmail(Request $request)
    {
        $search = $request->params;
        $seh = $search['search'];
        $email = Email::where('mensaje', 'like', "%$seh%")
            ->orWhere('destino', 'LIKE', "%$seh%")
            ->orWhere('asunto', 'LIKE', "%$seh%")
            ->with('user')->orderBy('created_at', 'desc')->paginate(5);
         return response($email, 200);
    }
   
   
    public function send(Request $request)
    {
        
        $email = new Email;
        $email->mensaje = $request->mensaje;
        $email->destino = $request->destino;
        $email->asunto = $request->asunto;
        $email->status = 'No enviado';
        $email->user_id = $request->iduser;
        $email->save();
        SendEmailJob::dispatch($email);
        return response()->json(['status'=>'success','data'=>$email]);
    
    }
   
}
