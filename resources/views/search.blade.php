@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{Auth::user()->company}} - {{Auth::user()->branch}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Calendar</a></li>
                <li class="breadcrumb-item active">{{Auth::user()->branch}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Searched Keyword: <b>{{ $keyword }}</b></h5>
            
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">

                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <b>Event Results</b>
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Title</th>
                                                    <th width="20%">Description</th>
                                                    <th width="10%">Branch</th>
                                                    <th width="10%">Date</th>
                                                    <th width="10%">Date Encoded</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events as $event)
                                                    <tr>
                                                        <td>{{ $event->id }}</td>
                                                        <td>{{ $event->title }}</td>
                                                        <td>{{ $event->description }}</td>
                                                        <td>{{ $event->branch }}</td>
                                                        <td>{{ Carbon\Carbon::parse($event->start)->format('M d, Y') }}</td>
                                                        <td>{{ Carbon\Carbon::parse($event->DateEncoded)->format('M d, Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>

                            <div class="accordion-item">

                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <b>Blockoff Results</b>
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Start Date</th>
                                                    <th width="15%">End Date</th>
                                                    <th width="40%">Title</th>
                                                    <th width="15%">Branch</th>
                                                    <th width="15%">Date Encoded</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events as $event)
                                                    <tr>
                                                        <td>{{ Carbon\Carbon::parse($event->start)->format('M d, Y') }}</td>
                                                        <td>{{ Carbon\Carbon::parse($event->end)->format('M d, Y') }}</td>
                                                        <td>{{ $event->title }}</td>
                                                        <td>{{ $event->branch }}</td>
                                                        <td>{{ Carbon\Carbon::parse($event->DateEncoded)->format('M d, Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>

                            <div class="accordion-item">

                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <b>Recall Results</b>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Start Date</th>
                                                    <th width="10%">End Date</th>
                                                    <th width="20%">Title</th>
                                                    <th width="10%">Branch</th>
                                                    <th width="10%">Date Encoded</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events as $event)
                                                    <tr>
                                                        <td>{{ Carbon\Carbon::parse($event->start)->format('M d, Y') }}</td>
                                                        <td>{{ Carbon\Carbon::parse($event->end)->format('M d, Y') }}</td>
                                                        <td>{{ $event->title }}</td>
                                                        <td>{{ $event->branch }}</td>
                                                        <td>{{ Carbon\Carbon::parse($event->DateEncoded)->format('M d, Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>           

                                    </div>
                                </div>

                            </div>

                        </div>
        
                    </div>
                </div>
            </div>



            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Events</h5>
    
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">Title</th>
                                    <th width="20%">Description</th>
                                    <th width="10%">Branch</th>
                                    <th width="10%">Start Date</th>
                                    <th width="10%">End Date</th>
                                    <th width="10%">Date Encoded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->branch }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->start)->format('M d, Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->end)->format('M d, Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->DateEncoded)->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blockoffs</h5>
    
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th width="10%">Start Date</th>
                                    <th width="10%">End Date</th>
                                    <th width="20%">Title</th>
                                    <th width="10%">Branch</th>
                                    <th width="10%">Date Encoded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($event->start)->format('M d, Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->end)->format('M d, Y') }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->branch }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->DateEncoded)->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recalls</h5>
    
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th width="10%">Start Date</th>
                                    <th width="10%">End Date</th>
                                    <th width="20%">Title</th>
                                    <th width="10%">Branch</th>
                                    <th width="10%">Date Encoded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($event->start)->format('M d, Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->end)->format('M d, Y') }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->branch }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->DateEncoded)->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div> --}}


        </div>
    </section>
</main>

@include('layouts.footer')