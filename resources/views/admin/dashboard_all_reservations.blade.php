@extends('layouts.app')

@section('content')

<div class="container w-75">
    <h2>All Reservations</h2>
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

    {{-- Reservation Info Date Table --}}
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Restaurant name</th>
              <th scope="col">Username</th>
              <th scope="col">Reservation date</th>
              <th scope="col">Number of people</th>
              <th scope="col">Menu</th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            <tr>
              <td class="py-3">#</td>
              <td class="py-3">O-Re!</td>
              <td class="py-3">Ore</td>
              <td class="py-3">11:00  12 OCT 2024</td>
              <td class="py-3">3</td>
              <td class="py-3">Beef Katsu Course ￥162,000</td>
              <td><button type="button" class="btn btn-secondary">Cancel</button></td>
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