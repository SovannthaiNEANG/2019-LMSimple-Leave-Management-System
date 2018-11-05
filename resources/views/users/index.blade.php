@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('session-flash')

            <div class="card">
                <div class="card-header">@lang('List of users')</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="{{URL::to('users/create')}}">@lang('Add a new user')</a>
                            <a class="btn btn-secondary" href="{{URL::to('users/export')}}">@lang('Export to Excel')</a>
                        </div>
                    </div>

                    <div class="row"><div class="col-md-12">&nbsp;</div></div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="users">
                                <thead>
                                    <tr>
                                        <th>@lang('ID')</th>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Email')</th>
                                        <th>@lang('Roles')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr data-id="{{ $user->id }}">
                                        <td>
                                            <i class="fas fa-trash clickable delete-icon" data-id="{{ $user->id }}" title="@lang('delete the user')"></i>
                                            <i class="fas fa-pen clickable edit-icon" data-id="{{ $user->id }}" title="@lang('edit the user')"></i>
                                            <span>{{ $user->id }}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->name !!}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->email !!}</span>
                                        </td>
                                        <td>
                                            <span>{{ $user->roles->pluck('name')->implode(', ') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Include the modal //-->
@include('modal-confirm-delete')
@include('modal-alert')

@endsection

@push('scripts')
<script type="text/javascript">
var table = null;

//On document ready, 
$(function() {

    var table = $("#users").DataTable();

/*    $("#cmdAddUser").click(function(e) {
        $('#frmModalCreateUser').modal('show');
    });*/
    
    //On click on delete, pass the object id to the confirmation modal
    $('#keywords').on("click", ".delete-icon", function() {
        $('#frmModalDeleteConfirmation').data("id", $(this).data("id"));
        $('#frmModalDeleteConfirmation').modal('show');
    });
    
    //On click on edit, fill the input modal
    $('#users').on("click", ".edit-icon", function() {
        $('#frmModalEditUser').modal('show');
    });

    //Delete the row from the DataTable if button OK or press Enter
    $("#cmdDeleteConfirmation").click(function(e){
        var id = $('#frmModalDeleteConfirmation').data("id");
        $.ajax({
            url: '{{URL::to('/')}}/users/' + id,
            type: 'DELETE',
            data: {
                id: id,
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                table.rows('tr[data-id="' + id + '"]').remove().draw();
                $('#frmModalDeleteConfirmation').modal('hide');
            },
            error:
            function(result) {
                $('#frmModalDeleteConfirmation').modal('hide');                
                $('#frmModalAlert').modal('show');
            },
        });
    });
});
</script>
@endpush
