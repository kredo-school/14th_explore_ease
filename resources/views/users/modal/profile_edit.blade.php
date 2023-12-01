<!--Profile edit Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="container">
                  <div class="row">
                    <div class="col-3">
                      @if($user->profile->avatar) 
                        <img src="{{ $user->profile->avatar }}" alt="{{$user->name}}" class="header-image img-thumbnail rounded-circle">
                      @else
                        <i class="fa-solid fa-circle-user icon-user"></i>
                      @endif
                    </div>
                    <div class="col-9">
                      <p class="display-5 m-4">{{ $user->name }}</p>
                    </div>
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
                    <div class="form-text" id="image-info">
                      The acceptable formats are jpeg, jpg, gif and tif only<br>Max file is 1048kb
                    </div>
      
                  </div>
                  <div class="row ">
                    <div class="col-6">
                        <label for="firstname" class="col-md-4 col-form-label">FirstName</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $user->profile->first_name }}" autofocus>
                    </div>
                    <div class="col-6">
                        <label for="lastname" class="col-md-4 col-form-label">LastName</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $user->profile->last_name }}" autofocus>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $user->name }}" autofocus>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ $user->email }}" autofocus>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col">
                      <label for="phone">Phone</label>
                      <input type="tel" class="form-control" name="phonenumber" value="{{ $user->profile->phone }}" autofocus>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col">
                      <label for="username">Nationality</label>
                      <select class="form-select" id="#">
                        <option selected>{{ $user->profile->nationarity->name }}</option>
                          
                        {{-- @foreach( $user->profile->nationarity->names as $name)
                            <option value="1">{{ $name }}</option>
                        @endforeach --}}
                      </select>
                      {{-- <input type="country" class="form-control" name="nationality" value="{{ $user->profile->nationarity->name }}" autofocus> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Edit profile <i class="fa-solid fa-pen-to-square icon-edit"></i></button>
            </div>
        </div>
      </div>
    </form>
  </div>
