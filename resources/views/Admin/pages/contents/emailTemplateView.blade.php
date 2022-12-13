
@extends("Admin.AdminLayout.app")
@section('title', 'Email Templates')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Email Template"
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
                            <h4 class="header-title">All Template</h4><br>

                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Last Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @foreach ($emails as $mail)
                                    <tr>
                                        <td class="p-1"> {{ $mail->id }} </td>
                                        <td>{{ $mail->name }}</td>
                                        <td>{{ date('M d, Y', strtotime($mail->updated_at)) }}</td>
                                        <td>
                                            <a href='{{ route('editEmailTemView', $mail->id) }}' class='btn btn-primary btn-sm'><i class="fa fa-edit"></i></a>
                                        </td>
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
