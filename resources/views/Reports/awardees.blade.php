


<!doctype html>
<html lang="en">
    <head>  
        <style>
            html * {
            /* font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace; */
        }
            table, td, th {
                border: .5px solid black;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }    
            th {
                padding: 8px;
            }
            td {
                padding: 5px;
                text-align: center;
            }
            .b {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        
        <?php 
            $scholars = json_encode($scholars); 
            $scholars = json_decode($scholars, true);    

            $agency = json_encode($agency); 
            $agency = json_decode($agency, true); 
            
            $awards = json_encode($awards); 
            $awards = json_decode($awards, true); 
            
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
            <br><br><br>
            <center style="font-family:Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold;">SUMMARY OF DOST-SEI SCHOLAR-GRADUATES WITH HONORS</center>
            <center style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; font-weight: 400;">Undergraduate Scholarship Programs</center>
        </div>

        <table style="width:100%; font-size: 12px; padding: 10px; margin-top: 20px; font-family:Arial, Helvetica, sans-serif;">
            <thead>
            <!-- style="background-color: #a7dceb;" -->
                <tr>
                    <th rowspan="2" style="font-size: 11px; width: 13%; text-align: center; font-style: bold; background-color: #d9d9db; color: black; padding: 15px;">PROGRAM</th>
                    <th rowspan="2" style="font-size: 11px; width: 13%; text-align: center; font-style: bold; background-color: #d9d9db; color: black; padding: 15px;">NO. OF GRADUATES</th>
                    <th colspan="6" class="text-center" style="font-size: 11px; width: 74%; text-align: center; font-style: bold; background-color:#d9d9db; color: black; padding: 5px;">ACADEMIC AWARD</th>
                </tr>
                <tr>
                    @foreach($awards as $award)
                        <th class="text-center" style="text-align: center; font-weight: 400; font-style: italic; background-color: #d9d9db; color: black; padding: 5px;">{{ $award['name']}}</th>
                    @endforeach
                    <th class="text-center" style="font-size: 11px; text-align: center; font-style: bold; background-color: #d9d9db; color: black; padding: 5px;">TOTAL</th>
                </tr>
            </thead>
            <tbody>
            @foreach($scholars as $scholar)
                <tr class="text-center">
                    <td class="b" style="padding: 12px;">{{ strtoupper($scholar['name']) }}</td>
                    <td>{{$scholar['count']}}</td>
                    @foreach($scholar['list'] as $count)
                        <td>{{ $count }}</td>
                    @endforeach
                    <td>{{$scholar['total']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="margin-top: 100px;">
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