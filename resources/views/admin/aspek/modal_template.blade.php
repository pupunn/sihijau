@foreach ($indikator as $i)
<div class="modal bs-example-modal-lg fade" id="modal_template{{$i->id_indikator}}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Template</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_template{{$i->id_indikator}}" name="form_template{{$i->id_indikator}}"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Template Indikator<span class="text-danger">*</span></label>
                        <div class="controls">
                            <input type="file" accept=".pdf, .docx, .doc" name="template{{$i->id_indikator}}"
                                class="form-control" required data-validation-required-message="This field is required">
                            <input type="text" name="id" value="{{ $i->id_indikator }}" hidden>
                        </div>
                    </div>
            </div>
            <div class="content col-12">
                <h4>Template yang telah diupload</h4>
                <hr style="margin-after: auto;margin-before: auto;">
                <div class="table-stats order-table ov-h">
                    <table class="table" id="template_{{$i->id_indikator}}">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tbl-bukti">
                                @if ($i->template == null)

                                @else
                                <td>{{ $i->template }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('admin.download.template', $i->id_indikator) }}">
                                        <i class="fa fa-download"></i> Unduh Template
                                    </a>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save-template{{$i->id_indikator}}"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
  $('#form_template{{$i->id_indikator}}').on('submit',(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    $('#btn-save-template{{$i->id_indikator}}').html('Mengirim...');
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ route('admin.create.template')}}",
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(data){
        console.log(data);
        $('#btn_template{{$i->id_indikator}}').html('<i class="fa fa-edit"></i> Edit Template');
        var rute = 'hbat/hebat/public/admin/download/template/'+{{$i->id_indikator}};
        $('#btn-save-template{{$i->id_indikator}}').html(data.success);
        var respon = '<tr id="tbl-bukti"><td>'+data.nama+'</td><td><a class="btn btn-sm btn-warning" href="'+rute+'"> <i class="fa fa-download"> </i> Unduh Template Terbaru</a> </td></tr>'
        $('#template_{{$i->id_indikator}}').append(respon);
        $('#modal_template{{$i->id_indikator}}').modal('hide');
      },
      error: function(data){
        $('#btn-save-template{{$i->id_indikator}}').html('Gagal');
        console.log(data);
      }
    });
  }));
});
</script>
@endforeach
