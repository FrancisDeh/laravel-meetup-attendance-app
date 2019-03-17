<ul class="list-group">
  
  @foreach ($visitors as $visitor)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{ $visitor->name }}
      <div class="justify-content-end">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#visitorView{{ $visitor->id }}"><i class="fa fa-eye"></i></button>
            <button onclick="checkAttendance({{$visitor->id}});" type="button" class="btn btn-outline-secondary"><i class="fa fa-check"></i></button>
      </div>
    </li>
    <!-- Modal -->
    <div class="modal fade" id="visitorView{{ $visitor->id }}" tabindex="-1" role="dialog" aria-labelledby="visitorViewLabel{{$visitor->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="visitorViewLabel{{$visitor->id}}">{{ $visitor->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                  <li class="list-group-item"><strong>Name:</strong> <span class="pull-right">{{$visitor->name}}</span></li>
                  <li class="list-group-item"><strong>Address:</strong> <span class="pull-right">{{$visitor->address}}</span></li>
                  <li class="list-group-item"><strong>Phone:</strong> <span class="pull-right">{{$visitor->phone_number_one}}</span></li>
                  @if ($visitor->phone_number_two)
                  <li class="list-group-item"><strong>Other Phone:</strong> <span class="pull-right">{{$visitor->phone_number_two}}</span></li>
                  @endif
                  <li class="list-group-item"><strong>Occupation:</strong> <span class="pull-right">{{$visitor->occupation}}</span></li>
                </ul>
                <div style="margin-top: 10px;"></div>

                <div class="card border-info mb-3" style="max-width: auto;">
                  <div class="card-header bg-transparent border-info text-center"><strong>Days Attended</strong></div>
                  <div class="card-body text-info">
                  <ul class="list-group">
                  @foreach ($visitor->attendance as $attendance )
                      <li class="list-group-item">{{ date('l, jS M, Y',strtotime($attendance->date))}}</li>
                  @endforeach
                  </ul>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    @endforeach
  
  </ul>