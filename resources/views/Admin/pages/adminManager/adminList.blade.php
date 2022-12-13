
@extends("Admin.AdminLayout.app")
@section('title', 'Administrators')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Administrators"
                urlTitle="Home"
                url="{{ route('adminDashboard') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>
            <x-GuestComps.errorMessage/>



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">List of all Admin</h4><br>

                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>First name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @foreach ($allAdmins as $admin)
                                    <tr>
                                        <td class="p-1">
                                            @if($admin->photo)
                                                <img src="{{ $admin->photo }}" class="rounded-circle" width="40px" height="40px">
                                            @else
                                                <img src="{{ asset('images/team/team7.jpg') }}" class="rounded-circle" width="40px" height="40px">
                                            @endif
                                        </td>
                                        <td>{{ ucwords($admin->first_name) }}</td>
                                        <td>{{ ucwords($admin->last_name) }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>
                                        <td>{{ date('M d, Y', strtotime($admin->created_at)) }}</td>
                                        <td>
                                            @if($admin->status == 1)
                                            <button class="badge badge-success">ACTIVE</button>
                                            @else
                                            <button class="badge badge-danger btn-sm">BLOCKED</button>
                                            @endif
                                        </td>
                                        @if($admin->id != 1)
                                        <td>
                                            <a href='{{ route('singleAdminView', $admin->id) }}' class='btn btn-primary btn-sm'><i class="fa fa-edit"></i></a>
                                            <a href="javascript:()" onclick="deleteAdmin(<?=$admin->id?>)" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                    </tr>
                                <?php endforeach ?>
                                </tbody>

                            </table>

                        </div> <!-- end card body-->
                  </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div>

    </div>
</div>





<!-- The Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Warning</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
          <p>Are you sure you want to delete this Image?</p>
          <form method="post" action="{{ route('deleteAdmin') }}">
            @csrf
            <input type="hidden" name="adminID" id="deleteID">

            <button class="btn btn-danger btn-sm mr-3">YES</button>
            <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
          </form>
        </div>

      </div>
    </div>
</div>


<script>
    function deleteAdmin($id){
        $('#deleteModal').modal();
        document.getElementById('deleteID').value = $id;
    }
</script>
@endsection
