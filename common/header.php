<?php
    // echo "header.php";
include 'sess_url.php';

$activeSession=false;
// print_r($_SESSION);
if(isset($_SESSION['customer']))
{
  $activeSession=true;
}

    ?>
    <html>
    <head>
       
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" /> -->
        
        <link rel="stylesheet" href="./assets/MDB-Pro_4.7.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/MDB-Pro_4.7.5/css/mdb.min.css">
        <link rel="stylesheet" href="./assets/MDB-Pro_4.7.5/css/addons/datatables.min.css">
        <link rel="stylesheet" href="./assets/MDB-Pro_4.7.5/css/addons/datatables-select.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <style>
            .unique-color {
    /* background-color: #4CAF50!important; */
    background: repeating-linear-gradient(180deg, #001d3c , #0d47a1);
            }
            li{list-style-type: none;}
  @media (min-width: 576px) {
    .footer--bg .container {
      text-align: center;
    }
  }
  
  @media (min-width: 768px) {
    .footer--bg .container {
      text-align: left;
    }
  }
  
            .brand_sty{
                font-size: 25px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color:white;
            }
.carousel-multi-item .controls-top .btn-floating {
    background: #4285f4;
    color: white;
    /* size: 100px; */
    font-size: 20px;
    padding: 13px;
}

.overlay1 {

position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    
    /* background-color: #3f51b561; */
}

.full-overlay
{
 position: fixed;
top: 0;
bottom: 0;
left: 0;
right: 0; 
background-color:#3f51b521;
transition: .5s ease;
z-index: 10;
height: 100%;
width: 100%;
}
.loader{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

        </style>
        <style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    .card{
        box-shadow: 0 10px 20px 0 rgba(0,0,0,0.05);
    }
  .number-input.number-input {
    border: 1px solid #ced4da;
    width: 8.6rem;
    border-radius: .25rem;
}
.number-input.number-input input[type=number] {
    max-width: 3rem;
    padding: .5rem;
    border: 1px solid #ced4da;
    border-width: 0 1px;
    font-size: 1rem;
    height: 2rem;
    color: #495057;
}
.number-input.number-input button {
    width: 2.5rem;
    height: .7rem;
}
 
.number-input.number-input button:before, .number-input.number-input button:after {
    width: .7rem;
    background-color: #495057;
}
 .number-input button.plus:after {
    -webkit-transform: translate(-50%, -50%) rotate(90deg);
    transform: translate(-50%, -50%) rotate(90deg);
}
 .number-input input[type=number] {
    text-align: center;
}
button.plus, button.minus{
    background:white;
    border:0px;
}
 .number-input button:before,  .number-input button:after {
    display: inline-block;
    position: absolute;
    content: '';
    height: 2px;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.footer--bg{
    /* background-color: #102F4F; */
    background-color:#001d3c;
    padding-top: 50px;
    padding-bottom: 50px;
  }

.footer__left .navbar-brand{
      /* margin-bottom: 50px;
      display: block;
      float: none;
      margin-top: 10px; */
    }

.footer__left p{
  color: #fff;
  font-size: 17px;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-family:'Product Sans'!important;
}
 

.footer__left p span{
        color: #8392A4;
      }

.footer__link li{
      margin-bottom: 20px;
    }

    .footer--bg .container{
      /* text-align: center; */

    }
.footer__link li a{
        font-family: "ps";
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 900;
        letter-spacing: 2px;
        color: #1680f8;
      }

.footer__social-icons{
    /* text-align: right; */
    /* margin-top: 60px; */
    color:white;
  }

  .footer__social-address{
    /* text-align: right; */
    /* margin-top: 60px; */
    color:white;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 15px;
  }
.footer__social-icons li{
      display: inline-block;
      margin-right: 15px;
    }

.footer__social-icons li:last-child{
        margin-right: 0;
      }

.footer__social-icons li [class^="flaticon-"]:before, .footer__social-icons li [class*=" flaticon-"]:before{
        margin: 0;
        width: 22px;
        height: 22px;
        display: block;
        border-radius: 50%;
        font-size: 12px;
        text-align: center;
        background-color: #4C627A;
        color: #102F4F;
      }

.footer__social-icons li a{
        display: block;
      }

@media (max-width: 991px){

    .footer .row>div{
      margin-bottom: 50px;
    }
  }

</style>
    </head>
    <body>
        <header>