<div class="container">
    <div class="card" style="width: 100%; margin:10px">

        @if($car->image)
        <img src="{{ '/storage/images/'.$car->image }}" 
        class="card-img-top" >
        @else
        <span>첨부이미지 없음.</span>
        @endif

        <div class="card-body">
          <h5 class="card-title">{{ $car->company }}</h5>
          <p class="card-text">{{ $car->name }}</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">제조회사:{{ $car->company }}</li>
          <li class="list-group-item">자동차명:{{ $car->name }}</li>
          <li class="list-group-item">제조년도:{{ $car->year }}</li>
          <li class="list-group-item">가격:{{ $car->price }}</li>
          <li class="list-group-item">차종:{{ $car->sort }}</li>
          <li class="list-group-item">외형:{{ $car->appearance }}</li>
          <li class="list-group-item">등록일:{{ $car->created_at->diffForHumans() }}</li>
          <li class="list-group-item">수정일:{{ $car->updated_at->diffForHumans() }}</li>
        </ul>
      </div>
        <div class="card-body flex"> 
            @auth
            @if(auth()->user()->id == $car->user_id)
          <a href="{{ route('cars.edit',['car'=>$car->id]) }}" class="card-link">수정하기</a>

         
          <form id="form" class="ml-4" method="post" action="{{ route('cars.destroy',['car'=>$car->id]) }}">
          
          @csrf
         
          @method('delete')
         
          
          <button type="submit">삭제하기</button>
          
        </form>
        </div>
        @endif
        @endauth
      </div>      
</div>