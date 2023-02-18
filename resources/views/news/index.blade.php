@foreach ($news as $item)
   <a href="{{route('newShow',$item->id)}}">


    <img src="{{asset('images/'.$item->img)}}" width="100" height="100"  alt=""> 
       {{ $item->name }} <br>


   </a>
@endforeach