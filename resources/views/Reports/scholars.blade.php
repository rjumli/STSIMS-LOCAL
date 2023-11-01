


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
                padding: 7px;
            }
            td {
                padding: 3px;
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
      
      <!-- Arial, Helvetica, sans-serif -->
      <div style="font-family:Calibri">
            <img src="{{ asset('images/sei.png') }}" alt="tag" style="position: absolute; top: 1; left: 220; width: 40px; height: 40px;">
            <img src="{{ asset('images/dost.png') }}" alt="tag" style="position: absolute; top: 1; left: 530; width: 40px; height: 40px;">
            
            <center style="font-size: 12px; font-weight: bold; color: #3066ad; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;">SCIENCE EDUCATION INSTITUTE</center>
            <center style="font-size: 14px; font-weight: bold; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;">DEPARTMENT OF SCIENCE AND TECHNOLOGY</center>
            <center style="color: gray; font-weight: bold; font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; font-size: 12px;">DOST - {{ strtoupper($agency['region']['region'])}}</center>
            <br><br>
            <center style="font-family:Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold;">LIST OF DOST-SEI SCHOLARS</center>
        </div>

        <table style="width:100%; font-size: 10px; padding: 20px; font-family:Arial, Helvetica, sans-serif">
            <thead>
                <tr style="background-color: black; color: white;">
                    <th style="padding: 10px;" width="4%">#</th>
                    <th style="padding: 10px;" width="6%">AWARDED</th>
                    <th style="padding: 10px;" width="29%">NAME</th>
                    <th style="padding: 10px;" width="6%">LEVEL</th>
                    <th style="padding: 10px;" width="15%">SCHOOL</th>
                    <th style="padding: 10px;" width="15%">COURSE</th>
                    <th style="padding: 10px;" width="15%">STARTED</th>
                    <th style="padding: 10px;" width="10%">STATUS</th>
                </tr>
            </thead>
            <tbody>
            @foreach($scholars as $index=>$scholar)
                <tr class="text-center">
                    <td style="padding: 5px;">{{ $index+1 }}</td>
                    <td style="padding: 5px;">{{$scholar['awarded_year']}}</td>
                    <td style="text-align: left; padding: 5px;">{{ $scholar['name'] }}</td>
                    <td style="padding: 5px;">{{$scholar['level']}}</td>
                    <td style="padding: 5px;">{{$scholar['school']}}</td>
                    <td style="padding: 5px;">{{$scholar['course']}}</td>
                    <td style="padding: 5px;">wew</td>
                    <td style="padding: 5px;">{{$scholar['status']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            <br><br><br><br>
            <div style="float: right; width: 270px; margin-right: 10px; text-align: center;">
                <hr style="height:1px;border:none;color:#333;background-color:#333; margin-bottom: 1px;" />
                <p style="font-size: 14px; font-family:Arial, Helvetica, sans-serif; margin-top: -1px; margin-bottom: -5px;">Technical Coordinator</p>
                <span style="font-size: 13px; font-style: italic; color: #434343;">( Noted By )</span> 
            </div>

            <div style="float: left; width: 270px; margin-left: 10px; text-align: center;">
            <hr style="height:1px;border:none;color:#333;background-color:#333; margin-bottom: 1px;" />
            <p style="font-size: 14px; font-family:Arial, Helvetica, sans-serif; margin-top: -1px; margin-bottom: -5px;">Scholarship Coordinator</p>
                <span style="font-size: 13px; font-style: italic; color: #434343;">( Prepared By )</span> 
            </div>
        </div>
       
    </body>
</html>