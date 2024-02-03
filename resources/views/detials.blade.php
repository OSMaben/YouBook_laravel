@extends('layouts.main')

@section('content')

<style>

    body {
        background-color: #fdf1ec;
    }

    .wrapper {
        height: 420px;
        width: 654px;
        margin: 50px auto;
        border-radius: 7px 7px 7px 7px;
        /* VIA CSS MATIC https://goo.gl/cIbnS */
        -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
    }



    .product-img img {
        border-radius: 7px 0 0 7px;
    }

    .product-info {
        height: 420px;
        width: 327px;
        border-radius: 0 7px 10px 7px;
        background-color: #ffffff;
    }

    .product-text {
        height: 300px;
        width: 327px;
    }

    .product-text h1 {
        margin: 0 0 0 38px;
        padding-top: 52px;
        font-size: 34px;
        color: #474747;
    }

    .product-text h1,
    .product-price-btn p {
        font-family: 'Bentham', serif;
    }

    .product-text h2 {
        margin: 0 0 47px 38px;
        font-size: 13px;
        font-family: 'Raleway', sans-serif;
        font-weight: 400;
        text-transform: uppercase;
        color: #d2d2d2;
        letter-spacing: 0.2em;
    }

    .product-text p {
        height: 125px;
        margin: 0 0 0 38px;
        font-family: 'Playfair Display', serif;
        color: #8d8d8d;
        line-height: 1.7em;
        font-size: 15px;
        font-weight: lighter;
        overflow: hidden;
    }

    .product-price-btn {
        height: 103px;
        width: 327px;
        margin-top: 17px;
        position: relative;
    }

    .product-price-btn p {
        display: inline-block;
        position: absolute;
        top: -13px;
        height: 50px;
        font-family: 'Trocchi', serif;
        margin: 0 0 0 38px;
        font-size: 28px;
        font-weight: lighter;
        color: #474747;
    }

    span {
        display: inline-block;
        height: 50px;
        font-family: 'Suranna', serif;
        font-size: 34px;
    }

    .product-price-btn button {
        display: inline-block;
        height: 50px;
        width: 176px;
        margin: 0 40px 0 16px;
        box-sizing: border-box;
        border: transparent;
        border-radius: 60px;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #ffffff;
        background-color: #0d6efd;
        cursor: pointer;
        outline: none;
    }

    .product-price-btn button:hover {
        background-color: #295090;
    }
</style>
<div class="wrapper">
    <div >
        <img style="width:100%;" src="{{asset('storage/' . $book->image) }}" alt="book image"/>
    </div>
    <div class="product-info">
        <div class="product-text">
            <h1>{{$book->title}}</h1>
            <p>{{$book->description}} </p>
        </div>
        <div class="product-price-btn">
            <button type="button">Reserve</button>
        </div>
    </div>
</div>
@endsection
