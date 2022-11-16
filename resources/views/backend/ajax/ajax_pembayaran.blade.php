@foreach ($ajax_sampah as $d)
   <input type="text" name="harga" value="{{$d->harga}}" readonly class="form-control form-control-sm" />
@endforeach   