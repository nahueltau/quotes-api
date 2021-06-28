<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Webhook_C;
use Illuminate\Support\Facades\Http;
class WebhookController extends Controller
{
    public function receive(Request $request){
        $webhook_c = new Webhook_C;
        $webhook_c->resource = $request->resource;
        $webhook_c->user_id = $request->user_id;
        $webhook_c->topic = $request->topic;
        $webhook_c->application_id = $request->application_id;
        $webhook_c->attempts = $request->attempts;
        $webhook_c->sent = $request->sent;
        $webhook_c->received = $request->received;
        $webhook_c->save();
        return response($webhook_c, 200);
    }
    public function index(Request $request){
        $webhook_c = Webhook_C::all();
        
        return response($webhook_c,200);
    }

    public function show(Request $request, $user_id){
        $webhook_c = Webhook_C::all()->where('user_id', $user_id);
        return response($webhook_c , 200);
    }
    public function destroy($id){
        $webhook = Webhook_C::find($id);
        $webhook->delete();
        return response("record deleted" , 202);
    }
    public function destroyAll(){
        $webhook = Webhook_C::select("select *")->truncate();
        return response("all records deleted" , 202);
    }
}
