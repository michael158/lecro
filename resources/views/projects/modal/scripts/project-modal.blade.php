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
                url: '{{url('projects/create')}}',
                data: data,
                success: function (data) {
                    $('#project-modal').modal('hide');
                    $('#kanbans_list').prepend(makeProject(data));
                    console.log($('#kanbans_list .coluna_x3 .kanban').length);

                    if($('#kanbans_list .coluna_x3').length >= 7){
                        $('#kanbans_list .coluna_x3:last').remove();
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            })


        }


        function makeProject(project) {
            var baseUrl = '{{ url('/projects/') }}';
            var html = '<div class="coluna_x3">';
            html += '<span class="pull-right btn-delete">';
            html += '<a href="' + baseUrl + '/delete/' + project.id + '" class="hide" data-toggle="tooltip" title="deletar"><i class="fa fa-times"></i></a>';
            html += '</span>';
            html += '<a href="' + baseUrl + '/' + project.id + '">';
            html += '<div class="kanban">';
            html += ' <div class="titulo"><h3>' + project.name + '</h3></div>';
            html += '<div class="main">';
            html += '<div class="text-center">';
            html += '<h4>Data de Término</h4>';
            html += '<h5 style="color: #EA1B1B">' + formatDate(project.finish_date) + '</h5>';
            html += '</div>';
            html += '<div class="afazer">A fazer: 0</div>';
            html += '<div class="fazendo">Fazendo: 0</div>';
            html += ' <div class="feito">Feito: 0</div>';
            html += '</div>';
            html += '</div>';
            html += '</a>';
            html += '</div>';

            return html;
        }



        function formatDate(date) {
            var meses = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
            var valueParts = date.split('-');
            var dia = valueParts[2];
            var mes = parseInt(valueParts[1]) - 1;
            var ano = valueParts[0];
            var diaext = dia + " de " + meses[mes] + " de " + ano;
            return diaext;
        }


        function clear() {
            $('form').validate().resetForm();
            $('.form-control').val(null)
        }


    });
</script>