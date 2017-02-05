<div class="row">
  <div class="col-md-4 col-xs-4">
      <div class="x_panel">
        <div class="x_content">
          <div class="flex">
            <ul class="list-inline widget_profile_box">
              <li></li>
              <li>
                <img src="{{ url('/images/user.png')}}" alt="..." class="img-circle profile_img">
              </li>
              <li></li>
            </ul>
          </div>
          <h3 class="name text-left"> <span id="name">{{ $item->name }} {{ $item->lastname }}</span></h3>
          <div class="flex">
            <ul class="list-inline">
              <li>
                CODE: {{ $item->code }}
              </li>
  
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-xs-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th colspan="3"> Personal Details</th>
          </tr>
        </thead>
        <tbody>
          <tr><td width="5%"><b>Address:</b></td> <td>{{$item->address}} </td></tr>
          <tr><td><b>City:</b></td> <td>{{$item->city}} </td></tr>
          <tr><td><b>Gender:</b></td> <td>{{$item->gender}} </td></tr>
          <tr><td><b>Email:</b></td> <td>{{$item->email}} </td></tr>
        </tbody>
      </table>
    </div>