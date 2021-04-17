@foreach ($indikator1 as $i)
<div class="modal bs-example-modal-lg fade" id="modal-nilai{{$i->id_indikator}}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$i->nama_indikator}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="isian{{$i->id_indikator}}" name="isian{{$i->id_indikator}}">
                    <?php
                        // $id = $i->id_indikator;
                    ?>
                    <b>
                        <h5> Pilih Salah Satu (Satuan = {{$i->satuan->nama_satuan}} ): </h5>
                    </b>
                    <div class="demo-radio-button">
                        <div class="row">
                            @foreach ($kriteria_penilaian->where('id_indikator' , $i->id_indikator) as $kr)
                            <?php
                            //$n = $nilai_juri->where('id_indikator' , $i->id_indikator)->where('id_unit', $unit->id_unit)->first();

                            $n = $nilai_juri->where('id_indikator' , $i->id_indikator)->where('id_sekolah', $sekolah->id)->first();
                            if (isset($n)): ?>
                            <div class="col-sm-3">
                                <input name="nilai" type="radio" class="with-gap" id="radio_{{$kr->id_kriteria}}"
                                    value="{{$kr->bobot}}" <?php if ($n->nilai == $kr->bobot) { echo "checked";} ?>
                                    required data-validation-required-message="This field is required" />
                                <label for="radio_{{$kr->id_kriteria}}">{{$kr->kriteria}}</label>
                                <input type="text" name="id" value="{{$i->id_indikator}}" class="form-control" hidden>
                                <input type="text" name="id_sekolah" value="{{$sekolah->id}}" class="form-control"
                                    hidden>
                            </div>

                            <?php else: ?>
                            <div class="col-sm-3">
                                <input name="nilai" type="radio" class="with-gap" id="radio_{{$kr->id_kriteria}}"
                                    value="{{$kr->bobot}}" required
                                    data-validation-required-message="This field is required" />
                                <label for="radio_{{$kr->id_kriteria}}">{{$kr->kriteria}}</label>
                                <input type="text" name="id" value="{{$i->id_indikator}}" class="form-control" hidden>
                                <input type="text" name="id_sekolah" value="{{$sekolah->id}}" class="form-control"
                                    hidden>
                            </div>
                            <?php endif; ?>
                            @endforeach
                        </div>
                    </div>
                    <br>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save{{$i->id_indikator}}" value="create"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
          $('#isian{{$i->id_indikator}}').on('submit',(function(e) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            e.preventDefault();
            $('#btn-save{{$i->id_indikator}}').html('Mengirim...');
            var formData = new FormData(this);
            $.ajax({
              type:'POST',
              url: "{{ route('juri.nilai') }}",
              data:formData,
              cache:false,
              contentType: false,
              processData: false,
              success:function(data){
                console.log(data);
                $('#btn-save{{$i->id_indikator}}').html(data.success);
                $('#btn_nilai{{$i->id_indikator}}').removeClass('btn-info');
                $('#btn_nilai{{$i->id_indikator}}').addClass('btn-success');
				$('#nilaijuri_{{$i->id_indikator}}').html(data.nilai_juri);
				$('#nilaijuri_{{$i->id_indikator}}').addClass('bg-warning');

				$('#modal-nilai{{$i->id_indikator}}').modal('hide');
              },
              error: function(data){
                $('#btn-save{{$i->id_indikator}}').html('Gagal');
                console.log(data);
              }
            });
          }));
        });
</script>
@endforeach
