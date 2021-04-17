<div class="modal bs-example-modal-lg fade" id="modal_satuan" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Satuan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_satuan" name="form_satuan" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Satuan<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="nama_satuan" class="form-control" required
                                data-validation-required-message="This field is required">
                        </div>
                        <label>Simbol<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="text" name="simbol" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="content col-12">
                <h4>Satuan</h4>
                <hr style="margin-after: auto;margin-before: auto;">
                <div class="table-stats order-table ov-h">
                    <table class="table" id="tbl-satuan">
                        <thead>
                            <tr>
                                <th>Nama Satuan</th>
                                <th>Simbol</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satuan as $sat)
                            <tr>
                                @if ($sat == null)

                                @else
                                <td>{{ $sat->nama_satuan }}</td>
                                <td>{{ $sat->simbol }}</td>
                                <td>
                                    {{-- <div endpoint="{{ route('admin.delete.satuan', $sat->id_satuan) }}"
                                    class="delete d-inline">
                </div> --}}
                <a class="btn btn-sm btn-danger" id="hapus" href="{{ route('admin.delete.satuan', $sat->id_satuan) }}">
                    <i class="fa fa-trash"> </i> Hapus Satuan
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
            <button type="submit" id="btn-save-satuan" class="btn btn-bold btn-pure btn-primary float-right"><i
                    class="fa fa-save"></i> Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function ($) {
  $('#form_satuan').on('submit',(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    $('#btn-save-satuan').html('Mengirim...');
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ route('admin.create.satuan')}}",
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(data){
        console.log(data);
        $('#btn_satuan').html('<i class="fa fa-info"></i> Kelola Satuan');
        // var rute = '';
        $('#btn-save-satuan').html(data.success);
        var respon = '<tr><td>'+data.satuan+'</td><td>'+data.simbol+'</td><td><a class="btn btn-sm btn-danger" href="'+'#'+'"> <i class="fa fa-trash"> </i> Hapus Kriteria Terbaru </a> </td></tr>'
        $('#tbl-satuan').append(respon);
        $('#modal_satuan').modal('hide');
        location.reload();
      },
      error: function(data){
        $('#btn-save-satuan').html('Gagal');
        console.log(data);
      }
    });
  }));
//   $('#hapus').on('click', function(e) {
//     const afterDeleted = e.currentTarget.parentNode.parentNode.parentNode
//     afterDeleted.remove()
//   });
});
</script>
