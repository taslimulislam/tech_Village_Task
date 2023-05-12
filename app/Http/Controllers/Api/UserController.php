<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(Request $request){
        
        $user_id = $request->q;
        
        try {
            if ($user_id) {
                $userdata = User::Where('first_name', "like", "%" . $user_id . "%")
                ->orWhere('last_name', "like", "%" . $user_id . "%")
                ->orWhere('email', "like", "%" . $user_id . "%")
                ->paginate(5)->appends(request()->query());
            }else {
                $userdata = User::paginate(5)->appends(request()->query());
            }

            return response()->json([
                
                'items' => UserResource::collection($userdata),
                'metadata' => [
                    'current_url' => $userdata->url($userdata->currentPage()),
                    'next_url'    => $userdata->nextPageUrl(),
                    'total_page'  => $userdata->lastPage(),    
                ]
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function userList(){
        return view('userlist');
    }
}

