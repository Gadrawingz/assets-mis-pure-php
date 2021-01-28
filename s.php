

Immortal technique - Diabloic
How to import modal javascript
Valid from add_item if(its moved) remove (to) in the list 
To avoid being moved to where it from


                <?php
                $stmt80= $obj->readLabs();
                while($row80= $stmt80->FETCH(PDO::FETCH_ASSOC)) {
                ?>
                <li class="nav-item"><a class="nav-link" href="view4admin.php?labinfo=<?php echo $row80['lab_id']; ?>"><?php echo $row80['lab_name']; ?></a></li>
                <?php } ?>