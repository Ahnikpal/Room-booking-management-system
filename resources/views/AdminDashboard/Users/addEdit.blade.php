@extends('AdminDashboard.Layout.adminBaseView')

@section('dashContent')
<div class="container">
    <form method="POST" action="{{ isset($data) ? route('user.update', $data->id) : route('user.save') }}">
        @csrf
        @if(isset($data))
            @method('PUT')
        @endif

        <div class="mb-3 w-50">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ @$data->name }}" required>
        </div>

        <div class="mb-3 w-50">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ @$data->email }}" required>
        </div>

        <div class="mb-3 w-50">
            <label>Phone Number</label>
            <input type="text" name="phone_no" class="form-control" value="{{ @$data->phone_no }}">
        </div>

        <div class="mb-3 w-50">
            <label>User Type</label>
            <select name="user_type" class="form-select" required>
                <option value="">Select Type</option>
                <option value="1" {{ @$data->user_type == 1 ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ @$data->user_type == 2 ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($data) ? 'Update' : 'Save' }}
        </button>
    </form>
</div>
@endsection
