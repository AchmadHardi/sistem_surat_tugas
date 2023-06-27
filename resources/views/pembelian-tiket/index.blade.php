<form method="POST" action="/pembelian-tiket">
    @csrf
    <div class="form-group">
        <label for="surat_tugas_id">Nomor Surat Tugas</label>
        <select class="form-control" id="surat_tugas_id" name="surat_tugas_id">
            @foreach($suratTugas as $suratTugas)
                <option value="{{ $suratTugas->id }}">{{ $suratTugas->nomor_surat }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Beli Tiket</button>
</form>
