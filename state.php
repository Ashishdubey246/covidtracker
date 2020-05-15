<!DOCTYPE html> <!-- boil template by "!" -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstarp CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!--Botstrap JS-->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Awesome font-->
    <script src="https://kit.fontawesome.com/f030f5c3a9.js" crossorigin="anonymous"></script>



    <!--My styleshett-->
    <link rel="stylesheet" href="style.css">


    <title>Covid-19 Tracker</title>
</head>

<body>
    <div class="container-fluid bg-light p-5 text-center my-3">
        <h1>Covid-19 Tracker</h1>
        <h5 class="text-muted"> A State-wise project to keep track of all the Covid-19 cases around India.</h5>

    </div>

   
    <div class="container text-center bg-light p-2 my-2">
        <h5 class="text-info">"Prevention is the ONLY cure for now "</h5>
        <p class="text-muted"> !!stay home stay safe!!
        <button type="button "> <a href="collage.jpg">see</a></button></p>
        <input type="text"  name="" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

    </div>

    <div class="container-fluid">
        <div class="table-responsive">
            <!--this class makes the table responsive -->
            <table class="table" id="myTable">
                <!-- style="width: 500px; height: 500px;" -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">LAST_UPDATED</th>
                        <th scope="col">STATES</th>
                        <th scope="col">CONFIRMED</th>
                        <th scope="col">RECOVERED</th>
                        <th scope="col">ACTIVE</th>
                        <th scope="col">DEATHS</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php
                

                $data = file_get_contents('https://api.covid19india.org/data.json');
                $coranalive = json_decode($data, true);
                
                $statescount = count($coranalive['statewise']);
                
                
                
                $i=1;
                while($i < $statescount){

                ?>
                <tr> 
                    
                <td ><?php echo $coranalive['statewise'][$i]['lastupdatedtime'] ?> </td>
                <td><?php echo $coranalive['statewise'][$i]['state'] ?> </td>
                <td id="confirm"><?php echo $coranalive['statewise'][$i]['confirmed'] ?> </td>
                <td id="recover"><?php echo $coranalive['statewise'][$i]['active'] ?> </td>
                <td ><?php echo $coranalive['statewise'][$i]['recovered'] ?> </td>
                <td id="death"><?php echo $coranalive['statewise'][$i]['deaths'] ?> </td>
                </tr>
                
                 <!-- echo $coranalive['statewise'][$i]['lastupdatedtime'] . "<br>"  ;
                  echo $coranalive['statewise'][$i]['state'] . "<br>"  ;
                  echo $coranalive['statewise'][$i]['confirmed'] . "<br>"  ;
                  echo $coranalive['statewise'][$i]['active'] . "<br>"  ;
                  echo $coranalive['statewise'][$i]['recovered'] . "<br>"  ;
                  echo $coranalive['statewise'][$i]['deaths'] . "<br>"  ;  -->
                <?php
                  $i++;
                }
                
                
                ?>
            </table>
        </div>
    </div>
    <footer class="footer mt-auto py-3">
        <div class="container text-center bg-dark">
            <span class="text-muted">Copyright &copy;2020 @raj</span>
        </div>
    </footer>

    <script>
const myFunction = () => {
    let filter = document.getElementById('myInput').value.toUpperCase();
    let myTable = document.getElementById('myTable');
    let tr = myTable.getElementsByTagName('tr');

    for(var i=0;i<tr.length;i++)
    {
        let td = tr[i].getElementsByTagName('td')[1]; // 0 for 1st field of search
        if(td){
            let textvalue = td.textContent || td.innerHTML;

            if(textvalue.toUpperCase().indexOf(filter) > -1)
            {
                tr[i].style.display = "";
            }
            else
            {
                tr[i].style.display = "none";
            }
        }
    }
  
}
</script>
</body>

</html>
