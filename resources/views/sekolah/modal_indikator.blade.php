<!-- Modal -->
@foreach ($indikator as $i)

<div class="modal bs-example-modal-lg fade" id="modal-indikator{{$i->id_indikator}}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>{{$i->nama_indikator}}</b></h5>
                <button type="button" class="close" id="close_modal_{{$i->id_indikator}}" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form id="isian{{$i->id_indikator}}" name="isian{{$i->id_indikator}}"
                            enctype="multipart/form-data">
                            @php
                            $id = $i->id_indikator;
                            @endphp
                            <b>
                                <h5> Pilih Salah Satu (Satuan = {{ $i->satuan->nama_satuan }}): </h5>
                            </b>
                            <div class="demo-radio-button">
                                <div class="row">
                                    <ul style="list-style-type:none;">
                                        @foreach ($kriteria->where('id_indikator' , $id) as $kr)
                                        @php
                                        $n = $nilai->where('id_indikator' , $id)->first();
                                        @endphp
                                        @if (isset($n))
                                        <li>
                                            <div class="col-sm-12">
                                                <input name="nilai" type="radio" class="with-gap"
                                                    id="radio_{{$kr->id_kriteria}}" value="{{$kr->bobot}}"
                                                    {{ $n->nilai == $kr->bobot ? 'checked' : '' }} />
                                                <label for="radio_{{$kr->id_kriteria}}">{{$kr->kriteria}}
                                                    {{$i->satuan->simbol}}</label>
                                                <input type="text" name="id" value="{{$id}}" class="form-control"
                                                    hidden>
                                                <input type="text" name="isian" value="{{$kr->kriteria}} "
                                                    id="yy_{{$kr->id_kriteria}}" class="form-control" hidden>
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <div class="col-sm-12">
                                                <input name="nilai" type="radio" class="with-gap"
                                                    id="radio_{{$kr->id_kriteria}}" value="{{$kr->bobot}}" />
                                                <label for="radio_{{$kr->id_kriteria}}">{{$kr->kriteria}}
                                                    {{$i->satuan->simbol}}</label>
                                                <input type="text" name="id" value="{{$id}}" class="form-control"
                                                    hidden>
                                                <input type="text" name="isian" value="{{$kr->kriteria}} "
                                                    id="yy_{{$kr->id_kriteria}}" class="form-control" hidden>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            @php
                            $req="";
                            $bkti = $bukti->where('id_indikator' , $i->id_indikator)->first();

                            if(isset($bkti)) {
                            $ada_bukti="1";
                            $req="";
                            $status_bukt="Bukti yang telah diupload";
                            }else{
                            $ada_bukti="0";
                            $req="required";
                            $status_bukt="Belum ada bukti yang diupload";
                            }
                            @endphp
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Upload Bukti Sesuai Template Yang Telah Diisi</h5>
                            <div class="controls">
                                <input type="file" accept=".doc, .docx" name="bukti_{{$id}}" class="form-control"
                                    {{$req}}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
            $bkti = $bukti->where('id_indikator' , $i->id_indikator)->first();
            @endphp

            <div class="content col-12" style="min-height:100px">
                <!--<h5>Bukti yang telah diupload</h5>-->
                {{-- <h5>{{$status_bukt}}</h5> --}}
                <!--<hr style="margin-after: auto;margin-before: auto;">-->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ $status_bukt }}</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table" id="lampiran_{{$i->id_indikator}}">
                            <thead>
                                <tr>
                                    <th>Indikator</th>
                                    <th>Waktu</th>
                                    <th>Unduh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukti->where('id_indikator' , $id) as $bukt)
                                <tr id="tbl-bukti">
                                    <td>{{ $bukt->indikator->nama_indikator }} </td>
                                    <td>{{ $bukt->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('download.lampiran', $bukt->id_bukti) }}">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if (date('Ymd') > Auth::user()->periode->date_close)
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" id="" value="" class="btn btn-bold btn-pure btn-primary float-right" disabled><i
                        class="fa fa-save"></i> Periode Berakhir</button>
            </div>
            @else
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" id="btn-save{{$i->id_indikator}}" value="create"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
            @endif
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
              url: "{{ route('jawaban')}}",
              data:formData,
              cache:false,
              contentType: false,
              processData: false,
              success:function(data){
                console.log(data);
                $('#btn-save{{$i->id_indikator}}').html(data.success);
                $('#btn_'+data.id_modal).html('<i class="fa fa-edit"></i> Edit');
                $('#btn_'+data.id_modal).removeClass('btn-danger');
                $('#btn_{{$i->id_indikator}}').addClass('btn-success');
               // $('#isi_{{$i->id_indikator}}').html(data.isian);
                $('#isi_'+data.id_modal).html('terisi');
                if (data.hasOwnProperty('nama')) {
				  $('#tbl-bukti').hide();
                  //var rute = 'hbat/hebat/public/download/lampiran/'+data.id;
                  var rute = '../download/lampiran/'+data.id;
                  var update = data.updt.date;
                  var respon = '<tr id="tbl-bukti"><td>'+data.nama+'</td><td>'+update+'</td><td><a class="btn btn-sm btn-warning" href="'+rute+'"> <i class="fa fa-download"> </i> Unduh Lampiran Terbaru</a> </td></tr>'
                  $('#lampiran_{{$i->id_indikator}}').append(respon);
				  $('#tbl-check-{{$i->id_indikator}}').append('<span class="label label-info"> <i class="fa fa-check"></i></span>');
                }

            $('#modal-indikator{{$i->id_indikator}}').removeClass('show');
            $('#modal-indikator{{$i->id_indikator}}').removeClass('fade');
            $('#modal-indikator{{$i->id_indikator}}').addClass('hide');
           document.getElementById("close_modal_"+data.id_modal).click();

                // $('#modal-indikator{{$i->id_indikator}}').modal('hide');
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
<!-- /.modal -->
