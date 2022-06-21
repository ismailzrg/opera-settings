<?php 
session_start();

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDroit: Recherche Scientifique</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">



         <!-- Tailwind -->
    <link href="/css/output-style.css" rel="stylesheet">

    <link href="/node_modules/tailwindmin.css" rel="stylesheet">
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <script src="/js/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<style>
    header nav .tabs {
    list-style-type: none;

    display: flex;
    justify-content: flex-end;
}

header nav .tabs .tab {
    display: block;
}

header nav .tabs .tab a[data-switcher] {
    display: block;
    padding: 15px 30px;
    text-decoration: none;
    color: #FFF;
    background-color: royalblue;
    cursor: pointer;
}

header nav .tabs .tab:hover a[data-switcher] {
    background-color: #F7A800;
}

header nav .tabs .tab.is-active a[data-switcher] {
    background-color: #F7A800;
    font-weight: 700;
}
main {
    padding-left: 142px;
    padding-right: 142px;
}

.pages {
    margin-top: 100px;
    padding: 50px 30px;
    border-radius: 8px;
    background-color: #FFF;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
}

.pages .page {
    display: none;
}

.pages .page.is-active {
    display: block;
}

</style>
   

</head>
<body class="bg-white font-family-karla">
    <header class="w-full container mx-auto">
        <div class="flex flex-row items-center py-12 justify-between content-center">
            <div class="w-20 h-20"><img class="w-full h-full" src="images/relizane.png" ></div>
            <div class="flex flex-col">
                <a class="font-bold text-gray-800 uppercase hover:text-blue-800 text-5xl" href="#">
                    Faculté Droit et Science Politique
                </a>
    
                <p class=" sm:text-center text-lg text-gray-600">
                    Université De RELIZANE
                </p>
            </div>

            <div  class="w-20 h-20"><img class="w-full h-full" src="images/droit.jpg"></div>
        </div>
    </header>

    <nav id="menu" class="w-full py-2 border-t border-b bg-blue-400" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div> 
        <div  :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="tabs w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2" >
                <div class="tab is-active capitalize dropdowmn-menu1 hover:bg-gray-100 rounded py-2 px-4 mx-2">
                    <a data-switcher data-tab="1">Lincence 1</a>
                </div>
                <div class="tab capitalize dropdowmn-menu1 hover:bg-gray-100 rounded py-2 px-4 mx-2">
                    <a  data-switcher data-tab="2">Licence 2</a>
                </div>
                <div class="tab capitalize dropdowmn-menu1 hover:bg-gray-100 rounded py-2 px-4 mx-2">
                    <a  data-switcher data-tab="3">Licence 3</a>
                </div>
                <div class="tab capitalize dropdowmn-menu1 hover:bg-gray-100 rounded py-2 px-4 mx-2">
                    <a data-switcher data-tab="4">Master 1</a>
                </div>
                <div class="tab capitalize dropdowmn-menu1 hover:bg-gray-100 rounded py-2 px-4 mx-2">
                    <a data-switcher data-tab="5">Master 2</a>
                </div>
                <div class="tab capitalize dropdowmn-menu1 hover:bg-gray-100 rounded py-2 px-4 mx-2">
                    <a  data-switcher data-tab="6">Doctorat</a>
                </div>
            </div>
        </div>
    </nav>
    
    <main>
        <section class="pages">
            <div class="page is-active" data-page="1">
            <?php

	require('db_conn.php');
    $r = mysqli_query($conn,"select * from cour where id_niv = 'L1' ");
    
?>
                <table id ="cour" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       <th scope="col" class="px-6 py-3">Nom</th>
                       <th scope="col" class="px-6 py-3">Module</th> 
                       <th scope="col" class="px-6 py-3">Télécharger</th> 
                    </tr>
                  </thead>
                  <?php 
                  while($row = mysqli_fetch_array($r) ){
                    echo '<tr class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out  hover:bg-gray-100">';
                    echo '<td class="px-6 py-4 ">' . $row[1] . '</td>';
                    $sqli = "select name_mod from module where id_mod='$row[3]'";
                    $result = mysqli_query($conn, $sqli);
                    while($row1 = mysqli_fetch_array($result)){
                      echo '<td class="px-6 py-4 ">' . $row1[0] . '</td>';
                    }
                   echo '<td class="px-6 py-4 ">  <a href="licence1.php?id='. $row[0] .'" class="inline-block px-6 py-3 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> Supprimer</button> </td>';
                    echo '</tr>';
                  }?>
                </table>
            </div>
            <div class="page" data-page="2">
            <?php

require('db_conn.php');
$r = mysqli_query($conn,"select * from cour where id_niv = 'L2' ");
?>
                <table id ="cour" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       <th scope="col" class="px-6 py-3">Nom</th>
                       <th scope="col" class="px-6 py-3">Module</th> 
                       <th scope="col" class="px-6 py-3">Télécharger</th> 
                    </tr>
                  </thead>
                  <?php 
                  while($row = mysqli_fetch_array($r) ){
                    echo '<tr class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out  hover:bg-gray-100">';
                    echo '<td class="px-6 py-4 ">' . $row[1] . '</td>';
                    $sqli = "select name_mod from module where id_mod='$row[3]'";
                    $result = mysqli_query($conn, $sqli);
                    while($row1 = mysqli_fetch_array($result)){
                      echo '<td class="px-6 py-4 ">' . $row1[0] . '</td>';
                    }
                   echo '<td class="px-6 py-4 ">  <a href="licence1.php?id='. $row[0] .'" class="inline-block px-6 py-3 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> Supprimer</button> </td>';
                    echo '</tr>';
                  }?>
                </table>
            </div>
            <div class="page" data-page="3">
            <?php

