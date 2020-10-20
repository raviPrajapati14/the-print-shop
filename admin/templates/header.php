<?php

  include_once 'sess.php';

?>
<html>
   <head>
      <meta charset="UTF-8" />
      <title>
        NDPP | Admin
      </title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../assets/Bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../assets/MDB-Pro_4.7.5/css/mdb.min.css">
        <link rel="stylesheet" href="../assets/MDB-Pro_4.7.5/css/addons/datatables.min.css">
        <link rel="stylesheet" href="../assets/MDB-Pro_4.7.5/css/addons/datatables-select.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
      <style>     
      .btn-group .btn{
        margin-left:5px !important;
      }
        .pass-icon{
          position: absolute;
    top: 0.40rem;
    right: 20px;
    font-size: 20px;
    /* pointer-events: none; */
    cursor: pointer;
}
.full-overlay:before{
  content:" ";display:inline-block;vertical-align:middle;height:100%}
.full-overlay{
  position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    font-size: 0;
    overflow-y: auto;
    /* background-color: rgba(103, 99, 98, 0.48); */
    background-color: rgba(0, 0, 0, 0.48);
    z-index: 10000;
    pointer-events: none;
    opacity: 1;
    transition: opacity .3s;
}
.card {
    box-shadow: 0 10px 20px 0 rgba(0,0,0,0.05)!important;
    border:0px!important;
    border-radius: .25rem!important;
}
.full-overlay .overlay{opacity:1;pointer-events:auto;box-sizing:border-box;}
.overlay{
  

  opacity: 1;
    pointer-events: none;
    background-color: white;
    text-align: center;
    border-radius: 0px;
    position: static;
    margin: 20px auto;
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    z-index: 10001;
    border-radius: 10px;
    box-shadow: crimson;
    /* color: #7b3f3f; */
    background-color: #ffffff;
    padding: 10px;
    /* box-shadow: 2px 2px 10px 0px #777777; */
    box-shadow: 2px 2px 10px 0px #424242;
}



        .cus-file-cont {
          /* border: 2px solid #0001ff;
          border: 2px solid red; */
    position: relative;
    z-index: 0;
    border: 2px solid #ababab!important;
    border-radius: .35rem;
    box-shadow: 2px 2px 2px 1px #9696963b;
    /* padding: 5px; */
        }
        .cus-file-cont  .cus-file
        {
          width: 100% ;
    height: 100%;
    opacity: 0;
    z-index: 2;
    position: absolute;
    top: 0;
    left: 0;
        }
        :focus
        {
          /* border: 2px solid #03A9F4!important; */
    /* box-shadow: 4px 4px 4px 2px #9696963b */

    outline: -webkit-focus-ring-color auto 0px;
        
        }

        .cus-file-cont .cus-file-lab:after{
          position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    /* height: calc(1.5em + .75rem); */
    padding: .375rem .75rem;
    line-height: 1.5;
    color: white;
    content: "Browse";
    background-color: #ababab;
    border-left: inherit;
    /* border-radius: 0 .25rem .25rem 0; */
        }
        .cus-file-cont .cus-file-lab
        {
         letter-spacing:1px;
    padding: 5px;
    /* border: 2px solid #6495ed; */
    /* z-index: -1; */
    /* position: absolute; */
    top: 10px;
    width: 100%;
    margin: 0px;
    font-weight: 700;
    color: #ababab;

        }
        .cus-file-cont .cus-file-lab:focus::after{
          /* border: 2px solid #03A9F4!important; */
    /* box-shadow: 4px 4px 4px 2px #9696963b; */
    background-color: #03A9F4;
        }
        .cus-file-cont .cus-file-lab:hover::after{
          /* border: 2px solid #03A9F4!important; */
    /* box-shadow: 4px 4px 4px 2px #9696963b; */
    background-color: #03A9F4;
        }
        .cus-file-cont:focus
        {
          color: #03A9F4;
          border: 2px solid #03A9F4!important;
    box-shadow: 4px 4px 4px 2px #9696963b
        }
        .cus-file-cont:hover
        {
          color: #03A9F4;
          border: 2px solid #03A9F4!important;
    box-shadow: 4px 4px 4px 2px #9696963b
        }
