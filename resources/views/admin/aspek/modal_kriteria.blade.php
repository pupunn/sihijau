{{-- @for ($k = 1; $k <= 6; $k++)  --}}
@foreach ($indikator as $i) <div class="modal bs-example-modal-lg fade" id="modal_kriteria{{$i->id_indikator}}"
    tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_kriteria{{$i->id_indikator}}" name="form_kriteria{{$i->id_indikator}}"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Kriteria<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="kriteria" class="form-control" required
                                data-validation-required-message="This field is required">
                            <input type="text" name="id" value="{{ $i->id_indikator }}" hidden>
                        </div>
                        <label>Bobot<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="number" name="bobot" class="form-control" required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
            </div>
            <div class="content col-12">
                <h4>Kriteria Penilaian yang telah ditentukan</h4>
                <hr style="margin-after: auto;margin-before: auto;">
                <div class="table-stats order-table ov-h">
                    <table class="table" id="kriteria_{{$i->id_indikator}}">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <th>Satuan</th>
                                <th>Bobot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            // use App\Models\Kriteria_penilaian;
                            $kriterias = App\Models\Kriteria_penilaian::where('id_indikator', $i->id_indikator)->get();
                            // $satuan = App\Models\Satuan::where('id_indikator', $i->id_indikator)->get();
                            // dd($kriterias);
                            @endphp
                            @foreach ($kriterias as $kr)
                            <tr id="tbl-kriteria">
                                @if ($i->kriteria == null)

                                @else
                                <td>{{ $kr->kriteria }}</td>
                                <td>{{ $i->satuan->simbol }}</td>
                                <td>{{ $kr->bobot }}</td>
                                <td>
                                    {{-- <div endpoint="{{ route('admin.delete.kriteria', $kr->id_kriteria) }}"
                                    class="delete d-inline">
                </div> --}}
                <a class="btn btn-sm btn-danger"
                    href="{{ route('admin.delete.kriteria', ([$i->id_indikator, $kr->id_kriteria])) }}">
                    <i class="fa fa-trash"> </i> Hapus Kriteria
                </a>
                </td>
                @endif
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer modal-footer-uniform">
            <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" id="btn-save-kriteria{{$i->id_indikator}}"
                class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function ($) {
  $('#form_kriteria{{$i->id_indikator}}').on('submit',(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    $('#btn-save-kriteria{{$i->id_indikator}}').html('Mengirim...');
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ route('admin.create.kriteria')}}",
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(data){
        console.log(data);
        $('#btn_kriteria{{$i->id_indikator}}').html('<i class="fa fa-edit"></i> Edit Kriteria');
        // var rute = 'hbat/hebat/public/admin/download/template/'+{{$i->id_indikator}};
        $('#btn-save-kriteria{{$i->id_indikator}}').html(data.success);
        var respon = '<tr id="tbl-kriteria"><td>'+data.kriteria+'</td><td>'+data.bobot+'</td><td><a class="btn btn-sm btn-danger" href="'+'#'+'"> <i class="fa fa-trash"> </i> Hapus Kriteria Terbaru </a> </td></tr>'
        $('#kriteria_{{$i->id_indikator}}').append(respon);
        $('#modal_kriteria{{$i->id_indikator}}').modal('hide');
        location.reload(true);
      },
      error: function(data){
        $('#btn-save-kriteria{{$i->id_indikator}}').html('Gagal');
        console.log(data);
      }
    });
  }));
});
</script>
@endforeach
{{-- @endfor --}}