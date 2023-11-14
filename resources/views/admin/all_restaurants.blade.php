@extends('layouts.app')

@section('content')

<div class="container w-75">
    <h2>All users</h2>
    {{-- Search Box --}}
    <div class="container text-end mb-3">
        <form class="form-inline">
          <div class="form-group row d-flex flex-row-reverse">
            <div class="col-sm-3">
              <input type="password" class="form-control" id="inputPassword" placeholder="Search">
            </div>
          </div>
        </form>
    </div>

    {{-- User Info Date Table --}}
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Restaurant name</th>
              <th scope="col">Username</th>
              <th scope="col">Reviewdate</th>
              <th scope="col">Rate</th>
              <th scope="col">Review</th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            <tr>
              <td class="py-3">#</td>
              <td class="py-3">OREORESTAURANT in Tokyo</td>
              <td class="py-3">Dayo</td>
              <td class="py-3">11:00  <br>12 OCT 2024</td>
              <td class="py-3 m">
                <div class="row">
                  <div class="col card text-center p-0 shadow-sm">
                    <p class="my-auto">4.5<i class="fa-solid fa-star text-warning col"></i></p>
                  </div>
                </div>
              </td>
              <td class="py-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque deserunt obcaecati suscipit provident<span>...</span>
              </td>
              <td td class="py-3"><button type="button" class="btn btn-secondary">Inactivate</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>





      
      {{-- permanent_area --}}
        <div class="d-flex justify-content-center">
        <!--previousry-->
          <a  class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<%preventry_url>">previous &lt;&lt;</a>
        <!--nextentry-->
          <a  class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover mx-5" href="<%nextentry_url>">&gt;&gt;next</a>
        </div>
</div>

@endsection