.line
{
  border: 2px solid #0001ff;
    border-radius: 185px;
}
      .lds-ripple {

  display: inline-block;

  position: relative;

  width: 100px;

  height: 100px;

  top: 47%;

  left: 50%;

  /* transform: translate(-50%, -50%); */

}

.lds-ripple div {

   position: absolute;

    /* border: 5px solid #0228ff; */

    border: 10px double #0001ff;

    opacity: 1;

    border-radius: 50%;

    animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;

}

.lds-ripple div:nth-child(2) {

  animation-delay: -0.5s;

}

@keyframes lds-ripple {

  0% {

    top: 50px;

    left: 50px;

    width: 0;

    height: 0;

    opacity: 1;

  }

  100% {

    top: 0px;

    left: 0px;

    width: 100px;

    height: 100px;

    opacity: 0;

  }

}
.row .col-sm-4{
  color: #E91E63;
    font-weight: 700;
}
.modal-body .row .col-sm-6:nth-child(1) {
  color: #E91E63;
    font-weight: 700;
    /* border: 2px solid; */
}
.modal-body .row .col-sm-6:nth-child(2) {
  color: #03A9F4;
    font-weight: 700;
    /* border: 2px solid; */
} 

  .overlay .msg{

    /* transform: translate(-50%, -50%); */

    color:#0001ff;

    font-size: 20px;

    font-weight: 900;

    letter-spacing: 2px;

    letter-spacing: 6px;

    text-transform: uppercase;



}
.overlay .lds-ripple{
  transform: translate(-70%, 0%);
}
.bor-red{

   /* font-size: .8rem; */

    /* border-radius: 10rem; */

    /* padding: 1rem 1rem!important; */

    /* background-clip: padding-box; */
    border: 2px solid #0001ff!important;
    /* border: 1px solid #d1d3e2!important; */

}

.spc
{
  letter-spacing:1px;
  /* font-weight:0!important; */
  font-size:15px!important;
}

.fd

{

  /* padding: 5px; */

    color: #ffffff!important;

    font-weight: bold;

    background: #ff4d3c!important;

    /* border-radius: 2px; */

    /* margin: 5px 0px -10px 0px; */

    text-align: center;

}

.alert

{

  padding: 5px 20px 5px!important;

    margin: 5px 0px -10px!important;

}

.alert p

{

  padding:2px;

  margin:2px;

}

.alert button

{

  color:white!important;

  padding: 5px 10px!important;

}

.alert button span{

  color:white!important;

}

legend{

    display:inline!important;
    width:auto!important;
    padding: 5px 20px!important;
    font-weight: 700;
    color: #ffffff!important;
    background-color: #0001ff;
    margin: 10px;
    font-size: 20px!important;
    border-radius: 0px;

}

fieldset{

  background-clip: border-box;
    border: 2px solid black!important;
    /* border-radius: .35rem; */
    padding:20px !important;
    margin: 20px 0px!important;

}
.active .bs-stepper-circle
{
  background-color: #3b61d1!important;
}

.imgfilename
{
  padding: 5px;
    color: #F44336;
    font-weight: 700;
    font-size: 18px;

}

</style>



     <!-- Custom fonts for this template-->

  <link href="../assets/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> -->

  <!-- Custom styles for this template-->

  <link href="../assets/theme/css/sb-admin-2.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/theme/css/bootstrap-select.min.css" />

    <!-- Custom styles for this page -->

    <link href="../assets/theme/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



   </head>

   <script src="../assets/theme/vendor/jquery/jquery.min.js"></script>
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" /> -->
   <link rel="stylesheet" href="../assets/theme/css/bs-stepper.css" />
   <body>

      

      <div class="full-overlay" id="loader" >

      <div  class="overlay "> <div class="lds-ripple "><div></div><div></div></div>

      <div class="msg">Loading</div>

      </div>

   </div>     

   

   

    







