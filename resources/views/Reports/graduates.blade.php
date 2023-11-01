


<!doctype html>
<html lang="en">
    <head>
        <style>
            table, td, th {
                border: .5px solid black;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }    
            th {
                padding: 5px;
            }
            td {
                padding: 2px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        
        <?php 
            $scholars = json_encode($scholars); 
            $scholars = json_decode($scholars, true);    

            $agency = json_encode($agency); 
            $agency = json_decode($agency, true);   

            // $group = json_encode($group); 
            // $group = json_decode($group, true);  
        ?>
      
        <div style="font-family:Calibri">
            <img src="{{ asset('images/sei.png') }}" alt="tag" style="position: absolute; top: 1; left: 220; width: 40px; height: 40px;">
            <img src="{{ asset('images/dost.png') }}" alt="tag" style="position: absolute; top: 1; left: 530; width: 40px; height: 40px;">
            
            <center style="font-size: 12px; font-weight: bold; color: #3066ad; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;">SCIENCE EDUCATION INSTITUTE</center>
            <center style="font-size: 14px; font-weight: bold; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</center>
            <center style="color: gray; font-weight: bold; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; font-size: 12px;">DOST - {{ strtoupper($agency['region']['region'])}}</center>
            <br><br><br>
            <center style="font-family:Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold;">LIST OF DOST-SEI SCHOLAR-GRADUATES</center>
        </div>


        <table style="width:100%; font-size: 10px; padding: 20px; font-family:Arial, Helvetica, sans-serif">
            <thead>
                <tr style="background-color: black; color: white;">
                    <th width="4%" style="padding: 10px;">#</th>
                    <th width="6%" style="padding: 10px;">AWARDED</th>
                    <th width="10%" style="padding: 10px;">PROGRAM</th>
                    <th width="30%" style="padding: 10px;">NAME</th>
                    <th width="15%" style="padding: 10px;">SCHOOL</th>
                    <th width="15%" style="padding: 10px;">COURSE</th>
                    <th width="20%" style="padding: 10px;">ACADEMIC AWARD</th>
                </tr>
            </thead>
            <tbody>
            @foreach($scholars as $index=>$scholar)
                <tr class="text-center">
                    <td style="padding: 5px;">{{$index+1}}</td>
                    <td style="padding: 5px;">{{$scholar['awarded_year']}}</td>
                    <td style="padding: 5px;">{{$scholar['program']}}</td>
                    <td style="padding: 5px;">{{$scholar['name']}}</td>
                    <td style="padding: 5px;">{{$scholar['school']}}</td>
                    <td style="padding: 5px;">{{$scholar['course']}}</td>
                    <td style="padding: 5px;">{{$scholar['award']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

       
    </body>
</html>