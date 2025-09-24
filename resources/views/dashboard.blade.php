@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{Auth::user()->company}} - {{Auth::user()->branch}} Dashboard </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">{{Auth::user()->branch}}</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Schedules <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><span id="events" class="display-4"></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Recalls <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><span id="recalls" class="display-4"></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Blockoffs <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><span id="blockoffs" class="display-4"></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Patient Schedules '{{ date('y') }}</h5>
                
                                <!-- Line Chart -->
                                <div id="reportsChart" style="max-height: 400px;"></div>

                                <script>
                                    var eventYear = {!! json_encode($eventYear) !!};
                                    var recallYear = {!! json_encode($recallYear) !!};
                                    var blockoffYear = {!! json_encode($blockoffYear) !!};

                                    console.log(blockoffYear);

                                    document.addEventListener("DOMContentLoaded", () => {
                                      new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: "Events",
                                            data: eventYear
                                        }, {
                                            name: "Recalls",
                                            data: recallYear
                                        }, {
                                            name: "Blockoffs",
                                            data: blockoffYear
                                        }],
                                        chart: {
                                          height: 350,
                                          type: 'line',
                                          zoom: {
                                            enabled: false
                                          }
                                        },
                                        dataLabels: {
                                          enabled: true
                                        },
                                        stroke: {
                                          curve: 'straight'
                                        },
                                        grid: {
                                          row: {
                                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                            opacity: 0.5
                                          },
                                        },
                                        xaxis: {
                                          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                        }
                                      }).render();
                                    });
                                </script>
                
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
    
                <div class="card-body">
                  <h5 class="card-title">Recent Activity <span>| Today</span></h5>
    
                  <div class="activity">
    
                    @foreach ($recents as $recent)
                    
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{ $recent->difference }} {{ $recent->difference_type }}</div>
                            <i class='bi bi-circle-fill activity-badge align-self-start' style="color:{{ $recent->color }}"></i>
                            <div class="activity-content">
                            {{ $recent->title }} - <b>{{ Carbon\Carbon::parse($recent->start)->format('M d, Y') }}</b>
                            </div>
                        </div><!-- End activity item-->

                    @endforeach
    
                  </div>
    
                </div>
            </div><!-- End Recent Activity -->

            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Data Pie Chart</h5>
    
                <!-- Pie Chart -->
                <canvas id="pieChart" style="max-height: 400px;"></canvas>
                <script>
                    var events = {!! json_encode($events) !!};
                    var recalls = {!! json_encode($recalls) !!};
                    var blockoffs = {!! json_encode($blockoffs) !!};

                    document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                        labels: [
                            'Schedules',
                            'Recalls',
                            'Blockoffs'
                        ],
                        datasets: [{
                            label: 'My First Dataset',
                            data: [events, recalls, blockoffs],
                            backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                        }
                    });
                    });
                </script>
                <!-- End Pie CHart -->
    
                </div>
            </div>
        </div>
    </section>
</main>


<script>
    document.addEventListener("DOMContentLoaded", () => {

        var events = {!! json_encode($events) !!};
        var recalls = {!! json_encode($recalls) !!};
        var blockoffs = {!! json_encode($blockoffs) !!};

        function counter(id, start, end, duration) {
            let obj = document.getElementById(id),
            current = start,
            range = end - start,
            increment = end > start ? 1 : -1,
            step = Math.abs(Math.floor(duration / range)),
            timer = setInterval(() => {
                current += increment;
                obj.textContent = current;
                if (current == end) {
                    clearInterval(timer);
                }
            }, step);
        }

        counter("events", 1, events, 100);
        counter("recalls", 1, recalls, 100);
        counter("blockoffs", 1, blockoffs, 100);
    });
   
</script>

@include('layouts.footer')