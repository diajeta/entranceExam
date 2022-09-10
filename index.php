<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="home-box custom-box">
            <h2 style='color: blue'>ENTRANCE EXAMINATION <br> <span id='ses'><?php echo file_get_contents('session.txt')?> ACADEMIC SESSION</span></h2><br>
        </div>
        <div class="home-box custom-box">
            <h2 style='text-decoration: underline'>INSERT NAMES INTO DATABASE</h2><br>
            <?php 
             
                if(!isset($_GET['status'])){

                }else{
                    $statval = $_GET['status'];
                    if($statval == 'name'){
                        echo "<p class='error'>The name is required!</p>";
                    }elseif ($statval == 'examNo') {
                        echo "<p class='error'>The admission number is required!</p>";
                    }elseif ($statval == 'exist') {
                        echo "<p class='error'>Name not added. Duplicate number!!</p>";
                    }elseif ($statval == 'success') {
                        echo "<p class='success'>Student added to database </p>";
                    }
                }
            ?>
            <form action="insert_name.php" method="POST">
                <table class="form-tab">
                    <tr>
                        <?php 
                            if(isset($_GET['stuN'])){
                                $stuN = $_GET['stuN'];
                                echo '<td>NAME:</td><td><input class="in-p" type="text" name="name" placeholder="Enter name" value="'.$stuN.'"></td>';
                            }else{
                                echo '<td>NAME:</td><td><input class="in-p" type="text" name="name" placeholder="Enter name"></td>';
                            }
                        ?>
                        
                    </tr>
                    <tr>
                        <?php 
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                echo '<td>EXAM NO.:</td><td><input class="in-p" type="number" name="examNo" placeholder="Enter exam number" value="'.$id.'"></td>';
                            }else{
                                echo '<td>EXAM NO.:</td><td><input class="in-p" type="number" name="examNo" placeholder="Enter exam number"></td>';
                            }
                        ?>
                        
                    </tr>
                    <tr>
                        <?php 
                            if(isset($_GET['addr'])){
                                $addr = $_GET['addr'];
                                echo '<td>ADDRESS:</td><td><input class="in-p" type="text" name="address" placeholder="Enter address" value="'.$addr.'"></td>';
                            }else{
                                echo '<td>ADDRESS:</td><td><input class="in-p" type="text" name="address" placeholder="Enter address"></td>';
                            }
                        ?>
                        
                    </tr>
                    <tr>
                        <td>CLASS TO ENTER:</td><td>
                            <select name="class">
                                    <option value="JS1">JS1</option>
                                    <option value="JS2">JS2</option>
                                    <option value="JS3">JS3</option>
                                    <option value="SS1A">SS1A</option>
                                    <option value="SS1B">SS1B</option>
                                    <option value="SS1C">SS1C</option>
                                    <option value="SS2A SCIENCE">SS2A SCIENCE</option>
                                    <option value="SS2B ART">SS2B ART</option>
                                    <option value="SS2C COMMERCIAL">SS2C COMMERCIAL</option>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>GENDER: </td><td>
                            <select name="gender">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" class="btn in-p" id="sub" name="submit" value="SUBMIT FORM">
                      
            </form>
            <a href="edit_name.php"><input type="submit" class="btn in-p" id="edit" name="edit" value="EDIT FORM"></a>
        </div>
        <div class="home-box custom-box">
            <h2 style='text-decoration: underline'>See student's result</h2><br>
            <form action="result.php" method="POST">
                EXAM NO.: <input type="text" name="examNo" placeholder="Enter exam number to see result"><br><br>
                <input type="submit" class="btn" name="submit" value="SEE RESULT">
            </form>
            <div class="next-question-btn">
                <a href="enter-record.php"><button type="button" class="btn">Enter Students Score</button></a>
                <a href="broadsheet.php"><button type="button" class="btn">View Broadsheet</button></a>
            </div>
            <div class="answers-indicator">
                
            </div>
        </div>

        <div class="home-box custom-box">
            <h2 style='text-decoration: underline'>Change the session</h2><br>
            Session:    <select name="session" id="session">
                        <option selected disabled hidden><?php echo file_get_contents('session.txt')?></option>
                        <option value="2016/2017">2016/2017</option>
                        <option value="2017/2018">2017/2018</option>
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                        <option value="2020/2021">2020/2021</option>
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                        <option value="2023/2024">2023/2024</option>
                        <option value="2024/2025">2024/2025</option>
                        <option value="2025/2026">2025/2026</option>
                        <option value="2026/2027">2026/2027</option>
                        <option value="2027/2028">2027/2028</option>
                        <option value="2028/2029">2028/2029</option>
                        <option value="2029/2030">2029/2030</option>
                        <option value="2030/2031">2030/2031</option>
                        <option value="2031/2032">2031/2032</option>
                        <option value="2032/2033">2032/2033</option>
                        <option value="2033/2034">2033/2034</option>
                        <option value="2034/2035">2034/2035</option>
                        <option value="2035/2036">2035/2036</option>
                        <option value="2036/2037">2036/2037</option>
                        <option value="2037/2038">2037/2038</option>
                        <option value="2038/2039">2038/2039</option>
                        <option value="2039/2040">2039/2040</option>
                        <option value="2040/2041">2040/2041</option>
                        <option value="2041/2042">2041/2042</option>
                        <option value="2042/2043">2042/2043</option>
                        <option value="2043/2044">2043/2044</option>
                        <option value="2044/2045">2044/2045</option>
                        <option value="2045/2046">2045/2046</option>
                        <option value="2046/2047">2046/2047</option>
                        <option value="2047/2048">2047/2048</option>
                        <option value="2048/2049">2048/2049</option>
                        <option value="2049/2050">2049/2050</option>
                        <option value="2050/2051">2050/2051</option>
                        <option value="2051/2052">2051/2052</option>
                        <option value="2052/2053">2052/2053</option>
                        <option value="2053/2054">2053/2054</option>
                        <option value="2054/2055">2054/2055</option>
                        <option value="2055/2056">2055/2056</option>
                        <option value="2056/2057">2056/2057</option>
                        <option value="2057/2058">2057/2058</option>
                        <option value="2058/2059">2058/2059</option>
                        <option value="2059/2060">2059/2060</option>
                        <option value="2060/2061">2060/2061</option>
                        <option value="2051/2052">2061/2062</option>
                        <option value="2052/2053">2062/2063</option>
                        <option value="2053/2054">2063/2064</option>
                        <option value="2054/2055">2064/2065</option>
                        <option value="2055/2056">2065/2066</option>
                        <option value="2056/2057">2066/2067</option>
                        <option value="2057/2058">2067/2068</option>
                        <option value="2058/2059">2068/2069</option>
                        <option value="2059/2060">2069/2070</option>
                        <option value="2060/2061">2070/2071</option>
                        <option value="2051/2052">2071/2072</option>
                        <option value="2052/2053">2072/2073</option>
                        <option value="2053/2054">2073/2074</option>
                        <option value="2054/2055">2074/2075</option>
                        <option value="2055/2056">2075/2076</option>
                        <option value="2056/2057">2076/2077</option>
                        <option value="2057/2058">2077/2078</option>
                        <option value="2058/2059">2078/2079</option>
                        <option value="2059/2060">2079/2080</option>
                        <option value="2060/2061">2080/2081</option>
                        </select>
                <input type="submit" class="btn in-p" id="session_change" name="session" value="CHANGE SESSION">
            
        </div>
        
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="js/session.js"></script>
        <!-- <script src="js/question.js"></script>
        <script src="js/app.js"></script> -->
    </body>
</html>