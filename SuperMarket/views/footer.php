<?php
session_start();
if (!isset($_SESSION['userName_sm'])) {
    header("location:index.php");

    die();
}


?>
<footer id="footer">
                <address>
                    All rights reserved - copyright Software Engineer Team.

                </address>
            </footer> 

            <script src="js/toggle.js" type="text/javascript"></script>
            <script src="js/deleteModal.js" type="text/javascript"></script>
        </body>
    </html>