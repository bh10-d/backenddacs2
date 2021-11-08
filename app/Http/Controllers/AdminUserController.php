<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Staff;

class AdminUserController extends Controller
{
    public function index()
    {
        // return view('admin.user');
        $data = Staff::paginate(5);
        return view('admin.user.user', compact('data'));
    }


    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $data = Staff::paginate(5);
            return view('admin.user.usertable', compact('data'))->render();
        }
    }
    


    public function Show()
    {
        //
        $const = 10;
        $staff = Staff::paginate($const);

        $number_of_rows = Staff::get()->count();
        $output = '';
        $output .= '
                <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>
                <th>job position</th>
                <th>option</th>
                </tr>
            ';
        if ($number_of_rows > 0) {
            $count = 0;
            foreach ($staff as $row) {
                $count++;
                $output .= '
                <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row["password"] . '</td>
                <td>' . 'vi tri cong viec' . '</td>
                <td>' . '<a href="#"><i class="fas fa-user-cog"></i></a>' . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
                <tr>
                <td colspan="6" align="center">No Data Found</td>
                </tr>
                ';
        }
        $output .= '</table>';
        return $output;
    }

    public function ShowStaff()
    {
        //
        $const = 5;
        $staff = Staff::paginate($const);

        $number_of_rows = Staff::get()->count();
        $output = '';
        $output .= '
                <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>
                <th>job position</th>
                <th>option</th>
                </tr>
            ';
        if ($number_of_rows > 0) {
            $count = 0;
            foreach ($staff as $row) {
                $count++;
                $output .= '
                <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row["password"] . '</td>
                <td>' . 'vi tri cong viec' . '</td>
                <td>' . '<a href="#"><i class="fas fa-user-cog"></i></a>' . '</td>
                </tr>
                ';
            }
            // $output .= $staff->links('admin.test');
        } else {
            $output .= '
                <tr>
                <td colspan="6" align="center">No Data Found</td>
                </tr>
                ';
        }
        $output .= '</table>';
        return $output;
    }

    public function UploadStaff(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $rpassword = $request->rpassword;
        $position = $request->position;
        $user = new Staff();
        DB::insert('insert into staff (username, password) values (?, ?)', [$username, $password]);
        $data = new AdminUserController();
        return $data->index();
    }
}
