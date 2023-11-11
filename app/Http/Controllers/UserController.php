<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerOrLogin(Request $request) {
        $validate = Validator::make($request->all(), [
            'email' => 'required'
        ]);
        if($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'success' => false
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            User::create([
                'email' => $request->email
            ]);
        }

        return response()->json([
            'message' => 'Login Successful',
            'success' => true
        ]);
    }

    public function updateUserInfo(Request $request, $userId) {
        $data = $request->all();

        $user = User::find($userId);
        if(!$user) {
            return response()->json([
                'message' => 'User does not exist',
                'success' => false
            ]);
        }
        $user->update($request->all());
        return response()->json([
            'message' => 'User updated succesfully',
            'success' => true
        ]);
    }

    public function updateOrCreateWorkInfo(Request $request, $userId = null) {
        $data = $request->all();

        if(!$userId) {
            $user = WorkInfo::create($data);
        } else {
            $user = WorkInfo::find($userId);
            $user->update($data);
        }
        return response()->json([
            'message' => 'work info updated succesfully',
            'success' => true
        ]);
    }

    public function updateOrCreateWorkExperience(Request $request, $userId = null) {
        $data = $request->all();

        if(!$userId) {
            $user = WorkExperience::create($data);
        } else {
            $user = WorkExperience::find($userId);
            $user->update($data);
        }
        return response()->json([
            'message' => 'work experience updated succesfully',
            'success' => true
        ]);
    }

    public function updateOrCreateEducation(Request $request, $userId = null) {
        $data = $request->all();

        if(!$userId) {
            $user = UserEducation::create($data);
        } else {
            $user = UserEducation::find($userId);
            $user->update($data);
        }
        return response()->json([
            'message' => 'education updated succesfully',
            'success' => true
        ]);
    }

    public function updateOrCreateProject(Request $request, $userId = null) {
        $data = $request->all();

        if(!$userId) {
            $user = UserProject::create($data);
        } else {
            $user = UserProject::find($userId);
            $user->update($data);
        }
        return response()->json([
            'message' => 'project updated succesfully',
            'success' => true
        ]);
    }

    public function updateOrCreateSkill(Request $request, $userId = null) {
        $data = $request->all();

        if(!$userId) {
            $user = UserSkill::create($data);
        } else {
            $user = UserSkill::find($userId);
            $user->update($data);
        }
        return response()->json([
            'message' => 'skills updated succesfully',
            'success' => true
        ]);
    }
}
