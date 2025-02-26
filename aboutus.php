
 <?php 
 include('constants.php') ?>
<!DOCTYPE html>

<html>
<head>

  <style >
    
    input[type = text]{
  width: 100%;
  padding: 5px 0px;
  margin: 5px 1px;
  box-sizing: border-box;
}
  </style>
  <link rel="stylesheet" type="text/css" href="admin/manstyle.css">
  <link rel="icon" type="text/css" href="IMG/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>way to go</title>
</head>
<body>
  <header class="header">
    <div id="navbar">
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark" >

  <img src="IMG/logo.png" alt="way to go logo" width="200" height="80">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
       
      

    
               <a href="FIRST.php"><button class="btn btn-danger my-2 my-sm-0">HOME</button></a>

      
  </div>

</nav>
</div>
  </header>
  <div class="content">
 
    
    <table align="center " class="tbl-full" width="50%" >
      <tr>
        <td >
         <strong>STUDENT</strong> 
        </td>
        <td>
           <strong>STUDENT</strong>  
        </td>
         <td>
          <strong>GUIDE</strong> 
        </td>
      </tr>
      <tr>
        <td>
          <img  src="IMG/abhishek.jpg" style="width: 150px; height: 200px;">
        </td>
         <td>
          <img src="IMG/harsha.jpg" style="width: 180px; height: 200px;">
        </td>
         <td>
          <img src="IMG/niranjansir.jpg" style="width: 180px; height: 200px;">
        </td>
      </tr>
      <tr>
        <td>
          <strong>MR ABHISHEK U</strong>
        </td>
         <td>
         <strong> MR HARSHA S H</strong>
        </td>
         <td>
          <strong>MR NIRANJAN MURTHY C</strong> 
        </td>
      </tr>
      <tr>
        <td>
          5th SEM,DEPT OF CSE,GMIT
        </td>
         <td>
        5th SEM,DEPT OF CSE,GMIT
        </td>
         <td>
          ASST. PROFFESOR,DEPT OF CSE,GMIT
        </td>
      </tr>
      <td>
           <form  action="mailto:ulliabhishek@gmail.com" method="post" enctype="text/plain">
             <button class="btn btn-danger my-2 my-sm-0">CONTACT</button>
           </form>
        </td>
         <td>
          <form  action="mailto:Shharsha40@gmail.com" method="post" enctype="text/plain">
             <button class="btn btn-danger my-2 my-sm-0">CONTACT</button>
           </form>
        </td>
         <td>
           <form  action="mailto:ulliabhishek@gmail.com" method="post" enctype="text/plain">
             <button class="btn btn-danger my-2 my-sm-0">CONTACT</button>
           </form>
        </td>
      </tr>

      </table>
    



</body>
</html>