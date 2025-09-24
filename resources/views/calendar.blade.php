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
                <li class="breadcrumb-item active">{{Auth::user()->branch}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" style="margin: auto;">
                            <h5 class="card-title">{{Auth::user()->branch}}</h5>
                        </div>
                        <div class="col-md-6" style="margin:auto;">
                            <div class="col-md-3" style="float:right;">
                                @if (Auth::user()->account == "Admin")
                                <select class="form-control" name="selectBranch" id="selectBranch">
                                    <option value="" required>Select Branch</option>
                                    <option value="TRAG" required>TRAG</option>
                                    <option value="SLMC" required>SLMC</option>
                                    <option value="BGC" required>BGC</option>
                                    <option value="MEGAMALL" required>MEGAMALL</option>
                                    <option value="VERTIS" required>VERTIS</option>
                                    <option value="TRINOMA" required>TRINOMA</option>
                                    <option value="RMAG" required>RMAG</option>
                                    <option value="CONRAD" required>CONRAD</option>
                                    <option value="ALABANG" required>ALABANG</option>
                                    <option value="CEBU" required>CEBU</option>
                                </select>                         
                            @endif
                            </div>
                        </div>  
                    </div>
                    <div id='calendar' disabled></div> 
                </div>
            </div>
        </div>
 
        <!-- Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Add New Event</h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="title" class="col-form-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="start_date" class="col-form-label">Start Date</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="start_date" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="end_date" class="col-form-label">Title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text-area" class="form-control" id="end_date" rows="4" cols="50" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="color" class="col-form-label">Color</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="color" class="form-control" id="color">
                                        <option style="color:#ADD8E6;" value="#ADD8E6" >&#9724;  LIGHT BLUE </option>
                                        <option style="color:#5484ed;" value="#5484ed" >&#9724; BOLD BLUE </option>
                                        <option style="color:#a4bdfc;" value="#a4bdfc" >&#9724; BLUE </option>
                                        <option style="color:#46d6db;" value="#46d6db">&#9724; TURQUOISE</option>
                                        <option style="color:#dc2127;" value="#dc2127">&#9724;  RED</option>						  
                                        <option style="color:#7ae7bf;" value="#7ae7bf">&#9724; GREEN</option>
                                        <option style="color:#51b749;" value="#51b749">&#9724; BOLD GREEN</option>
                                        <option style="color:#CCBADC;" value="#CCBADC">&#9724; PURPLE</option>
                                        <option style="color:#fbd75b;" value="#fbd75b">&#9724; YELLOW</option>
                                        <option style="color:#ffb878;" value="#ffb878">&#9724; ORANGE</option>
                                        <option style="color:#ff887c;" value="#ff887c">&#9724;  PINK</option>
                                        <option style="color:gray;" value="gray">&#9724; GRAY</option>
                                        <option style="color:#D3D3D3;" value="#D3D3D3">&#9724; LIGHT GRAY</option>
                                        <option style="color:#FFFFE0;" value="#FFFFE0">&#9724; LIGHT YELLOW</option>
                                        <option style="color:#b5651d;" value="#b5651d">&#9724; LIGHT BROWN</option>
                                        <option style="color:#AFEEEE;" value="#AFEEEE">&#9724; LIGHT TURQUOISE</option>
                                        <option style="color:#90EE90;" value="#90EE90">&#9724; LIGHT GREEN</option>
                                        <option style="color:#9F0324;" value="#9F0324">&#9724; LIGHT MAROON</option>
                                        <option style="color:#FFB6C1;" value="#FFB6C1">&#9724; LIGHT PINK</option>
                                        <option style="color:#ffa500;" value="#ffa500">&#9724; LIGHT ORANGE</option>
                                        <option style="color:#FF69B4;" value="#FF69B4">&#9724; HOT PINK</option>
                                        <option style="color:#A10249;" value="#A10249">&#9724; DARK ROSE</option>
                                        <option style="color:#AA8CC5;" value="#AA8CC5">&#9724; DARK PURPLE</option>
                                        <option style="color:#c08081;" value="#c08081">&#9724; OLD ROSE</option>
                                        <option style="color:#800000;" value="#800000">&#9724; MAROON</option>
                                        <option style="color:#9A64A0;" value="#9A64A0">&#9724; VIOLET</option>
                                        <option style="color:#C39B6A;" value="#C39B6A">&#9724; NUDE BROWN</option>
                                        <option style="color:#FF977E;" value="#FF977E">&#9724; PEACH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="description" class="col-form-label">Description</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="remarks" class="col-form-label">Remarks</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="remarks">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveBtn">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Update Event Details</h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <label for="update_id" class="col-form-label">Event ID</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="update_id" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="update_title" class="col-form-label">Title</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="update_title" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="update_start_date" class="col-form-label">Start Date</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="update_start_date" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="update_nd_date" class="col-form-label">End Date</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="update_end_date" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="update_color" class="col-form-label">Color</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="color" class="form-control" id="update_color">
                                        <option style="color:#ADD8E6;" value="#ADD8E6" >&#9724;  LIGHT BLUE </option>
                                        <option style="color:#5484ed;" value="#5484ed" >&#9724; BOLD BLUE </option>
                                        <option style="color:#a4bdfc;" value="#a4bdfc" >&#9724; BLUE </option>
                                        <option style="color:#46d6db;" value="#46d6db">&#9724; TURQUOISE</option>
                                        <option style="color:#dc2127;" value="#dc2127">&#9724;  RED</option>						  
                                        <option style="color:#7ae7bf;" value="#7ae7bf">&#9724; GREEN</option>
                                        <option style="color:#51b749;" value="#51b749">&#9724; BOLD GREEN</option>
                                        <option style="color:#CCBADC;" value="#CCBADC">&#9724; PURPLE</option>
                                        <option style="color:#fbd75b;" value="#fbd75b">&#9724; YELLOW</option>
                                        <option style="color:#ffb878;" value="#ffb878">&#9724; ORANGE</option>
                                        <option style="color:#ff887c;" value="#ff887c">&#9724;  PINK</option>
                                        <option style="color:gray;" value="gray">&#9724; GRAY</option>
                                        <option style="color:#D3D3D3;" value="#D3D3D3">&#9724; LIGHT GRAY</option>
                                        <option style="color:#FFFFE0;" value="#FFFFE0">&#9724; LIGHT YELLOW</option>
                                        <option style="color:#b5651d;" value="#b5651d">&#9724; LIGHT BROWN</option>
                                        <option style="color:#AFEEEE;" value="#AFEEEE">&#9724; LIGHT TURQUOISE</option>
                                        <option style="color:#90EE90;" value="#90EE90">&#9724; LIGHT GREEN</option>
                                        <option style="color:#9F0324;" value="#9F0324">&#9724; LIGHT MAROON</option>
                                        <option style="color:#FFB6C1;" value="#FFB6C1">&#9724; LIGHT PINK</option>
                                        <option style="color:#ffa500;" value="#ffa500">&#9724; LIGHT ORANGE</option>
                                        <option style="color:#FF69B4;" value="#FF69B4">&#9724; HOT PINK</option>
                                        <option style="color:#A10249;" value="#A10249">&#9724; DARK ROSE</option>
                                        <option style="color:#AA8CC5;" value="#AA8CC5">&#9724; DARK PURPLE</option>
                                        <option style="color:#c08081;" value="#c08081">&#9724; OLD ROSE</option>
                                        <option style="color:#800000;" value="#800000">&#9724; MAROON</option>
                                        <option style="color:#9A64A0;" value="#9A64A0">&#9724; VIOLET</option>
                                        <option style="color:#C39B6A;" value="#C39B6A">&#9724; NUDE BROWN</option>
                                        <option style="color:#FF977E;" value="#FF977E">&#9724; PEACH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="update_description" class="col-form-label">Description</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="update_description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="update_remarks" class="col-form-label">Remarks</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="update_remarks" rows="4"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteBtn">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateBtn">Save changes</button>
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
            selectable: true,
            selectHelper: true,
            defaultView: 'agendaDay',
            select: function(start, end, allDays){
                $('#eventModal').modal('toggle');
                var start_date = moment(start).format('YYYY-MM-DD HH:mm:ss');
                var end_date = moment(end).format('YYYY-MM-DD HH:mm:ss');

                var modal = $(this);

                document.getElementById("start_date").value = start_date;
                document.getElementById("end_date").value =  end_date;


                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    var description = $('#description').val();
                    var color = $('#color').val();
                    var remarks = $('#remarks').val();
                    var start_date = moment(start).format('YYYY-MM-DD HH:mm:ss');
                    var end_date = moment(end).format('YYYY-MM-DD HH:mm:ss');

                    $.ajax({
                        type: 'POST',
                        url: './add-event',
                        dataType:'json',
                        data: {title, description, color, remarks, start_date, end_date},
                        success: function(response)
                        {
                            $('#eventModal').modal('hide');
                            //swal("Good job!", "Event Added!", "success");
                            $('#calendar').fullCalendar('renderEvent', {
                                'id': response.id,
                                'title': response.title,
                                'color': response.color,
                                'remarks': response.remarks,
                                'description': response.description,
                                'start': response.start,
                                'end': response.end
                            });
                            document.getElementById("title").value =  '';
                            document.getElementById("description").value =  '';
                            document.getElementById("color").value =  '';
                            document.getElementById("remarks").value =  '';
                        },
                        error:function(error){
                            console.log(error)
                        }
                    });
                });
            },
            editable: true,
            eventDrop: function(event) {
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
                var end_date = moment(event.end).format('YYYY-MM-DD HH:mm:ss');

                $.ajax({
                    type:'post',
                    url: './move-event/'+ id,
                    dataType:'json',
                    data: {start_date, end_date},
                    success: function(response)
                    {
                        //swal("Good job!", "Event Updated!", "success");
                    },
                    error:function(error){
                        console.log(error)
                    }
                });
            },
            eventResize: function(event) {
                var id = event.id;
                var end_date = moment(event.end).format('YYYY-MM-DD HH:mm:ss');

                $.ajax({
                    type:'post',
                    url: './resize-event/'+ id,
                    dataType:'json',
                    data: {end_date},
                    success: function(response)
                    {
                        //swal("Good job!", "Event Updated!", "success");
                    },
                    error:function(error){
                        console.log(error)
                    }
                });
            },
            eventClick: function(event){
                $('#updateModal').modal('toggle');
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
                var end_date = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
                var title = event.title;
                var color = event.color;
                var description = event.description;
                var remarks = event.remarks;

                document.getElementById("update_id").value = id;
                document.getElementById("update_title").value = title;
                document.getElementById("update_start_date").value = start_date;
                document.getElementById("update_end_date").value = end_date;
                document.getElementById("update_color").value = color;
                document.getElementById("update_description").value = description;
                document.getElementById("update_remarks").value = remarks;

                $('#updateBtn').click(function(){
                    var id = $('#update_id').val();
                    var title = $('#update_title').val();
                    var start_date = $('#update_start_date').val();
                    var end_date = $('#update_end_date').val();
                    var description = $('#update_description').val();
                    var color = $('#update_color').val();
                    var remarks = $('#update_remarks').val();

                    $.ajax({
                        type: 'POST',
                        url: './update-event/'+id,
                        dataType:'json',
                        data: {id, title, start_date, end_date, description, color, remarks},
                        success: function(response)
                        {
                            $('#calendar').fullCalendar('removeEvents', response.id);
                            $('#calendar').fullCalendar('renderEvent', {
                                'id': response.id,
                                'title': response.title,
                                'color': response.color,
                                'description': response.description,
                                'remarks': response.remarks,
                                'start': response.start,
                                'end': response.end
                            });
                            $('#updateModal').modal('hide');
                            //swal("Good job!", "Event Updated!", "success");
                        },
                        error:function(error){
                            console.log(error)
                        }
                    });
                });
                $('#deleteBtn').click(function(){
                    var id = $('#update_id').val();

                    if(confirm('Are you sure you want to remove it?')){
                        $.ajax({
                            type:'delete',
                            url: './delete-event/'+ id,
                            dataType:'json',
                            success: function(response)
                            {
                                $('#updateModal').modal('hide');
                                $('#calendar').fullCalendar('removeEvents', response);
                                //swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error){
                                console.log(error)
                            }
                        });
                    }
                });
            },
			eventTextColor: 'black'
        });

        $("#eventModal").on("hidden.bs.modal", function (){
            $('#saveBtn').unbind();
        })

        $("#updateModal").on("hidden.bs.modal", function (){
            $('#updateBtn').unbind();
            $('#deleteBtn').unbind();
        })

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