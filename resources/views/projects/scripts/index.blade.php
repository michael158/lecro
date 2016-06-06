<script>
    $(document).ready(function () {

        $(document).on('mouseenter', '.coluna_x3', function () {
            console.log('colocou');
            $(this).find('span a').removeClass('hide').fadeIn(300);
        }).on('mouseleave', '.coluna_x3',function () {
            console.log('tirou');
                $(this).find('span a').removeClass('hide').fadeOut(300);
        });
    })
</script>
