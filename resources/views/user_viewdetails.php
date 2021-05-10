<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-color: #007bff;
            background-image: url("http://localhost/laravel/images/money.jpg");
        }
        li{
            padding: 4px;
        }
        a{
            color: black;
        }
         #tab{
                margin: 80px;
                margin-left: 140px;
                width: 80%;
                border-radius: 5px;
                box-shadow: 5px 5px #adb5bd;
                border: 2px solid var(--white);
                background-color: var(--blue);
            }

    </style>
    <script>
       
        
        function subscribe(){
            alert("table will be generated...");

        }

         function display_chits(){
            $("#tab").empty();
            var table_content='';
        $.ajax({
            url:'/api/chits/',
            type: 'GET',

            success: function (response) {
                 console.log(response);
                console.log(response.data.length);
                table_content='<table class="table table-hover"><thead><tr><th>Chit Name</th>';
                 table_content+='<th>Capital Amount</th><th>Total Members</th> </tr></thead><tbody>';

                for( i=0;i<response.data.length;i++) {
                    table_content+='<tr>';
                    table_content+='<td><a href=http://127.0.0.1:8000/index>'+response.data[i].chit_name+'</a></td>';
                    table_content+='<td>'+response.data[i].capital_amount+'</td>';
                    table_content+='<td>'+response.data[i].total_members+'</td> ';
                     table_content+='<td><button type="button" class="btn  btn-info" onclick="subscribe();">Subscribe</button> </td> </tr>';

                }
                $("#tab").append(table_content);
            }

        });
        }


    </script>
</head>
<body>

<div class="container">
    <div id="first_div">
        <h1>Chit Funds</h1>
    </div>
    <div>
        <nav class="navbar navbar-expand-sm bg-secondary">
            <ul class="navbar-nav">
                 <li class="nav-item">
                               </li>
                <li class="nav-item">
                <button type="button" class="btn  btn-info" onclick="display_chits();">View Chits</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/index">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/contact">Contact Us</a>
                </li>

            </ul>
        </nav>

    </div>

        <div id="tab">


        </div>



</div>


</body>
</html>
