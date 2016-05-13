<script>
    $(document).ready(function () {
        $('.drag').sortable({
            connectWith: '.drag',
            dropOnEmpty: true,
            scroll: true,
            revert: true,
            start: function (event, ui) {
                clone = $(ui.item[0].outerHTML).clone();
            },
            placeholder: {
                element: function (clone) {
                    var width = $(clone[0]).closest('.postit').width();
                    var height = $(clone[0]).closest('.postit').height();
                    html = '<div style="width:' + width + 'px; height:' + height + 'px; border:dashed 5px #C3C3C3; margin-top:10px"></div>';
                    return html;
                },
                update: function () {
                    return;
                }
            },

            stop: function (e, ui) {
                var father = $(ui.item[0]).closest('.father');
                var col = father.attr('data-col');
                var id = $(ui.item[0]).attr('data-id')
                updateStatus(col , id);
                checkSpinner(father);
            }
        });

        function checkSpinner(father) {
            if(father.attr('data-col') == 2){
                var panel = $('.panel-heading i', father);
                panel.addClass('fa-spin');
            }

        }


        function updateStatus(status, id){
            $.ajax({
                method: 'post',
                url: '{{url('postits/update-status')}}/' + id,
                data: 'status=' + status,
                success: function (data) {
//                    console.log(data);
                },
                error: function (data){
//                    console.log(data);
                }
            })
        }



    })
</script>
