<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Tambah Pilihan</h2>
        {{ $attributeOption->id }}
    </div>
    <div class="card-body">
        @include('includes.admin.flash')
        <form action="{{ route('attributes.update_option', $attributeOption->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-control-label">Nama</label>
                @if (!empty($attributeOption))
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $attributeOption->name ? $attributeOption->name : old('name')}}" required>
                @error('name')<div class="text-muted">{{ $message }}</div>@enderror
                @else
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name')}}" required>
                @error('name')<div class="text-muted">{{ $message }}</div>@enderror
                @endif
            </div>
            <div class="form-footer pt-3 border-top">
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                <a href="{{ route('attributes.index') }}" class="btn btn-secondary btn-block">Kembali</a>
            </div>
        </form>
    </div>
</div>