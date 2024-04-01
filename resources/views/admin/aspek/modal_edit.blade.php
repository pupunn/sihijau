@foreach ($indikator as $i)
<div class="modal bs-example-modal-lg fade" id="modal_edit{{ $i->id_indikator }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Indikator : {{ $i->nama_indikator }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_indikator{{ $i->id_indikator }}" name="form_edit_indikator{{ $i->id_indikator }}">
                    <div class="form-group">
                        <label>Nama Indikator<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="nama_indikator" class="form-control"
                                value="{{ $i->nama_indikator }}" required
                                data-validation-required-message="This field is required">
                            <input type="text" name="id_aspek" value="{{ $aspek->id_aspek }}" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Satuan<span class="text-danger">*</span></label>
                        <select class="form-control" name="satuan" required
                            data-validation-required-message="This field is required">
                            @foreach($satuan as $sa)
                            <option value="{{ $sa->id_satuan }}"
                                {{ $sa->id_satuan == $i->id_satuan ? 'selected' : '' }}>{{ $sa->nama_satuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Urutan<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="urutan" class="form-control" value="{{ $i->urutan }}" required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Periode<span class="text-danger">*</span></label>
                        <select class="form-control" name="periode" required
                            data-validation-required-message="This field is required">
                            @foreach($periode as $pe)
                            <option value="{{ $pe->id_periode }}"
                                {{ $pe->id_periode == $i->id_periode ? 'selected' : '' }}>{{ $pe->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun<span class="text-danger">*</span></label>
                        <select class="form-control" name="tahun" required
                            data-validation-required-message="This field is required">
                            @for ($y = date('Y')-1; $y < date('Y')+6; $y++) <option value="{{ $y }}"
                                {{ $y == $i->tahun ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <div class="check-box">
                                <input type="hidden" name="is_visible" value="0">
                                <label><input type="checkbox" name="is_visible" value="1" class="form-check-input" {{ $i->is_visible == 1 ? 'checked' : '' }}>Tampilkan Indikator</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save-edit{{ $i->id_indikator }}"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
    $('#form_edit_indikator{{ $i->id_indikator }}').on('submit',(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      $('#btn-save-edit{{ $i->id_indikator }}').html('Mengirim...');
      var formData = new FormData(this);
      $.ajax({
        type:'POST',
        url: "{{ route('admin.edit.indikator', $i->id_indikator)}}",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
          console.log(data);
          $('#btn-save-edit{{ $i->id_indikator }}').html(data.success);
        //   if (data.hasOwnProperty('nama')) {
        //     var respon = '<tr><td>'+data.urutan+'</td><td>'+data.nama+'</td><td>'+data.aspek+'</td><td>'+data.periode+'</td></tr>'
        //     $('#tbl-indikator').append(respon);
        //     document.getElementById("form_add_indikator").reset();
        //   }
          $('#modal_edit{{ $i->id_indikator }}').modal('hide');
          location.reload(true);
        },
        error: function(data){
          $('#btn-save-edit{{ $i->id_indikator }}').html('Gagal');
          console.log(data);
        }
      });
    }));
  });
</script>

@endforeach
