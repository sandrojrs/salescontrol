@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pedidos</h2>
            </div>
        </div>
    </div>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>-</th>
                <th>id</th>
                <th>Status</th>
                <th>Código rastreio</th>
                <th>Data do Pedido</th>
            </tr>
        </thead>
        @foreach ($orders as $key => $order)
            <tbody>
                <tr class="table-primary">
                    <td role="button" onclick="hiddeTable('table_{{ $key }}')">+</td>
                    <td>{{ $key }}</td>
                    <td>{{ $order->state }}</td>
                    <td>{{ $order->tracking_code }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <td colspan="5">
                        <table class="table mb-0 d-none" id="table_{{ $key }}">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Valor</th>
                                    <th>Quantidade</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orders as $product)
                                    <tr>
                                        <td>{{ $product->variation->product->name }}</td>
                                        <td>{{ $product->variation->product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td> R$: {{ $product->quantity * $product->variation->product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <script type="text/javascript">
        function hiddeTable($id) {
           let component = $('#' + $id);
            if(component.hasClass("d-none")){
                $('#' + $id).removeClass('d-none');
            }else{
                $('#' + $id).addClass('d-none');
            }
        }
    </script>
@endsection
