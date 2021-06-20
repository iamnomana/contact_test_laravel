@extends('layouts.app')
@section('title', 'Contacts')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-md-4">
        {{-- Validation Error --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ol>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
        <br />
        @endif

        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <form action="{{ route('contact') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-row mb-2">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                            </div>

                            <div class="form-row mt-3">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success ">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered text-center">
            <thead class="thead-dark" style="width: 100%">
                <th hidden scope="col">ID</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col" colspan="2"></th>
            </thead>
            <tbody>
                @if (!empty($contacts))

                @php
                $i = 0;
                @endphp

                @foreach ($contacts as $contact )
                @php
                $i = $i + 1;
                @endphp
                <tr>
                    <td hidden>{{ $contact->id }}</td>
                    <td>{{ $i }}</td>
                    <td>{{ $contact->fullname }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <a href="{{ route('edit_page') .'/'. $contact->id}}" class="btn btn-primary btn-sm edit_btn">
                            Edit
                        </a>

                    </td>
                    <td>
                        <form action="{{ route('delete_contact', $contact->id ) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" id="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
