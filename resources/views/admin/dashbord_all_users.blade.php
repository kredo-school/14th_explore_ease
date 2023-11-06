@extends('layouts.app')

@section('content')

{{-- temporaly use for front end coding--}}
               <!-- Bootstrap -->
               <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
               <!-- FontAwsome CDN -->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- end --}}

<div class="container w-50">
    <h2>Dashboards</h2>
    {{-- Search Box --}}
    <div class="container">

    </div>

    {{-- User Info Date Table --}}
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">id</font></font></th>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Username</font></font></th>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">name</font></font></th>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">タイトル</font></font></th>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">タイトル</font></font></th>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">タイトル</font></font></th>
              <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">タイトル</font></font></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,001</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">データ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,002</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壮大</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">デザイン</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">調整</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,003</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">リッチ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">役に立つ</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,003</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">情報</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">実例</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,004</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">データ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">調整</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,005</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壮大</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,006</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">実例</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">リッチ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,007</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">役に立つ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">情報</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壮大</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,008</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">データ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,009</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壮大</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">デザイン</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">調整</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,010</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">リッチ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">役に立つ</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,011</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">情報</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">実例</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,012</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">豊かにする</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">調整</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,013</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壮大</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">デザイン</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,014</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">価値</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">実例</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">リッチ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ランダム</font></font></td>
            </tr>
            <tr>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,015</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">データ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">役に立つ</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">情報</font></font></td>
              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">スケジュール</font></font></td>
            </tr>
          </tbody>
        </table>
      </div>

</div>


@endsection