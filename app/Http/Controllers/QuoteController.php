<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Models\Quote;

class QuoteController extends Controller
{
    public function index(){
        
        $res = Quote::all();

        return $res;

    }
    public function show($id){

        
        $res = Quote::find($id);
        if($res){
           return $res; 
        }
        return response("Record not found", 404);
 
    }
    public function store(Request $request){

        if ($request->missing(['author', 'book', 'quote', 'year'])) {
            return response('request not valid', 400);
        }

        if($request->filled(['author', 'book', 'quote', 'year'])){
            $quote = new Quote();
            $quote->author = $request->input('author');
            $quote->book = $request->input('book');
            $quote->quote = $request->input('quote');
            $quote->year = $request->input('year');
            $quote->save();
            return response('new record created', 202);
        }

            return response('request not valid', 400);
        
       
    }
    public function update(Request $request, $id){
        $quote = Quote::find($id);
        if($quote){
            if ($request->filled('author')) {
                $quote->author = $request->input('author');
            }
            if ($request->filled('book')) {
                $quote->author = $request->input('book');
            }
            if ($request->filled('quote')) {
                $quote->author = $request->input('quote');
            }
            if ($request->filled('year')) {
                $quote->author = $request->input('year');
            }
            if($quote->isDirty()){
                $quote->save(); 
            }
            return response( 'Record updated', 202);
        }
         return response('request not valid', 400);
    }
    public function delete($id){
           
        $quote = Quote::find($id);
        if($quote){
            $quote->delete();
            return response($id . ' deleted', 202);
        }
        return response('request not valid', 400);
    }
}
