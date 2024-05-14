@extends('layouts.warehouse-manager_layout')

@section('title', 'Generate QR')


@section('contents')

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<div class="d-flex flex-column">
    <!-- <form action="" class="d-flex flex-column"> -->
        <input class="mb-3 p-2 rounded-3" type="text" name="rice_type" id="rice_type">
        <input class="mb-3 p-2 rounded-3 w-100" type="date" name="arrival_date" id="arrival_date">
        <input class="mb-3 p-2 rounded-3" type="number" name="quantity" id="quantity">
        <button type="submit" id="generateBtn" class=" btn-primary mb-3 p-2 rounded-3">Genearate QR</button>
    <!-- </form> -->
    <div id="qrcode"></div>
</div>
<script>
    const rice_type = document.getElementById('rice_type');
    const arrival_date = document.getElementById('arrival_date');
    const quantity = document.getElementById('quantity');
    const generateBtn = document.getElementById('generateBtn');
    const qrcodeDiv = document.getElementById('qrcode');

    generateBtn.addEventListener('click', () => {
        const text = rice_type.value + arrival_date.value;
        console.log(text)
        if (text) {
            qrcodeDiv.innerHTML = '';
            const qrcode = new QRCode(qrcodeDiv, {
                text: text,
                width: 128,
                height: 128
            });
        }
    })
</script>
@endsection