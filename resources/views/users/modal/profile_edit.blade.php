<!--Profile edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <i class="fa-solid fa-circle-user icon-user"></i>
                </div>
                <div class="col-9">
                  <p class="display-5 m-4">Lionel Messi</p>
                </div>
                {{-- @if($user->avatar) 
                  <img src="#" alt="{{$user->name}}" class="img-thumbnail rounded-circle">
                @else
                  <i class="fa-solid fa-circle-user icon-user"></i>
                @endif --}}
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
                <div class="form-text" id="image-info">
                  The acceptable formats are jpeg, jpg, gif and tif only<br>Max file is 1048kb
                </div>
  
              </div>
              <div class="row ">
                <div class="col-6">
                    <label for="firstname" class="col-md-4 col-form-label">FirstName</label>
                    <input type="text" class="form-control" name="firstname" required>
                </div>
                <div class="col-6">
                    <label for="lastname" class="col-md-4 col-form-label">LastName</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" name="phone" required>
                </div>
              </div>
              <div class="row ">
                <div class="col">
                  <label for="username">Nationality</label>
                  <input type="country" class="form-control" name="nationality" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Edit profile <i class="fa-solid fa-pen-to-square icon-edit"></i></button>
        </div>
      </div>
    </div>
</div>