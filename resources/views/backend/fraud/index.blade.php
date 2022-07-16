@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @include('backend.inc.message')
        <h4>Reported Advertisements</h4>
        <div class="row justify-content-center">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name of ad</th>
                                        <th>Email </th>
                                        <th>Reason</th>

                                        <th>Message</th>
                                        <th>View</th>

                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ads as $ad)
                                    <tr>


                                    </tr>
                                    @empty
                                    <td>No any reported ads to display</td>
                                    @endforelse



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            {{ $ads->links() }}
        </div>


        @endsection