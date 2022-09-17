@extends('layouts.navigation')
@section('content')

                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">
                                <h3 class="stats-title"> Deposit Amount</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">₹ {{ $deposit_amount }}</div>
                                        <div class="stats-change">
                                            <span class="stats-percentage"></span>
                                            <span class="stats-timeframe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-danger ">
                                <h3 class="stats-title"> Withdrawal Amount</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-cart-arrow"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">₹ {{ $withdrwal_amount }}</div>
                                        <div class="stats-change">
                                            <span class="stats-percentage"></span>
                                            <span class="stats-timeframe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-4">
                            <div class="stats stats-success ">
                                <h3 class="stats-title">  Balance Amount</h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-cart-arrow-"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number">₹ {{ $account_balance }}</div>
                                        <div class="stats-change">
                                            <span class="stats-percentage"></span>
                                            <span class="stats-timeframe"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                

@stop