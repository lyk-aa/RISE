@extends('layouts.warehouse-manager_layout')

@section('title', 'Generate QR')


@section('contents')

    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <div class="d-flex flex-column">



        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Warehouse Stocks</h5>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Rice type</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Arrival Date</th>
                                        <th>Product Code</th>
                                        <th>Batch Code</th>
                                        <th>Qr Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warehouse_data['warehouse_stocks'] as $warehouse)
                                        <tr>
                                            <td><?php
                                            // $jsonwarehouse = json_decode($warehouse['products'], true);
                                            // echo $jsonwarehouse;
                                            $products_arr = json_decode(json_encode($warehouse_data['products']), true);
                                            foreach ($products_arr as $product) {
                                                $warehouse_arr = json_decode(json_encode($warehouse), true);
                                                $product_arr = json_decode(json_encode($product), true);
                                                if ($warehouse_arr['product_id'] == $product_arr['product_id']) {
                                                    echo $product_arr['rice_type'];
                                                }
                                            }
                                            ?></td>
                                            <td>{{ $warehouse->unit }}</td>
                                            <td>{{ $warehouse->quantity }}</td>
                                            <td>{{ $warehouse->arrival_date }}</td>
                                            <td>{{ $warehouse->product_code }}</td>
                                            <td>{{ $warehouse->batch_code }}</td>
                                            <td class='qr_code'>{{ $warehouse->qr_code }} <div class='qr_show'></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
            window.addEventListener('load', function() {
                var qr_code_div = document.querySelectorAll('.qr_code')
                var qr_code_array = [...qr_code_div];
                qr_code_array.forEach(element => {
                    const text = element.textContent;
                    console.log(text)
                    const qrcodeDiv = element.querySelector('.qr_show');
                    this.innerHTML = '';
                    const qrcode = new QRCode(qrcodeDiv, {
                        text: text,
                        width: 128,
                        height: 128
                    });

                });
                // console.log(text)
                // if (text) {
                //     qrcodeDiv.innerHTML = '';
                //     const qrcode = new QRCode(qrcodeDiv, {
                //         text: text,
                //         width: 128,
                //         height: 128
                //     });
                // }
            })
        </script>


    @endsection
