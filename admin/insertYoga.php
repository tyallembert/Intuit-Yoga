<?php
include 'top.php';

include 'header.php'
?>
<main>
    <section class = "fullInsert">
        <form action = "#" method = "POST">
            <section>
                <input id = "txtDayOfClass"     
                        name = "txtDayOfClass"
                        maxlength = "25"
                        type = "text"
                        value = "<?php print $dayOfClass; ?>"
                    >
            </section>
        </form>
    </section>
</main>
<?php
include 'footer.php';
?>