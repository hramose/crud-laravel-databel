<table class="table table-striped table-condensed table-responsive table-bordered">
      <thead>
          <tr>
            <th>id</th>
            <th>code</th>
            <th>name</th>
            <th>gender</th>
            <th>birth date</th>
            <th>address</th>
            <th>city</th>
            <th>email</th>
            <th>comments</th>
            <th>created</th>
          </tr>
      </thead>
      <tbody>
          @foreach($columns as $column)
          <tr>
            <td>{{$column->id}}</td>
              <td>{{$column->code}}</td>
              <td>{{$column->name}} {{$column->lastname}}</td>
              <td>{{$column->gender}}</td>
              <td>{{ date("d/m/Y H:i", strtotime($column->birth)) }}</td>
              <td>{{$column->address}}</td>
              <td>{{$column->city}}</td>
              <td>{{$column->email}}</td>
              <td>{{$column->comments}}</td>
              <td>{{ date("d/m/Y H:i", strtotime($column->created_at)) }}</td>  
          </tr>
          @endforeach
     </tbody>
</table>


  

    
