<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="price" class="form-control-label">Harga</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price') }}" placeholder="Harga" required>
            </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="weight" class="form-control-label">Berat</label>
            <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                    value="{{ old('weight') }}" placeholder="Berat" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="qty" class="form-control-label">Jumlah</label>
            <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}"
                placeholder="jumlah">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="length" class="form-control-label">Panjang</label>
            <input type="text" class="form-control @error('length') is-invalid @enderror" name="length"
                    value="{{ old('length') }}" placeholder="Panjang">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="width" class="form-control-label">Lebar</label>
            <input type="text" class="form-control @error('width') is-invalid @enderror" name="width"
                    value="{{ old('width') }}" placeholder="Lebar">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="height" class="form-control-label">Tinggi</label>
            <input type="text" class="form-control @error('height') is-invalid @enderror" name="height"
                    value="{{ old('height') }}" placeholder="Tinggi">
        </div>
    </div>
</div>