@extends('dashboard.layout')
@section('dashboard-title')
    @parent
    Patient
@endsection

@section('custom-css')
    @parent
    <style>
        .input-group-append {
            cursor: pointer;
        }

        #contactNo::-webkit-inner-spin-button,
        #contactNo::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }


        .patient-table table {
            width: 100%;
        }


        .patient-table tbody,
        tr,
        td {
            display: block;
        }


        .patient-table tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        .patient-table tbody {
            height: 55vh;
            overflow-y: auto;
        }

        .patient-table thead {
            /* fallback */
        }

        .patient-table tbody td,
        .patient-table thead th {
            float: left;
            height: 10%;
        }

        @media screen and (min-width: 768px) {}

        @media screen and (max-width: 768px) {

            .patient-table tbody td,
            .patient-table thead th {
                height: 20% !important;
                width: 100%;
            }
        }

        /* Styles for screens with a maximum width of 1200 pixels */
        @media screen and (max-width: 1200px) {
            /* CSS rules for screens with a maximum width of 1200 pixels */
        }

        /* Styles for screens with a width between 768 and 1200 pixels */
        @media screen and (min-width: 768px) and (max-width: 1200px) {
            /* CSS rules for screens with a width between 768 and 1200 pixels */
        }
    </style>
@endsection

@section('content')
    @parent
@section('title-entity')
@endsection

