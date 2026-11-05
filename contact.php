
<?php
            include('header.php');
?>


<!DOCTYPE html>
<html>
<head>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
                .ffbox { 
                display: flex; 
                margin: 80px;
                justify-content: center;
                background-color: #fff; 
                border: 3px solid #e4e4e9; 
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
                overflow: hidden; 
                border-radius: 30px; 
                flex-wrap: wrap; 
            } 
            
            .ffbox1 { 
                flex: 1; 
                padding: 20px; 
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
                
                width: 1000px;
            } 
            
            .ffbox1 label { 
                display: block; 
                margin-bottom: 8px; 
            } 
            
            .ffbox1 input, 
            .ffbox1 textarea { 
                width: 100%; 
                padding: 8px; 
                margin-bottom: 16px; 
                box-sizing: border-box; 
                border-radius: 15px; 
                background-color: #dcdce1; 
                border: none; 
            } 
            
            .ffbox1 textarea { 
                resize: vertical; 
            } 
            
            .ffbox1 { 
                margin-right: 10px;

            } 
            
            .ffbox1 label { 
                margin-right: 16px; 
            } 
            
            .map-div { 
                flex: 1; 
                background-color: #eee; 
                width: 500px;
            } 
            
            .submit { 
                width: 100%; 
                padding: 8px; 
                margin-bottom: 16px; 
                box-sizing: border-box; 
                border-radius: 15px; 
                background-color: rgb(236, 186, 7); 
                color: white; 
                font-size: 17px; 
                font-weight: 700; 
                border: #a2c2ee; 
            } 
            
            .submit:hover { 
                background-color: rgb(220, 110, 7); 
            } 
            
            .map-div iframe { 
                border: 0; 
                padding: 10px; 
                height: 600px;
                width: 700px;
            } 
            
            .gfg { 
                text-align: center; 
                color: rgb(239, 141, 5); 
            } 
            
    </style>
    <title>कोकण मेवा</title>
</head>

<body>
        <div class="wrapper">
            <body> 
                <div class="ffbox">
                    
                    <div class="ffbox1"> 
                        <h1 class="gfg">Contact</h1> 

                                </i> <h4 style="color:brown;font-size:30px;font-family: 'Times New Roman', Times, serif;text-align: center;"> Konkan Meva</h4> </i>                      
                      <h4>Address:</h4>
                      <p>Konkan Meva situated at Devgad ,Sindhudurg.</p> 
            
                                <h4>Email Address: </h4>
                      <p>konkanmeva@gmail.com</p>
                    
                            <h4>Contact No: </h4>	
                    <p>9836543624</p>
                            <h4>Write Message: </h4>	
                            
                            <textarea id="msg"
                                    name="msg"
                                    rows="5" required> 
                            </textarea> 
            
                            <button class="submit"> 
                                Submit 
                            </button> 
                    </div> 
                    <div class="map-div"> 
                        <h1 class="gfg">Live Location</h1> 
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30623.53144694052!2d73.3673417506438!3d16.376945698249244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bea9c791e0277d9%3A0x181ba0a6cdbe2166!2sDevgad%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1706848164528!5m2!1sen!2sin"
                         width="600"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                
                    </div> 
                </div>
                </body>
        
        </div>



</body>
</html>



<?php
            include('footer.php');
?>