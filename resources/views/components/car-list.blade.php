
   <div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">company</th>
                <th scope="col">name</th>
                <th scope="col">year</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($cars as $car)
              <tr>
                  
                <td>{{ $car->company }}</td>
                <td><a href="{{ route('cars.show',['id'=>$car->id]) }}">{{ $car->name }}
                   
                    </a></td>
                <td>{{ $car->year }}</td>                
              </tr>
          @endforeach
        </tbody>
    </table>
    {{ $cars ->links() }}
</div>
