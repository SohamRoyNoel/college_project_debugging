<div class="col-md-4">
    <div class="col_3">
        <h3>Jobs By Companies</h3>
        <ul class="list_1">
            <?php
            $company = "Select * from jobs where type='company'";
            $execute = mysqli_query($connection, $company);
            while ($row = mysqli_fetch_assoc($execute)) {
                $ids = $row['id'];
                $titles = $row['title'];

                ?>
                <li><a href="watchJobdetails.php?j=<?php echo $ids; ?>"><?php echo $titles?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="col_3">
        <h3>Jobs by Seeker.com</h3>
        <ul class="list_2">
            <?php
            $company = "Select * from jobs where type='creator'";
            $execute = mysqli_query($connection, $company);
            while ($row = mysqli_fetch_assoc($execute)) {
                $ids = $row['id'];
                $titles = $row['title'];

                ?>
                <li><a href="watchJobdetails.php?j=<?php echo $ids; ?>"><?php echo $titles?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>