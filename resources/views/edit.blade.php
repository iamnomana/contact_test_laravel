@extends('layouts.app')
@section('title', 'Edit '. $contact->fullname . "'s contact")

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-content">
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
            <form action="{{ route('edit_contact', $contact->id) }}" method="post" class="text-center">
                @csrf
                <div class="form-body">
                    <div class="form-row mb-2">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="{{ $contact->fullname }}">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}">
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
@endsection
