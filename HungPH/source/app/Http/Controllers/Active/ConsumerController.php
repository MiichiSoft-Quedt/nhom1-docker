<?php

namespace App\Http\Controllers\Active;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsumerRequest;
use App\Models\Consumer;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConsumerController extends Controller
{
    public function getAllConsumer(){
        try {
            $consumer = Consumer::all();
            return response()->json([
                'data'=> $consumer,
            ]);
        } catch (Exception $e) {
            throw new ModelNotFoundException('...');
        }
    }

    public function createConsumer(ConsumerRequest $request){
        try {
            $consumer = Consumer::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'city' => $request->city,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
            $consumer->save();

            return response()->json([
                'message' => 'Create Consumer Successfully',
                'data' => $consumer,
            ]);
        } catch (Exception $e) {
            throw new ModelNotFoundException('...');
        }
    }

    public function changeConsumer(ConsumerRequest $request, $id){
        try {
            $consumer = Consumer::find($id);
            $consumer->update($request->all());

            return response()->json([
                'message' => 'Change Consumer Sucessdully',
                'data' => $consumer,
            ]);
        } catch (Exception $e) {
            throw new ModelNotFoundException('...');
        }
    }

    public function delete($id){
        $consumer = Consumer::find($id);
        $consumer->delete();

        return response()->json([
            'message' => 'Delete Consumer Succesfully',
        ]);
    }
}
