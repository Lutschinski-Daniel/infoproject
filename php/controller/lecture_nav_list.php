<ul class="lectures-list">
    <li class="add-lecture-btn"><a href="#">+</a></li>
        <?php
        include 'db/db_conn.php';
        $conn = db_conn::getInstance();
        $results = $conn->get("SELECT * FROM lectures");
        while ($row = mysqli_fetch_array($results)) {
            print '<li class="lecture"><a href="#" id="' . $row['id'] . '" >'
                    . $row['bezeichnung_kurz'] . '</a></li>';
        }
        ?>     
</ul>
