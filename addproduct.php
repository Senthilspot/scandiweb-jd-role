<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
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
    width: 100px;
    border-radius: 5rem;
}

.danger-btn:hover {
    background-color: #cc514d;
    background-image: linear-gradient(315deg, #cc4d4d 0%, #e49696 74%);
}

/* PRODUCT PAGE */

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type=number]{
    width: 100%;
    padding: 12px;
    margin: 3px ;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  #product_form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    padding-left: 5%;
    padding-right: 5%;
    margin-left: 5%;
    margin-right: 5%;
  }


/* Form */


div.fieldbox {
    display: none;
    padding: 3%;
    width: 150px;
    text-align: left;
}

div.fieldbox label {
    margin: 0 0 3px 0;
    font-weight: bold;
}

    </style>
    
</head>

<body>
    <header>
        <div class="header">
            <h1>Product List</h1>
            <!-- <p>Designed by Senthil Kumar</p> -->
            <nav>
                <button class="normal-btn" form="product_form" type="submit" value="Submit">
                    <span>Save</span>
                </button>
                <a href="index.php">
                    <button class="danger-btn"><span>Cancel</span></button>
                </a>

            </nav>
        </div>
    </header>
    <!-- Form -->
    <div>
        <form action="insert.php" id="product_form" method="post">
            <ul class="form-style-1">
                <li>
                    <label for="sku">SKU:</label>
                    <input type="text" id="sku" class="field-long" name="sku">
                </li>
                <li>
                    <label for="Name">Name:</label>
                    <input type="text" id="name" class="field-long" name="name">
                </li>
            </br>
                <li>
                    <label for="price">Price($):</label>
                    <input type="number" id="price" class="field-long" name="price">
                </li>
            </br>
                <li>
                    <!-- Drop Down -->
                    <label for="type">Type Switcher:</label>
                    <br><br>
                    <div>
                        <select id="productType" name="product" onChange="prodType(this.value);">
                            <option value="">Choose Switcher</option>
                            <option name="dvd"value="DVD"><label>DVD</label></option>
                            <option name="furniture" value="Furniture"><label>Furniture</label></option>
                            <option name="book" value="Book"><label>Book</label></option>
                        </select>

                        <div class="fieldbox" id="DVD">
                            <label>Size(MB):</label>
                            <input id="size" type="number" class="field-short" name="size" value="">
                        </div>

                        <div class="fieldbox" id="Furniture">
                            <label>Height :</label>
                            <input id="height" type="number" class="field-short" name="height"><br>
                            <label>Width :</label>
                            <input id="width" type="number" class="field-short" name="width"><br>
                            <label>Length :</label>
                            <input id="length" type="number" class="field-short" name="length"><br>
                        </div>

                        <div class="fieldbox" id="Book">
                            <label>Weight(Kg):</label>
                            <input id="weight" type="number" class="field-short" name="weight"><br>
                        </div>

                </li>
                <!-- <li><input class="normal-btn" type="submit" value="Submit"></li> -->

            </ul>

        </form>
    </div>


    <script>
        const map = {
            "DVD": "DVD",
            "Furniture": "Furniture",
            "Book": "Book"
        };

        function prodType(value) {
            document
                .querySelectorAll(".fieldbox")
                .forEach((node) => (node.style.display = "none"));

            document.getElementById(map[value]).style.display = "block";
        }

    </script>
</body>

</html>