@extends('backend.layouts.app')
@section('title', 'Admin User')
@section('admin-user-active', 'mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Admin User</div>
        </div>
    </div>
</div>
<a href="{{ route('admin-user.create') }}" class="btn btn-primary mt-3"><i class="fas fa-plus-circle mr-2"></i>Create New User</a>
<div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/admin/admin-user/datatables/ssd",
            columns: [
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "email",
                    name: "email"
                },
                {
                    data: "phone",
                    name: "phone"
                }
            ]
        });
    });
</script>
@endsection