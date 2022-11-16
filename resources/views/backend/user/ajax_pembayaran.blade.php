
@foreach ($ajax_sampah as $d => $sampah)
   <input type="text" name="harga" id="jumlah" value="{{$sampah->harga_satuan}}" readonly class="form-control form-control" />
@endforeach   