<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="{{asset('image/logo.png')}}" type="image/x-icon">
    <title>User</title>
</head>

<body>
    @include('admin.sidebar')
    <section class="home-section">
        <div class="text"><span><i class="fas fa-user"></i> Manager Users</span></div>
        <div class="block">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive" id="user">
                        @include('admin.user.usertable')
                        <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-section">
        <div class="text"><span><i class="fas fa-user"></i> Manager Staffs</span></div>
        <div class="block">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive" id="staff">
                    @include('admin.user.stafftable')
                        <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td><a href="#"><i class="fas fa-user-cog"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                    <td><a href="#"><i class="fas fa-user-cog"></i></a></td>
                                </tr>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include("admin.user.formstaff")
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/user/fetch_data?page=" + page,
                    success: function(data) {
                        $('#user').html(data);
                    }
                });
            }
            function staff() {} {
                $.ajax({
                    url: "{{route('staffshow')}}",
                    method: "get",
                    success: function(data) {
                        $('#staff').html(data);
                        console.log(data);
                    }
                });
            }
            staff();
            $('#myForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{route('uploadstaff')}}",
                    data: {
                        "_token": '{{csrf_token()}}',
                        "username": $("#uname").val(),
                        "password": $("#pwd").val(),
                        "rpassword": $("#confirmpwd").val(),
                        "position": $('#position').val(),
                    },
                    success: function(data) {
                        $('#product').html(data); //#datatest
                        console.log('submission was successful.');
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('an error occurred.');
                        console.log(data);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/validator.js') }}"></script>
</body>

</html>