require('db_conn.php');
$r = mysqli_query($conn,"select * from cour where id_niv = 'L3' ");
?>
                <table id ="cour" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       <th scope="col" class="px-6 py-3">Nom</th>
                       <th scope="col" class="px-6 py-3">Module</th> 
                       <th scope="col" class="px-6 py-3">Télécharger</th> 
                    </tr>
                  </thead>
                  <?php 
                  while($row = mysqli_fetch_array($r) ){
                    echo '<tr class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out  hover:bg-gray-100">';
                    echo '<td class="px-6 py-4 ">' . $row[1] . '</td>';
                    $sqli = "select name_mod from module where id_mod='$row[3]'";
                    $result = mysqli_query($conn, $sqli);
                    while($row1 = mysqli_fetch_array($result)){
                      echo '<td class="px-6 py-4 ">' . $row1[0] . '</td>';
                    }
                   echo '<td class="px-6 py-4 ">  <a href="licence1.php?id='. $row[0] .'" class="inline-block px-6 py-3 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> Supprimer</button> </td>';
                    echo '</tr>';
                  }?>
                </table>
            </div>
            <div class="page" data-page="4">
            <?php

require('db_conn.php');
$r = mysqli_query($conn,"select * from cour where id_niv = 'M1' ");
?>
                <table id ="cour" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       <th scope="col" class="px-6 py-3">Nom</th>
                       <th scope="col" class="px-6 py-3">Module</th> 
                       <th scope="col" class="px-6 py-3">Télécharger</th> 
                    </tr>
                  </thead>
                  <?php 
                  while($row = mysqli_fetch_array($r) ){
                    echo '<tr class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out  hover:bg-gray-100">';
                    echo '<td class="px-6 py-4 ">' . $row[1] . '</td>';
                    $sqli = "select name_mod from module where id_mod='$row[3]'";
                    $result = mysqli_query($conn, $sqli);
                    while($row1 = mysqli_fetch_array($result)){
                      echo '<td class="px-6 py-4 ">' . $row1[0] . '</td>';
                    }
                   echo '<td class="px-6 py-4 ">  <a href="licence1.php?id='. $row[0] .'" class="inline-block px-6 py-3 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> Supprimer</button> </td>';
                    echo '</tr>';
                  }?>
                </table>
            </div>
            <div class="page" data-page="5">
            <?php

require('db_conn.php');
$r = mysqli_query($conn,"select * from cour where id_niv = 'M2' ");
?>
                <table id ="cour" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       <th scope="col" class="px-6 py-3">Nom</th>
                       <th scope="col" class="px-6 py-3">Module</th> 
                       <th scope="col" class="px-6 py-3">Télécharger</th> 
                    </tr>
                  </thead>
                  <?php 
                  while($row = mysqli_fetch_array($r) ){
                    echo '<tr class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out  hover:bg-gray-100">';
                    echo '<td class="px-6 py-4 ">' . $row[1] . '</td>';
                    $sqli = "select name_mod from module where id_mod='$row[3]'";
                    $result = mysqli_query($conn, $sqli);
                    while($row1 = mysqli_fetch_array($result)){
                      echo '<td class="px-6 py-4 ">' . $row1[0] . '</td>';
                    }
                   echo '<td class="px-6 py-4 ">  <a href="licence1.php?id='. $row[0] .'" class="inline-block px-6 py-3 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> Supprimer</button> </td>';
                    echo '</tr>';
                  }?>
                </table>
            </div>
            <div class="page" data-page="6">
            <?php

require('db_conn.php');
$r = mysqli_query($conn,"select * from cour where id_niv = 'D' ");
?>
                <table id ="cour" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       <th scope="col" class="px-6 py-3">Nom</th>
                       <th scope="col" class="px-6 py-3">Module</th> 
                       <th scope="col" class="px-6 py-3">Télécharger</th> 
                    </tr>
                  </thead>
                  <?php 
                  while($row = mysqli_fetch_array($r) ){
                    echo '<tr class="bg-white dark:bg-gray-800 border-b transition duration-300 ease-in-out  hover:bg-gray-100">';
                    echo '<td class="px-6 py-4 ">' . $row[1] . '</td>';
                    $sqli = "select name_mod from module where id_mod='$row[3]'";
                    $result = mysqli_query($conn, $sqli);
                    while($row1 = mysqli_fetch_array($result)){
                      echo '<td class="px-6 py-4 ">' . $row1[0] . '</td>';
                    }
                   echo '<td class="px-6 py-4 ">  <a href="licence1.php?id='. $row[0] .'" class="inline-block px-6 py-3 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"> Supprimer</button> </td>';
                    echo '</tr>';
                  }?>
                </table>
            </div>
        </section>
    </main>

    <script src="mainviewcour.js"></script>
</body>
</html>