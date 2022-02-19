@if ($errors->any())
<div class="alert alert-danger">
    <strong>Woops!</strong>
    There are some problem with your input.
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-error">{{ session('error') }}</div>
@endif