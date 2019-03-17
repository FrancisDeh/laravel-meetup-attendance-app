<form action="{{route('visitor.store') }}" method="POST">
  {{csrf_field()}}
  
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{old('name') }}" >
      </div>
      <div class="form-group">
        <label for="phonenumber1">Phone Number</label>
        <input type="text" class="form-control" name="phone_number_one" value="{{old('phone_number_one') }}" id="phonenumber1" placeholder="Phone Number 1">
      </div>
      <div class="form-group">
        <label for="phonenumber2">Phone Number</label>
        <input type="text" class="form-control"  name="phone_number_two" value="{{old('phone_number_two') }}" id="phonenumber2" placeholder="Phone Number 2">
      </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control"  name="address" id="address" value="{{old('address') }}" placeholder="1234 Main St">
    </div>
    <div class="form-group">
      <label for="occupation">Occupation</label>
      <input type="text" class="form-control"  name="occupation" id="occupation" value="{{old('occupation') }}" placeholder="Student">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>