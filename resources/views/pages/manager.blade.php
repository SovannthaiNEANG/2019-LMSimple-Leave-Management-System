@extends('layout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Manager</title>
    <link rel="stylesheet" href="{{asset('css/manager.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    {{-- <script src="{{asset('js/jquery-3.3.1.js')}}"></script> --}}
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</head>

<body>
    <h1> All Employee</h1><br>
    <div class="container">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Start date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $item)
                    <tr>
                        <td>
                            <i class="fas fa-trash-alt text-danger"></i>
                            <a href="" data-toggle="modal" data-target="#Edit" data-whatever="@mdo"><i
                                    class=" fas fa-pencil-alt text-info"></i></a>
                            {{$item->id}}</td>
                        <td>{{$item->firstname}}</td>
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->department->department}}</td>
                        <td>{{$item->position->position}}</td>
                        <td>{{$item->startdate}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"

            data-whatever="@mdo"><i class="fas fa-plus-circle"></i> Create News</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-12">
                        <div>
                            <img src="{{asset('images/examples/images.png')}}" class="imge" alt="images" style="border:1px solid black;">
                        </div>
                        <div class="icons">
                            <a href=""><i class="fas fa-plus text-success"></i></a>
                            <a href=""> <i class="fas fa-pencil-alt text-info"></i></a>
                            <a href=""> <i class="far fa-trash-alt text-danger"></i></a>
                        </div>
                    </div>    
                    <div class="container mt-4">
                    <form action="{{action('ManagerController@store')}}" method="post">
                        @csrf
                            {{-- <div class="form-group row">
                                <label class="col-4" for="firstname">ID</label>
                                <p class="col-4">001</p>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-4" for="firstname">First Name</label>
                                <input class="col-7" type="text" name="firstname" class="form-control"
                                    placeholder="First Name" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-4" for="lastname">Last Name</label>
                                <input class="col-7" type="text" name="lastname" class="form-control"
                                    placeholder="Last Name" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-4" for="department">Department</label>
                                <div class="col-8" class="input-group">
                                    <select class="custom-select" name="department_id">

                                    @foreach ($department as $items)
                                    <option value="{{$items->id}}">{{$items->department}}</option>    
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4" for="firstname">Position</label>
                                <div class="col-8" class="input-group">
                                    <select class="custom-select" name="position_id">
                                        @foreach ($position as $positions)
                                    <option value={{$positions->id}}>{{$positions->position}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4" for="date">Start Date</label>
                                <input class="col-7" type="date" name="startdate" class="form-control"
                                    placeholder="start-date" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-4" for="manager">Manager</label>
                                <div class="col-8" class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04">
                                        <option selected>Banjimin</option>
                                        <option value="1">Sareoum</option>
                                        <option value="2">Thalai</option>
                                        <option value="3">Vothy</option>
                                    </select>

                                </div>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-info">OK</button>

                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Alert Edit -->
    <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="col-12">
                    <div>
                        <img src="{{asset('images/examples/images.png')}}" class="imge" alt="images" style="border:1px solid black;">
                    </div>
                    <div class="icons">
                        <a href=""><i class="fas fa-plus text-success"></i></a>
                        <a href=""> <i class="fas fa-pencil-alt text-info"></i></a>
                        <a href=""> <i class="far fa-trash-alt text-danger"></i></a>
                    </div>
                </div>    
                <div class="container mt-4">
                    <form action="#" method="post">
                        <div class="form-group row">
                             <label class="col-4" for="firstname">ID</label>
                             <p class="col-4">001</p>   

                        </div>
                        <div class="form-group row">
                            <label class="col-4" for="firstname">First Name</label>
                            <input class="col-7" type="text" name="firstname" class="form-control"
                                placeholder="First Name" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-4" for="lastname">Last Name</label>
                            <input class="col-7" type="text" name="lastname" class="form-control"
                                placeholder="Last Name" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-4" for="department">Department</label>
                            <div class="col-8" class="input-group">
                                <select class="custom-select" id="inputGroupSelect04">
                                    <option selected>WEB Trainer</option>
                                    <option value="1">ERO Team</option>
                                    <option value="2">HR</option>
                                    <option value="3">SNA Triner</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4" for="firstname">Position</label>
                            <div class="col-8" class="input-group">
                                <select class="custom-select" id="inputGroupSelect04">
                                    <option selected>Englist Teacher</option>
                                    <option value="1">Professional</option>
                                    <option value="2">WEB Teacher</option>
                                    <option value="3">SNA Teacher</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4" for="date">Start Date</label>
                            <input class="col-7" type="date" name="start-date" class="form-control"
                                placeholder="start-date" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-4" for="manager">Manager</label>
                            <div class="col-8" class="input-group">
                                <select class="custom-select" id="inputGroupSelect04">
                                    <option selected>Banjimin</option>
                                    <option value="1">Sareoum</option>
                                    <option value="2">Thalai</option>
                                    <option value="3">Vothy</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                    <a href="index.html"><button class="btn bg-primary">OK</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "scrollY": 300,
            "scrollX": true
        });
    });
</script>
@endsection