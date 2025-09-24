@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<meta name="csrf-token" content="{{ csrf_token() }}">

<main id="main" class="main">
    <div class="pagetitle col-md-8">
        <h1>{{Auth::user()->company}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Calendar</a></li>
                <li class="breadcrumb-item active">Other Branch</li>
                <li class="breadcrumb-item active">{{$branch}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" style="margin: auto;">
                            <h5 class="card-title">{{$branch}}</h5>
                        </div>
                        <div class="col-md-6" style="margin:auto;">
                            <div class="col-md-3" style="float:right;">
                                @if (Auth::user()->account == "Admin")
                                <select class="form-control" name="selectBranch" id="selectBranch">
                                    <option value="" required>Select Branch</option>
                                    <option value="TRAG" <?php if($branch=="TRAG") echo "selected"?> required>TRAG</option>
                                    <option value="SLMC" <?php if($branch=="SLMC") echo "selected"?> required>SLMC</option>
                                    <option value="BGC" <?php if($branch=="BGC") echo "selected"?> required>BGC</option>
                                    <option value="MEGAMALL" <?php if($branch=="MEGAMALL") echo "selected"?> required>MEGAMALL</option>
                                    <option value="VERTIS" <?php if($branch=="VERTIS") echo "selected"?> required>VERTIS</option>
                                    <option value="TRINOMA" <?php if($branch=="TRINOMA") echo "selected"?> required>TRINOMA</option>
                                    <option value="RMAG" <?php if($branch=="RMAG") echo "selected"?> required>RMAG</option>
                                    <option value="CONRAD" <?php if($branch=="CONRAD") echo "selected"?> required>CONRAD</option>
                                    <option value="ALABANG" <?php if($branch=="ALABANG") echo "selected"?> required>ALABANG</option>
                                    <option value="CEBU" <?php if($branch=="CEBU") echo "selected"?> required>CEBU</option>
                                </select>                         
                            @endif
                            </div>
                        </div>  
                    </div>

                    <div id='calendar'></div> 
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <label for="event_id" class="col-form-label">Events ID</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="event_id" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="title" class="col-form-label">Title</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="title" rows="4" readonly></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="start_date" class="col-form-label">Start Date</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="start_date" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="end_date" class="col-form-label">End Date</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="end_date" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="description" class="col-form-label">Description</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="description" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="remarks" class="col-form-label">Remarks</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="remarks" rows="4" readonly></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        
    </section>
</main><!-- End #main -->


<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var events = {!! json_encode($events) !!};

        $('#calendar').fullCalendar({   
            header:{
                'left': 'prev,today,next',
                'center': 'title',
                'right': 'prevYear,agendaDay,agendaWeek,month,nextYear'
            },
			height: 950,
            events: events,
            nowIndicator: true,
			editable: true,
			eventLimit: true,
            selectable: false,
            selectHelper: true,
            defaultView: 'agendaDay',
            editable: false,
            eventClick: function(event){
                $('#updateModal').modal('toggle');
                var id = event.id;
                var start_date = moment(event.start).format('MMMM D, YYYY - h:mm a');
                var end_date = moment(event.end).format('MMMM D, YYYY - h:mm a');
                var title = event.title;
                var color = event.color;
                var description = event.description;
                var remarks = event.remarks;

                document.getElementById("event_id").value = id;
                document.getElementById("title").value = title;
                document.getElementById("start_date").value = start_date;
                document.getElementById("end_date").value = end_date;
                document.getElementById("description").value = description;
                document.getElementById("remarks").value = remarks;

            },
			eventTextColor: 'black'
        });

        $('.fc-event').css('font-size', '15px')

        $('#calendar_nav').fullCalendar({
            header: {
                left: 'prev,today,next',
                center: 'title',
                right: 'prevYear,month,nextYear'
            },
                
            allDaySlot: false,
            defaultView: 'month',
            defaultDate: moment(),
            selectHelper: true,
            editable: true,
            eventLimit: true,
            
            dayClick: function(date, allDay, jsEvent, view) {
                if(allDay){
                    $('#calendar').fullCalendar('changeView', 'agendaDay');
                    $('#calendar').fullCalendar('gotoDate', date);
                }
            },
        });

        document.getElementById("selectBranch").addEventListener("change", function() {
            let selectedBranch = this.value;
            if (selectedBranch) {
                window.location.href = "./branch/"+selectedBranch;
            }
        });
    });
</script>

@include('layouts.footer')