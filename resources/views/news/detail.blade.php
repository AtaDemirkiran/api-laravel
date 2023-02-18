
<form action="{{ route('update',$new->id)}} " method="POST">
    @csrf
    {{method_field('PUT')}}

    
    <input type="text" value="{{ $new->name }}" name="name">

    <div class="checkbox">
        <label>
            <input type="checkbox" name="goster_slider" value="1" {{ $new->goster_slider ? 'checked' : '' }}> Aktif mi
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="goster_gunun_firsati" value="1" {{ $new->goster_gunun_firsati ? 'checked' : '' }}> Günü Fırsatı
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="goster_one_cikan" value="1" {{ $new->goster_one_cikan ? 'checked' : '' }}>  Öne Çıkar
        </label>
    </div>

    <input type="file" name="img" class="form_controller" value="{{$new->img}}">

    <input type="submit" >
</form>