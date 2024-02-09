@extends('layout')
@section('title', 'eGP Stores | Home')
@section('main-content')
<div class="main-content">
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="card">
    <div class="card-statistic-4">
    <div class="align-items-center justify-content-between">
        <div class="row ">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
            <div class="card-content">
            <h5 class="font-15">Total Items in Store</h5>
            <h2 class="mb-3 font-18"> {{number_format($all_items)}} </h2>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
            <div class="banner-img">
            <img src="assets/img/banner/inventory.png" alt="" width="100px">
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
        <div class="card-statistic-4">
        <div class="align-items-center justify-content-between">
            <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                <h5 class="font-15">Items Issued Out</h5>
                <h2 class="mb-3 font-18">{{number_format($items_issued)}}</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <a href="{{route('items.issued')}}">
                    <div class="banner-img">
                        <img src="assets/img/banner/issue_out.png" alt="" width="100px">
                    </div>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
                <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                    <h5 class="font-15">Items Returned</h5>
                    <h2 class="mb-3 font-18">{{number_format($items_returned)}}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                   <a href="{{route('items.returned')}}">
                    <div class="banner-img">
                        <img src="assets/img/banner/items_returned.png" alt="" width="100px">
                    </div>
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
<div class="row">
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="card">
    <div class="card-statistic-4">
    <div class="align-items-center justify-content-between">
        <div class="row ">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
            <div class="card-content">
            <h5 class="font-15">Orders Delivered</h5>
            <h2 class="mb-3 font-18">{{number_format($orders_delivered_count)}}</h2>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
            <a href="{{route('purchase_order.index')}}">
                <div class="banner-img">
                    <img src="assets/img/banner/delivered_order.png" alt="" width="100px">
                </div>
            </a>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
        <div class="card-statistic-4">
        <div class="align-items-center justify-content-between">
            <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                <h5 class="font-15">Pending Orders</h5>
                <h2 class="mb-3 font-18">{{number_format($orders_pending_count)}}</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <a href="{{route('purchase_order.index')}}">
                    <div class="banner-img">
                        <img src="assets/img/banner/pending_order.png" alt="" width="100px">
                    </div>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
                <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                    <h5 class="font-15">Suppliers</h5>
                    <h2 class="mb-3 font-18">{{number_format($supplier_count)}}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <a href="{{ route('supplier.index') }}">
                        <div class="banner-img">
                            <img src="assets/img/banner/supplier.png" alt="" width="100px">
                        </div>
                    </a>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </section>
 </div>
@endsection
