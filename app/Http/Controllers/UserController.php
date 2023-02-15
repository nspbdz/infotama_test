<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use App\Models\Hobby;
use App\Http\Requests\RegisterRequest;
use App\Models\UserHobby;
use Alert;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redis;
use Throwable;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function data(Request $request){
        // retrun $request;


        if (request()->ajax()) {
            $users = User::query()->with('genders')->orderBy('created_at', 'desc');

            return DataTables::of($users)
                ->addColumn('actions', function ($user) {
                    // $editUrl = route('users.edit', $user->id);
                    $deleteUrl = route('users.destroy', $user->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');

                    return <<<EOT
                        <div class="btn-group">
                            <form action="{$deleteUrl}" method="POST">
                                {$csrf}
                                {$method}
                                <button class="btn btn-sm btn-danger" type="edit" > <i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    EOT;
                })

                ->rawColumns(['actions'])
                ->make(true);
        }

    }

    public function index(){

        $user=User::get();
        $genders=Gender::get();
        $hobbies=Hobby::get();

        return view('register',['user' => $user, 'genders' => $genders, 'hobbies' => $hobbies]);
    }

    public function destroy(Request $request)
    {
        // return $request->id;

        $user = User::findOrFail($request->id);
        $user->delete();

        Alert::success('Congrats', 'User deleted successfully');
        return redirect('/');

    }

    public function store(RegisterRequest $request)
    {
        // try {
            $user = new User;
            $user->name = $request->name;
            $user->gender_id = $request->gender;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->save();
            $userId = $user->id;

            if ($request->hobbies) {
                foreach ($request->hobbies as $hobbyId) {
                    $userHobby = new UserHobby;
                    $userHobby->user_id = $userId;
                    $userHobby->hobby_id = $hobbyId;
                    $userHobby->save();
                }
            }

            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return redirect('/');
        // } catch (QueryException $exception) {
        //     Alert::error('Error', 'There was an error while saving your data. Please try again later.');
        //     return back()->withInput();
        // }
    }
}
