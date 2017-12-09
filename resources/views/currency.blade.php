@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">Aktualny kurs najpopularniejszych kryptowalut:
            <div class="text-right pull-right">
                Zmien walute:
                <a href="/currency?convert=USD" class="btn btn-info btn-xs">USD</a>
                <a href="/currency?convert=PLN" class="btn btn-info btn-xs">PLN</a>
                <a href="/currency?convert=EUR" class="btn btn-info btn-xs">EUR</a>

            </div>
        </div>
        @if (!empty($datas))
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        @switch( Request('convert') )
                            @case('EUR')
                            <th>Cena (EUR)</th>
                            @break
                            @case('PLN')
                            <th>Cena (PLN)</th>
                            @break
                            @default
                            <th>Cena (USD)</th>
                        @endswitch

                        <th>Zmiana z 1h</th>
                        <th>Zmiana z 24h</th>
                        <th>Zmiana z 7d</th>
                        <th>Aktualizacja</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            @switch( Request('convert') )
                                @case('EUR')
                                <td>{{ $data->price_eur }}</td>
                                @break
                                @case('PLN')
                                <td>{{ $data->price_pln }}</td>
                                @break
                                @default
                                <td>{{ $data->price_usd }}</td>

                            @endswitch

                            @if ($data->percent_change_1h > 0)
                                <td class="text-success bg-success">{{ $data->percent_change_1h }}</td>
                            @else
                                <td class="bg-danger">{{ $data->percent_change_1h }}</td>
                            @endif

                            @if ($data->percent_change_24h > 0)
                                <td class="text-success bg-success">{{ $data->percent_change_24h }}</td>
                            @else
                                <td class="bg-danger">{{ $data->percent_change_24h }}</td>
                            @endif
                            @if ($data->percent_change_7d > 0)
                                <td class="text-success bg-success">{{ $data->percent_change_7d}}</td>
                            @else
                                <td class="bg-danger">{{ $data->percent_change_7d}}</td>
                            @endif
                            <td>  <?php
                                $datetimeFormat = 'Y-m-d H:i:s';
                                $date = new \DateTime('now', new \DateTimeZone('Europe/Warsaw'));
                                $date->setTimestamp($data->last_updated);
                                echo $date->format($datetimeFormat);
                                ?>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>

    {{--{{ dd($datas) }}--}}


@endsection
