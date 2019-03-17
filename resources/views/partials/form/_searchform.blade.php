<form action="{{ route('searchsend')}}" method="POST">
        {{csrf_field()}}
        
            <div class="form-group">
              <label for="name">Enter Name</label>
              <input type="text" class="form-control" id="searchTerm" placeholder="Name" name="searchTerm">
            </div>
            <button type="submit" class="btn btn-primary">Display</button>

</form>