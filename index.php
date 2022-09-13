<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produt Page</title>
    <style>
        /* HEADER */

.header {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30%;
    padding-left: 5%;
    padding-right: 5%;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
        7px 7px 20px 0px rgba(0, 0, 0, .1),
        4px 4px 5px 0px rgba(0, 0, 0, .1);
    margin: auto;
    /* padding: 5%; */
    width: 80%;
    /* height: 100%; */
    border-bottom: 3px solid rgb(0, 0, 0);
}


/* ************************* */


/* BUTTON */

button {
    margin: 20px;
}

.delete-checkbox {
    display: block;
}

/* normal-btn */
.normal-btn {
    background-color: #89d8d3;
    background-image: linear-gradient(315deg, #89d8d3 0%, #03c8a8 74%);
    line-height: 42px;
    padding: 10;
    width: 100px;
    border-radius: 5rem;
}

.normal-btn:hover {
    background-color: #4dccc6;
    background-image: linear-gradient(315deg, #4dccc6 0%, #96e4df 74%);
}

/* danger-btn */

.danger-btn {
    background-color: #d88989;
    background-image: linear-gradient(315deg, #d88989 0%, #c80303 74%);
    line-height: 42px;
    padding: 10;
    width: 150px;
    border-radius: 5rem;
}

.danger-btn:hover {
    background-color: #cc514d;
    background-image: linear-gradient(315deg, #cc4d4d 0%, #e49696 74%);
}



/* PRODUCTS */

/* Float four columns side by side */
.cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-auto-rows: auto;
    grid-gap: 1rem;
    padding-top: 3%;
    padding-left: 5%;
    padding-right: 5%;
}


.card {
    border: 2px solid #000000;
    border-radius: 4px;
    padding: .5rem;
    text-align: center;
}

.delete-checkbox {
    padding-top: 5%;
    padding-left: 5%;
    float: left;
}

input {
    width: 15px;
    height: 15px;
    padding: 0;
    margin: 0;
    vertical-align: bottom;
    position: relative;
    top: -1px;
}



    </style>
</head>
<body>
<?php
// mysql connection
$hostname = "sql105.epizy.com";
$username = "epiz_32443834";
$password = "Et2TIaERtys1xI";
$dbname = "epiz_32443834_product_list";

$con = mysqli_connect($hostname, $username, $password, $dbname) or die("Error: " . mysqli_error($con));

// fetch records
$result = @mysqli_query($con, "SELECT * FROM product_list") or die("Error: " . mysqli_error($con));

// delete records
if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($con,"DELETE FROM product_list WHERE id = " . $id);
    }
    $msg = "Deleted Successfully!";
    header("Location: index.php");
}
?>
<header>
        <div class="header">
            <h1 id="content">Product List</h1>
            <!-- <p>Designed by Senthil Kumar</p> -->
            <nav>
                <a href="addproduct.php"><button class="normal-btn"><span>ADD</span></button></a>
                <a href="" class="delete-checkbox" id="massdelete"><button form="productl" class="danger-btn"id="delete-product-btn" name="submit" type="submit" value="Delete Selected Row(s)"><span>MASS DELETE</span></button></a>
                
            </nav>
        </div>

        <div class="wrapper">
            <form class="cards" id="productl" action="index.php" method="post">
            
            <!-- Sucessful Reterival of Data -->
            <?php if (isset($_GET['msg'])) { ?>
            <p><?php echo $_GET['msg']; ?></p>
            <?php } ?>

            <!-- Fetched Data -->
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                
            <div class="card"  >
                <input name="chk_id[]" type="checkbox" class='delete-checkbox' value="<?php echo $row['id']; ?>"/>
                <h2><?php echo $row['sku']; ?></h2>
                <h2><?php echo $row['name']; ?></h2>
                <h2><?php echo $row['price']; ?> $</h2>
                <?php {
                    $rows=$row['id'];
                    $sizes = " " . $row['size'] . " MB";
                    $weights = " " . $row['weight'] . " Kg";
                    $Dimes = " " . $row['height'] ."x". $row['width'] ."x". $row['length']." ";
                    $product=array("Size"=>$sizes,"Weight"=>$weights,"Dimensions"=>$Dimes);
                    arsort($product);  ?>
                    <h2><?php {foreach($product as $Y=>$Y_val){ echo $Y ,":".$Y_val;break;}}?></h2>
                    <?php }?>
            </div>
            
            <?php } ?>
            

            </form>
        </div>


    </header>

    <script>
        console.log("Start of Script");
    var VALUE = "<?php echo"$rows"?>";
    let x=document.getElementById("content")
    if(VALUE){
        document.getElementById("massdelete").style.display = "block";
        console.log("Block of Script");
    }else{
        document.getElementById("massdelete").style.display = "none";
        console.log("None of Script");
    }
    </script>
</body>
</html>