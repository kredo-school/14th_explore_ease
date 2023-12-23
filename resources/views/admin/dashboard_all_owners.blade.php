@extends('layouts.app')

@section('styles')
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- FontAwsome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

<div class="container w-75">
    <h2>All owners</h2>
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
              <th scope="col">phone</th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            @foreach ($profiles as $profile)
            <tr>
                @foreach ($userIds[$loop->index] as $userId)
                    <td class="py-3">{{$userId->id}}</td>
                @endforeach

                @foreach ($userNames[$loop->index] as $userName)
                    <td class="py-3">{{ $userName }}</td>
                @endforeach

                <td class="py-3">{{ $firstNames[$loop->index] }}</td>

                <td class="py-3">{{ $lastNames[$loop->index] }}</td>

                @foreach ($registDates[$loop->index] as $registDate)
                    <td class="py-3">{{ $registDate }}</td>
                @endforeach

                @foreach ($emails[$loop->index] as $email)
                    <td class="py-3">{{ $email }}</td>
                @endforeach

                <td class="py-3">{{ $phones[$loop->index] }}</td>

                <td class="py-3">
                    @foreach ($userIds[$loop->index] as $userId)
                        @if ($userId->trashed())
                            <i class="fa-solid fa-circle-minus text-secondary"></i> &nbsp; Inactive
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> &nbsp; Active
                        @endif
                    @endforeach
                </td>


                <td>

                    @foreach ($userIds[$loop->index] as $userId)
                            @if ($userId->trashed())
                                <form action="{{-- route('admin_user.unhide',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-secondary">Activate User {{ $userId->id }}</button>
                            @else
                                <form action="{{-- route('admin_user.hide',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Inactivate User {{ $userId->id }}</button>
                            @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $profiles->links() }}
    </div>
</div>


@endsection
