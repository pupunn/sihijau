@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Aspek</strong>
                <button type="button" data-toggle="modal" data-target="#modal_add_aspek"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah Aspek </button>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table " id="tbl-aspek">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Aspek</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aspek as $no => $asp)
                        <tr>
                            <td class="serial">{{ $no+1 }}.</td>
                            <td>{{ $asp->nama_aspek }} </td>
                            <td>{{ $asp->tahun }}</td>
                            <td>
                                <a href="{{ route('admin.aspek.indikator', $asp->id_aspek) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat Indikator </a>
                                <div endpoint="{{ route('admin.delete.aspek', $asp->id_aspek) }}"
                                    class="delete d-inline"></div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>

<div class="modal bs-example-modal-lg fade" id="modal_add_aspek" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Aspek</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_aspek" name="form_add_aspek">
                    <div class="form-group">
                        <h5>Nama Aspek<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="nama_aspek" class="form-control" required
                                data-validation-required-message="This field is required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tahun<span class="text-danger">*</span></label>
                        <select class="form-control" name="tahun" required
                            data-validation-required-message="This field is required">
                            <?php
                for ($y=date('Y')-1; $y < date('Y')+6; $y++) { ?>
                            <option value="{{ $y }}">{{ $y }}</option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save-aspek" class="btn btn-bold btn-pure btn-primary float-right"><i
                        class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('local-script')

<script>
    jQuery(document).ready(function ($) {
    $('#form_add_aspek').on('submit',(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      $('#btn-save-aspek').html('Mengirim...');
      var formData = new FormData(this);
      $.ajax({
        type:'POST',
        url: "{{ route('admin.create.aspek')}}",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
          console.log(data);
          $('#btn-save-aspek').html(data.success);
          if (data.hasOwnProperty('nama')) {
            var respon = '<tr><td>#</td><td>'+data.nama+'</td><td>'+data.tahun+'</td></tr>'
            $('#tbl-aspek').append(respon);
            document.getElementById("form_add_aspek").reset();
          }
          $('#modal_add_aspek').modal('hide');
          location.reload(true);
        },
        error: function(data){
          $('#btn-save-aspek').html('Gagal');
          console.log(data);
        }
      });
    }));
  });
</script>
@endpush
