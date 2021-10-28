<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('자동차 정보 등록') }}
        </h2>
        <button onclick=location.href="{{ route('cars.index') }}" type="button" class="btn btn-danger font-bold hover:bg-yellow-700">자동차목록보기</button>
    </div>
    </x-slot>

    <div class="m-4 p-4">
    <form class="row g-3" method="post" enctype="multipart/form-data" action="{{ route('cars.store') }}">
        @csrf
        <div class="col-12 m-2">

            <div class = "col-12 m-2">
                <label for="image" class="form-label">자동차 이미지</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

          <label for="company" class="form-label">제조회사</label>
          <input type="text" autocomplete='off' name="company" class="form-control" id="company" placeholder="제조회사 입력"
          value="{{ old('company') }}">
          @error('company')
           <div class="text-red-800">
            <span>{{ $message }}</span>
           </div>
          @enderror

          <label for="name" class="form-label">자동차명</label>
          <input type="text" autocomplete='off' name="name" class="form-control" id="name" placeholder="자동차명 입력"
          value="{{ old('name') }}">
          @error('name')
           <div class="text-red-800">
            <span>{{ $message }}</span>
           </div>
          @enderror

          <label for="year" class="form-label">제조년도</label>
          <input type="text" autocomplete='off' name="year" class="form-control" id="year" placeholder="제조년도 입력"
          value="{{ old('year') }}">
          @error('year')
           <div class="text-red-800">
            <span>{{ $message }}</span>
           </div>
          @enderror

          <label for="price" class="form-label">가격</label>
          <input type="text" autocomplete='off' name="price" class="form-control" id="price" placeholder="가격 입력"
          value="{{ old('price') }}">
          @error('price')
           <div class="text-red-800">
            <span>{{ $message }}</span>
           </div>
          @enderror

          <label for="sort" class="form-label">차종</label>
          <input type="text" autocomplete='off' name="sort" class="form-control" id="sort" placeholder="차종 입력"
          value="{{ old('sort') }}">
          @error('sort')
           <div class="text-red-800">
            <span>{{ $message }}</span>
           </div>
          @enderror

          <label for="appearance" class="form-label">외형</label>
          <input type="text" autocomplete='off' name="appearance" class="form-control" id="appearance" placeholder="외형 입력"
          value="{{ old('appearance') }}">
          @error('appearance')
           <div class="text-red-800">
            <span>{{ $message }}</span>
           </div>
          @enderror

        </div>
        <div class="col-12 m-2">
          <button type="submit" class="btn btn-primary">글저장</button>
        </div>
        
      </form>
    </div>

</x-app-layout>