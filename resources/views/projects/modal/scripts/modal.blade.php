<script>
    $(document).ready(function () {
        $('form').validate();

        $(document).on('hide.bs.modal', function () {
            clear();
        });

        //---------------------------------------------------
        // CREATE POST IT
        //---------------------------------------------------
        $(document).on('click', '#btn-create', function () {
            if ($('form').valid()) {
                create();
            }
        })

        function create() {
            var data = $('form').serialize();
            $.ajax({
                method: 'post',
                url: '{{url('postits/create')}}',
                data: data,
                success: function (data) {
                    $('#postit-modal').modal('hide');
                    $('#do .drag').append(makePostIt(data));
                },
                error: function (data) {
                    console.log(data);
                }
            })


        }


        function makePostIt(postit) {
            var html = '<div class="postit ui-sortable-handle" data-id="' + postit.id + '">';
            html += '       <div class="title"><h4>' + postit.title + '</h4></div>';
            html += '          <div class="content">';
            html += postit.description;
            html += '           </div>';
            html += '       </div>';
            html += '   </div>';
            return html;
        }

        function clear() {
            $('form').validate().resetForm();
            $('.form-control').val(null)
        }


    });
</script>