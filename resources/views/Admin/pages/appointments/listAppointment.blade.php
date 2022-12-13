
@extends("Admin.AdminLayout.app")
@section('title', 'Appointments')


@section('content')


<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Appointments"
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
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Schedule Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                @if (count($appointments) > 0)
                                <tbody>
                                    @foreach ($appointments as $value)
                                    <tr>
                                        <td>{{ ucwords($value->first_name) }} {{ ucwords($value->last_name) }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ date('M d, Y - H:i', strtotime($value->schedule_date)) }}</td>
                                        <td>
                                            @if ($value->status == 'Received')
                                                <span class="badge badge-primary">Received</span>
                                            @elseif($value->status == 'Attended')
                                                <span class="badge badge-success">Attended</span>
                                            @else
                                                <span class="badge badge-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span onclick="viewDetail({{ $value->id }})" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></span>
                                            <a href="{{ route('adminEditAppointment', $value->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                            @if ($value->status == 'Received')
                                                <span class="btn btn-sm btn-info" onclick="cancelApp({{ $value->id }})">Cancel</span>
                                            @else
                                                <span class="btn btn-sm btn-info disabled" disabled>Cancel</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @else
                                <tbody>
                                    <tr>
                                        <td class="text-center pt-4 pb-4" colspan="6">No Appointments</td>
                                    </tr>
                                </tbody>
                                @endif

                            </table>

                        </div> <!-- end card body-->
                  </div> <!-- end card -->

                  <div class="d-flex justify-content-center mt-3">
                    {!! $appointments->links() !!}
                  </div>
                </div><!-- end col-->
            </div>

        </div>

    </div>
</div>





<!-- The Modal -->
<div class="modal fade" id="detailsModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Appointment Details</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="d-flex justify-content-between mb-1">
                <p>First Name</p>
                <p id="firstName"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Last Name</p>
                <p id="lastName">Mikel</p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Email</p>
                <p id="email"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Phone</p>
                <p id="phone"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Gender</p>
                <p id="gender"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Date of Birth</p>
                <p id="dob"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Marital Status</p>
                <p id="maritalStatus"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Schedule Date</p>
                <p id="scheduleDate"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Service</p>
                <p id="service"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Occupation</p>
                <p id="occupation"></p>
            </div>
            <div class="addreBox mb-3">
                <p>Address</p>
                <textarea readonly id="address" rows="5" class="form-control" style="border: 1px solid #ccc"></textarea>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>City</p>
                <p id="city"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>State</p>
                <p id="state"></p>
            </div>
            <div class="mssgBox mb-3">
                <p>Message</p>
                <textarea rows="5" class="form-control" style="border: 1px solid #ccc" readonly id="message"></textarea>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Status</p>
                <p id="status"></p>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <p>Date Created</p>
                <p id="createdAt"></p>
            </div>
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
                <p class="mb-3">Are you sure you want to cancel this appointment?</p>
                <form method="post" action="{{ route('adminCancelAppointment') }}">
                    @csrf
                    <input type="hidden" name="appID" id="deleteID">

                    <button class="btn btn-danger btn-sm mr-3">YES</button>
                    <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function cancelApp(appID) {
        document.getElementById('deleteID').value = appID;
        $('#deleteModal').modal();
    }

    function viewDetail(appID) {
        $.ajax({
            url: "/administrator/appointment/details/" + appID,
            type: "Get",
            success: function(data){
                data = data.split('|');
                if(data && Number(data[0]) == 1) {
                    document.getElementById('firstName').innerHTML=data[1];
                    document.getElementById('lastName').innerHTML=data[2];
                    document.getElementById('email').innerHTML=data[3];
                    document.getElementById('phone').innerHTML=data[4];
                    document.getElementById('address').value=data[5];
                    document.getElementById('city').innerHTML=data[6];
                    document.getElementById('state').innerHTML=data[7];
                    document.getElementById('gender').innerHTML=data[8];
                    document.getElementById('maritalStatus').innerHTML=data[9];
                    document.getElementById('status').innerHTML=data[10];
                    document.getElementById('scheduleDate').innerHTML=data[11];
                    document.getElementById('createdAt').innerHTML=data[12];
                    document.getElementById('dob').innerHTML=data[13];
                    document.getElementById('message').value=data[14];
                    document.getElementById('service').innerHTML=data[15];
                    document.getElementById('occupation').innerHTML=data[16];

                    $('#detailsModal').modal();
                }
            }
        });
    }
</script>
@endsection
