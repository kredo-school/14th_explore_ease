@extends('layouts.app')

@section('content')

{{-- temporaly use for front end coding--}}
               <!-- Bootstrap -->
               <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
               <!-- FontAwsome CDN -->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- end --}}

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
              <th scope="col">Username</th>
              <th  colspan="2">name</th>
              <th scope="col">registration date</th>
              <th scope="col">e-mail</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            <tr>
              <td>#</td>
              <td>O-Re!</td>
              <td>Ore</td>
              <td>Dayo</td>
              <td>11:00  12 OCT 2024</td>
              <td>messi@gmail,be.sp</td>
              <td>1234567890</td>
              <td><button type="button" class="btn btn-secondary">Inactivate</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--permanent_area-->
        <div class="d-flex justify-content-center">
          <a  class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<%preventry_url>">previous &lt;&lt;</a>
        <!--nextentry-->
          <a  class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover mx-5" href="<%nextentry_url>">&gt;&gt;next</a>
        <!--/permanent_area-->
        </div>
</div>


@endsection