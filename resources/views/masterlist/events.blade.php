@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{Auth::user()->company}} - {{Auth::user()->branch}} Events </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Events</a></li>
                <li class="breadcrumb-item active">{{Auth::user()->branch}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{Auth::user()->branch}} Calendar Events</h5>

                <!-- Table with stripped rows -->
                <table class="table table-hover table-bordered datatable">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col" width="5%">#</th>
                        <th class="text-center" scope="col" width="30%">Title</th>
                        <th class="text-center" scope="col" width="30%">Description</th>
                        <th class="text-center" scope="col" width="15%">Date</th>
                        <th class="text-center" scope="col" width="20%">Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $item)
                            <tr>
                                <td class="text-center" style="background-color: {{$item->color }} ;">{{ $item->id }}</td>
                                <td class="text-center" >{{ $item->title }}</td>
                                <td class="text-center" >{{ $item->description }}</td>
                                <td class="text-center" >{{ Carbon\Carbon::parse($item->start)->format('M d, Y') }}</td>
                                <td class="text-center" >{{ $item->remarks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer')