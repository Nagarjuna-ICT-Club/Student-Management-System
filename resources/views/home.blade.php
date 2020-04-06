@extends('layouts.app')
@section('title','Home')
@section('bread', 'Home')
@section('content')

<div id="application"></div>
    <!-- status cards starts -->
    <div class="statusCards">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="info">
                    <h1>
                        999
                    </h1>
                    <span class="cardTitle">Assignments</span>
                </div>
                <div class="icon align-self-center">
                    <i class="fas fa-code"></i>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="info">
                    <h1>
                        2000%
                    </h1>
                    <span class="cardTitle">Attendance</span>
                </div>
                <div class="icon align-self-center">
                    <i class="fas fa-chart-bar"></i>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="info">
                    <h1>
                        999
                    </h1>
                    <span class="cardTitle">Messages</span>
                </div>
                <div class="icon align-self-center">
                    <i class="far fa-envelope"></i>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="info">
                    <h1>
                        16
                    </h1>
                    <span class="cardTitle">Opportunities</span>
                </div>
                <div class="icon align-self-center">
                    <i class="fas fa-gift"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- status card ends -->

    <!-- graph and message starts -->
    <div class="graphAndMessage">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="graph">
                    <i class="fas fa-chart-bar"></i> My Status
                    <hr />
                    <div id="chart"></div>
                </div>
                <div class="messages">
                    <i class="far fa-envelope"></i> My Messages
                    <hr />

                    <!-- this is first card -->
                    <div class="max-w-sm w-full lg:max-w-full lg:flex">
                        <div
                            class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="{{ asset("asset/img/logo.png") }}"
                                    alt="Avatar of Jonathan Reinink">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">Rekha Bhandari</p>
                                    <p class="text-gray-600">5th Sem</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <!-- this is second card -->
                    <div class="max-w-sm w-full lg:max-w-full lg:flex">
                        <div
                            class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="{{ asset("asset/img/logo.png") }}"
                                    alt="Avatar of Jonathan Reinink">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">Rekha Bhandari</p>
                                    <p class="text-gray-600">5th Sem</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <!-- this is third card -->
                    <div class="max-w-sm w-full lg:max-w-full lg:flex">
                        <div
                            class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="{{ asset("asset/img/logo.png") }}"
                                    alt="Avatar of Jonathan Reinink">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">Rekha Bhandari</p>
                                    <p class="text-gray-600">5th Sem</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 breaker">
                <!-- 1st announce ment -->
                <div class="announcements">
                    <i class="fas fa-volume-up"></i> My Announcements
                    <hr />
                    <!-- announcement card -->
                    <div class="announcementCard">
                        <div class="announcementTitle">
                            College is going to be closed on April 25.
                        </div>
                        <div class="postedDate">
                            <i class="far fa-clock"></i> 24-04-2020, 10:30 AM
                        </div>

                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, quis laboriosam
                            dolor, at eos maiores obcaecati autem, impedit incidunt doloribus fuga officiis!
                            Vitae, ex aliquid quo mollitia fuga sed sequi.
                        </p>
                        <div class="postedBy">
                            Thanks,<br/>
                            Mangal, Director!
                        </div>
                    </div>
                    <hr/>
                    <!-- announcement card -->
                    <div class="announcementCard">
                        <div class="announcementTitle">
                            College is going to be closed on April 25.
                        </div>
                        <div class="postedDate">
                            <i class="far fa-clock"></i> 24-04-2020, 10:30 AM
                        </div>

                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, quis laboriosam
                            dolor, at eos maiores obcaecati autem, impedit incidunt doloribus fuga officiis!
                            Vitae, ex aliquid quo mollitia fuga sed sequi.
                        </p>
                        <div class="postedBy">
                            Thanks,<br/>
                            Mangal, Director!
                        </div>
                    </div>
                    <hr/>
                    <!-- announcement card -->
                    <div class="announcementCard">
                        <div class="announcementTitle">
                            College is going to be closed on April 25.
                        </div>
                        <div class="postedDate">
                            <i class="far fa-clock"></i> 24-04-2020, 10:30 AM
                        </div>

                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, quis laboriosam
                            dolor, at eos maiores obcaecati autem, impedit incidunt doloribus fuga officiis!
                            Vitae, ex aliquid quo mollitia fuga sed sequi.
                        </p>
                        <div class="postedBy">
                            Thanks,<br/>
                            Mangal, Director!
                        </div>
                    </div>
                </div>
                <hr/>
            </div>
        </div>
    </div>
    <!-- graph and message starts -->
</div>
</div>

@endsection
@section('js')

@endsection
