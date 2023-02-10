<?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        switch($msg){
            case 'insert':
                echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        Item added successfully
                    </div>";
                break;

            case 'update':
                echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        Item updated successfully
                        </div>";
                break;

            case 'delete':
                echo "<div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        Item deleted successfully
                        </div>"; 
                break;
        }    
    }
?>