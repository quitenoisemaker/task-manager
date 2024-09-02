<script>
    $('#project').on('change', function() {

        $("#tbody").html('');
        var project_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{route('projects.show')}}",
            data: {
                project_id: project_id
            },
            success: function(response) {

                $("#no-data").attr('hidden', true);

                if (response.length === 0) {
                    $("#tbody").append('<tr class="text-center"><td colspan="2">No task found</td></tr>');
                } else {
                    $.each(response, function(key, value) {
                        $("#tbody").append('<tr><td>' + value.name + '</td><td>' + value.priority + '</td></tr>');
                    });
                }       
            }
        });
    });
</script>