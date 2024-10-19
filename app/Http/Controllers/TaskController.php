<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::all();

        return response()->json(
            array(
                'status'    =>  200,
                'tasks'     =>  $tasks,
            ),
            200
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->input(), [
            'name' => [
                'required',
                'min:3',
            ]
        ]);

        if( $validator->fails() )
        {
            return response()->json(
                array(
                    'status'    =>  400,
                    'error'     =>  __('messages.errors.bad_request'),
                    'data'      =>  $validator->getMessageBag()->toArray()
                ),
                400
            );
        }

        //Create new task
        $task = Task::create([
            'name' => $request->name
        ]);


        return response()->json(
            array(
                'status'    =>  201,
                'task'      => $task
            ),
            200
        );
    }
}