@section('board-content')
    @if (!session()->has('startDate'))
        @php
            $currentDate = date('Y-m-d'); // Format: YYYY-MM-DD
        @endphp
    @endif
    {{-- MODAL ADD PATIENT --}}
    <div class="modal fade" id="addpatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="patientform" action="{{ route('patients.store') }}" method="post">

                    @csrf
                    @method('post')
                    <div class="modal-header text-dark">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Patient</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="mb-3 row justify-content-center">
                            <div class="col-md p-1">
                                <small id="firstname" class="form-text text-muted">Lasttname</small>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control  border-end-0 border rounded-pill
                                        @error('lastname') is-invalid @enderror"
                                        id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Last name"
                                        required>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('lastname'))
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md p-1">
                                <small id="firstname" class="form-text text-muted">Firstname</small>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control  border-end-0 border rounded-pill
                                        @error('firstname') is-invalid @enderror"
                                        id="firstname" name="firstname" value="{{ old('firstname') }}"
                                        placeholder="First name" required>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('firstname'))
                                            <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md p-1">
                                <small id="middlename" class="form-text text-muted">Middlename</small>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control  border-end-0 border rounded-pill
                                        @error('middlename') is-invalid @enderror"
                                        id="middlename" name="middlename" value="{{ old('middlename') }}"
                                        placeholder="Middle name" required>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('middlename'))
                                            <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md p-1">
                                <small id="emailHelp" class="form-text text-muted">Birthdate</small>
                                <div class="input-group date" id="datepicker">
                                    <input id="birthdate"
                                        class="form-control border-end-0 border rounded-pill
                                    @error('birthdate') is-invalid @enderror"
                                        type="date" name="birthdate" value="{{ old('birthdate') }}" required />
                                    <div class="invalid-feedback">
                                        @if ($errors->has('birthdate'))
                                            <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md p-1">
                                <small id="emailHelp" class="form-text text-muted">Contact Number</small>
                                <div class="input-group date " id="datepicker">
                                    <span class="input-group-text rounded-start-pill" id="username_label">
                                        +63
                                    </span>
                                    <input id="contactNo"
                                        class="form-control rounded-end-pill
                                    @error('contactNo') is-invalid @enderror"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" maxlength="10"
                                        placeholder="9xx-xxx-xxxx" name="contactNo" value="{{ old('contactNo') }}"
                                        required />
                                    <div class="invalid-feedback">
                                        @if ($errors->has('contactNo'))
                                            <span class="text-danger">{{ $errors->first('contactNo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="SAVE">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT PATIENT --}}
    <div class="modal fade" id="editpatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editPatientForm" action="{{ route('patients.updateById') }}" method="POST">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="pid" value="">
                    <div class="modal-header text-dark">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Patient</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="mb-3 row justify-content-center">
                            <div class="col-md p-1">
                                <small id="firstname" class="form-text text-muted">Lasttname</small>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control  border-end-0 border rounded-pill
                                        @error('ulastname') is-invalid @enderror"
                                        id="lname" name="ulastname" value="{{ old('ulastname') }}"
                                        placeholder="Last name" required>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('ulastname'))
                                            <span class="text-danger">{{ $errors->first('ulastname') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md p-1">
                                <small id="firstname" class="form-text text-muted">Firstname</small>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control  border-end-0 border rounded-pill
                                        @error('ufirstname') is-invalid @enderror"
                                        id="fname" name="ufirstname" value="{{ old('ufirstname') }}"
                                        placeholder="First name" required>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('ufirstname'))
                                            <span class="text-danger">{{ $errors->first('ufirstname') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md p-1">
                                <small id="middlename" class="form-text text-muted">Middlename</small>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control  border-end-0 border rounded-pill
                                        @error('umiddlename') is-invalid @enderror"
                                        id="mname" name="umiddlename" value="{{ old('umiddlename') }}"
                                        placeholder="Middle name" required>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('umiddlename'))
                                            <span class="text-danger">{{ $errors->first('umiddlename') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md p-1">
                                <small id="emailHelp" class="form-text text-muted">Birthdate</small>
                                <div class="input-group date" id="datepicker">
                                    <input id="bdate"
                                        class="form-control border-end-0 border rounded-pill
                                    @error('ubirthdate') is-invalid @enderror"
                                        type="date" name="ubirthdate" value="{{ old('ubirthdate') }}" required />
                                    <div class="invalid-feedback">
                                        @if ($errors->has('ubirthdate'))
                                            <span class="text-danger">{{ $errors->first('ubirthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md p-1">
                                <small id="emailHelp" class="form-text text-muted">Contact Number</small>
                                <div class="input-group date " id="datepicker">
                                    <span class="input-group-text rounded-start-pill" id="username_label">
                                        +63
                                    </span>
                                    <input id="cNo"
                                        class="form-control rounded-end-pill
                                    @error('ucontactNo') is-invalid @enderror"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" maxlength="10"
                                        placeholder="9xx-xxx-xxxx" name="ucontactNo" value="{{ old('ucontactNo') }}"
                                        required />
                                    <div class="invalid-feedback">
                                        @if ($errors->has('ucontactNo'))
                                            <span class="text-danger">{{ $errors->first('ucontactNo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="SAVE">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- MODAL DELETE PATIENT --}}
    <div class="modal fade" id="deletepatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deletePatientForm" action="{{ route('patients.deleteById') }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="did" value="">
                    <div class="modal-header text-dark">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Patient</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-3 text-dark">
                        <p>Are you sure? <br> You won't be able to revert the patient!</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Yes">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <form action="{{ route('directory_patient') }}" method="GET">
            @csrf
            @method('get')
            <div class="col-12 col-sm-12 col-md col-lg py-1 px-2">
                <div class="input-group">
                    <input id="search" onkeyup="searchPatient()"
                        class="form-control border-end-0 border rounded-pill search" type="search" name="search"
                        @if (session()->has('startDate')) placeholder = "Search Patient Name created from {{ $startDate }} to {{ $endDate }}" 
                        @else 
                        placeholder = "Search Patient Name created on {{ $currentDate }} only" @endif
                        value="{{ isset($search) ? $search : '' }}">

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-5 col-lg-4 justify-content-center d-flex px-auto py-1 px-2">
                <div class="input-group date w-50 mx-1" id="datepicker">
                    <input id="startDate" name="startDate" class="form-control border-end-0 border rounded-pill"
                        type="date" value="{{ isset($startDate) ? $startDate : $currentDate }}" />
                </div>
                <div class="input-group date w-50 mx-1" id="datepicker">
                    <input id="endDate" name="endDate" class="form-control border-end-0 border rounded-pill"
                        type="date" value="{{ isset($endDate) ? $endDate : $currentDate }}" />
                </div>
                {{-- onclick="searchPatient()" --}}
                <button class="btn btn-outline-secondary border-end-0 border rounded-pill" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col px-1 py-1">
            <button value="patient-form" class="btn btn-success mx-2" data-bs-toggle="modal"
                data-bs-target="#addpatient">
                <i class="bi bi-person-add" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-title="Add New Patient">
                    New Patient
                </i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col col-md text-dark">
            <div class="table-responsive">
                <table class="table table-hover align-middle patient-table">
                    <thead>
                        <th scope="col" style="width: 5%;">
                            <input class="form-check-input checkAll" type="checkbox" value="" id="checkAll">
                        </th>
                        <th scope="col" style="width: 5%;">ID</th>
                        <th scope="col" style="width: 30%;">Fullname</th>
                        <th scope="col" style="width: 20%;">Birthdate</th>
                        <th scope="col" style="width: 20%;">Contact</th>
                        <th scope="col" style="width: 20%;" class="text-center">Action</th>
                    </thead>
                    <tbody class="content">
                        @foreach ($patients as $patient)
                            <tr>
                                <td scope="row" style="width: 5%;">
                                    <input class="form-check-input check{{ $patient->id }}" type="checkbox"
                                        value="" id="check{{ $patient->id }}">
                                </td>
                                <td style="width: 5%;">{{ $patient->id }}
                                </td>
                                <td style="width: 30%;">{{ $patient->lastname }}, {{ $patient->firstname }}
                                    {{ $patient->middlename }}</td>
                                <td style="width: 20%;">{{ $patient->birthdate }}</td>
                                <td style="width: 20%;">+63{{ $patient->contactNo }}</td>
                                <td style="width: 20%;" class="text-center">
                                    <button onclick="editPatient({{ $patient->id }})"
                                        class="btn btn-outline-secondary p-1 m-1">
                                        <i class="bi bi-pencil-square" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" data-bs-title="Edit"></i>
                                    </button>
                                    <button onclick="deletePatient({{ $patient->id }})" class="btn btn-danger p-1 m-1">
                                        <i class="bi bi-trash" data-bs-toggle ="tooltip" data-bs-placement="bottom"
                                            data-bs-title="Delete"></i>
                                    </button>
                                    <button onclick="" class="btn btn-primary p-1 m-1">
                                        <i class="bi bi-person-square" data-bs-toggle ="tooltip"
                                            data-bs-placement="bottom" data-bs-title="Profile"></i>
                                    </button>
                                    <button onclick="" class="btn btn-warning p-1 m-1">
                                        <i class="bi bi-journals" data-bs-toggle ="tooltip" data-bs-placement="bottom"
                                            data-bs-title="History"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $patients->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection <!-- END SECTION OF BOARD CONTENT-->



@if (session('errors'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>',
            confirmButtonText: 'OK',
        }).then((result) => {
            // If the user clicks the "OK" button
            if (result.isConfirmed) {
                // Open the modal
                // openModal();
            } else {
                // If the user clicks the "Cancel" button or outside the dialog
                console.log('User clicked Cancel');
                // Handle the cancellation if needed
            }
        });
    </script>
@endif

<script>
    function editPatient(patientId) {

        $.ajax({
            type: "GET",
            url: "/dashboard/directory/patients/" + patientId + "/edit",
            success: function(response) {
                console.log(response);

                $('#pid').val(response.id);
                $('#lname').val(response.lastname);
                $('#fname').val(response.firstname);
                $('#mname').val(response.middlename);
                $('#bdate').val(response.birthdate);
                $('#cNo').val(response.contactNo);

            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors to the console
            }
        });
        $('#editpatient').modal('show');
    }

    function deletePatient(patientId) {
        //alert(pid);

        $.ajax({
            type: "GET",
            url: "/dashboard/directory/patients/" + patientId + "/edit",
            success: function(response) {
                console.log(response);

                $('#did').val(response.id);

            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors to the console
            }
        });
        $('#deletepatient').modal('show');

    }

    function searchPatient() {
        var value = $('#search').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        // alert("Search: " + value +
        //     "\n startDate: " + startDate +
        //     "\n endDate: " + endDate
        // );
        if (value === null || value === '') {
            value = "null";
        }
        $.ajax({
            type: "GET",
            url: "/dashboard/directory/patients/filter/" + value,
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(data) {
                // alert("return Data: "+data);
                $('.content').html(data).show();
            },
            error: function(xhr, status, error) {
                alert(status);
                // console.error(error); // Log any errors to the console
            }
        });

    }
</script>

@if (session()->has('alert'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'DONE',
            text: '{{ Session::get('alert') }}',
            button: "Ok",
        });
    </script>
@endif
@endsection <!-- END SECTION OF CONTENT-->


@section('script')
@parent
@endsection
