<form action="{{ route('displaybydate') }}" method="post">   
    {{ csrf_field() }}
    <div class="form-group">
        <label for="list-by-date">Select Date</label>
        <select class="form-control" id="list-by-date" name="date">
            
            @foreach ($attendances as $attendance)
                <option value="{{$attendance->date}}">{{ date('l, jS M, Y',strtotime($attendance->date))}}</option>
            @endforeach
            
       
        
        </select>

        
    </div>
    <button type="submit" class="btn btn-primary">Display</button>
</form>