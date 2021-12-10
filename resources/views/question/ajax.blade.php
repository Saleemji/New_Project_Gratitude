<script>

    var manageTable;

    $(document).ready(function() {
         dataTableInit();
    });


function dataTableInit() {

    manageTable =   $("#list").DataTable({
        "ajax": "{{route('allQuestion')}}",
        "method": "get",
        "order": [],
        responsive: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        dom: 'Bfrtip',

        buttons:[
            {
                extend:"excel",
		title: 'Employee List',
                className:"btn bg-excel btn-flat margin",
                text: '<img src="{{asset('images/icons/excel.svg')}}">',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
            ,{
                extend:"pdf",
		title: 'Employee List',
                className:"btn bg-red btn-flat margin",
                text: '<img src="{{asset('images/icons/pdf.svg')}}">',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
            , {
                extend: "print",
		title: 'Employee List',
                className: "btn bg-red btn-flat margin",
                text: '<img src="{{asset('images/icons/print.svg')}}">',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
            }
        ]
    });

}

    $("#submitBtnQuestion").on('click', function() {

    $(".form-group").removeClass('has-error').removeClass('has-success');
    $(".text-danger").remove();
    $(".messages").html("");
    $(".loader-ajax").fadeOut("slow").show();
    $("#InsertFormQuestion").unbind('submit').bind('submit', function() {

        $(".text-danger").remove();

        var form = $(this);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var postData = new FormData($("#InsertFormQuestion")[0]);
        $.ajax({
            cache:false,
            contentType: false,
            processData: false,
            url : form.attr('action'),
            type : form.attr('method'),
            dataType : 'json',
            data : postData,
            // data : form.serialize(),
            success:function(response) {
                $(".loader-ajax").hide();
// remove the error
                $(".form-group").removeClass('has-error').removeClass('has-success');
                if(response.success == true) {
                    toastr.success('Added Successfully.', 'Question', {timeOut: 5000});
                    $("#InsertFormQuestion")[0].reset();
                    $('#addModal').modal('hide');
                    manageTable.ajax.reload(null, false);
                }
                else
                {
                    toastr.error(response.messages, '', {timeOut: 5000});
                }  // /else
            } // success
        }); // ajax subit

        return false;
    }); // /submit form for create member
}); // /add modal

   

    function removeItemDeleted(id = null) {
        if(id) {
            // click on remove button
            $("#removeBtnDelete").unbind('click').bind('click', function() {
                $(".loader-ajax").fadeOut("slow").show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('removeQuestion')}}',
                    type: 'post',
                    data: {question : id},
                    dataType: 'json',
                    success:function(response) {
                        if(response.success == true) {
                            manageTable.ajax.reload(null, false);
                            toastr.success('Deleted Successfully.', 'Question', {timeOut: 3000});
                            $("#modalConfirmDelete").modal('hide');
                            $(".loader-ajax").hide();
                        } else {
                            toastr.error('To Delete Question.', 'Failed', {timeOut: 3000});
                        }
                    }
                });
            });
        }
        else
        {
            alert('Error: Refresh the page again');
        }
    }

    $("#searchBtn").on('click', function() {
        $(".loader-ajax").fadeOut("slow").show();
// submit form
        $("#searchForm").unbind('submit').bind('submit', function() {

            $(".text-danger").remove();

            var form = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /**
             * Search Date Ajax
             */
            var postData = new FormData($("#searchForm")[0]);
            $.ajax({
                cache:false,
                contentType: false,
                processData: false,
                url : form.attr('action'),
                type : form.attr('method'),
                dataType : 'json',
                data : postData,

                success:function(response) {

                    if (response.success != false)
                    {
                        if (response.messages == 'Not Found.'){
                            toastr.error(response.messages, 'Record', {timeOut: 3000});
                        }
                        else{
                            toastr.success(response.messages, 'Record', {timeOut: 3000});
                        }

                        $('#list').DataTable().clear().destroy();

                        manageTable = $('#list').DataTable(response);

                        new $.fn.dataTable.Buttons(manageTable, {
                            buttons:[
                                {
                                    extend:"excel",
				    title: 'Employee List',
                                    className:"btn bg-excel btn-flat margin",
                                    text: '<img src="{{asset('images/icons/excel.svg')}}">',
                                    exportOptions: {
                                        columns: 'th:not(:last-child)'
                                    }
                                }
                                , {
                                    extend: "pdf",
				    title: 'Employee List',
                                    className: "btn bg-red btn-flat margin",
                                    text: '<img src="{{asset('images/icons/pdf.svg')}}">',
                                    exportOptions: {
                                        columns: 'th:not(:last-child)'
                                    },
                                }
                                , {
                                    extend: "print",
				    title: 'Employee List',
                                    className: "btn bg-red btn-flat margin",
                                    text: '<img src="{{asset('images/icons/print.svg')}}">',
                                    exportOptions: {
                                        columns: 'th:not(:last-child)'
                                    },
                                }
                            ]
                        });

                        manageTable.buttons( 0, null ).container().prependTo(
                            manageTable.table().container()
                        );

                        $("#list_length").hide();
                        $(".loader-ajax").hide();
                    }
                    else {
                        toastr.warning(response.messages, 'Error', {timeOut: 3000});
                        $(".loader-ajax").hide();
                    }
                }
            });

            return false;
        });
    });

  

    function resetSearchForm(){
        $('#list').DataTable().clear().destroy();
        dataTableInit();
    }

</script>
