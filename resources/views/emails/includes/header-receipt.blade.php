{{--<div class="mail-header cus-mail-header">
    <div class="purchase">Thanks for your recent purchase with us!</div>  
    <a class="m-wrapper" href="{{url('/')}}">
		<img class="barca_logo" src="{{ asset('themes/default/assets/demo/demo3/media/img/logo/barca-pro-2.png')}}"/>
		
    </a>
</div>--}}

<table class="bg-blue">
   <tr>
       <td><i>Thanks for your recent purchase with us!</i></td>
       <td><img class="barca_logo" src="{{ asset('themes/default/assets/demo/demo3/media/img/logo/barca-pro-2.png')}}"/ width="100"></td>
       <td>ligori@digitfellas.com</td>
   </tr>
</table>
<style type="text/css">
  
    .mail_container{
        max-width: 70%;
        margin: 0 auto;
        border: 1px solid #ccc;
    }
    .mail-header{
        width: 100%;
        text-align: center;
        background: linear-gradient(to right, rgba(28,26,50,1) 0%, rgba(28,26,50,1) 14%, rgba(28,26,50,1) 38%, rgba(28,26,50,1) 76%, rgba(103,34,55,1) 97%, rgba(103,34,55,1) 100%);
    }
    .barca_logo {
        margin: 5px auto auto 12px;
        height: 100%;
    }
    .mail-footer {
        text-align: center; 
        background: #2e2d50;
        color: #798eb2;
        padding: 10px;  
        position: absolute;
        bottom: 0;
    }
    .mail-footer ul{
        display: inline-flex;
        list-style: none;
        color: #798eb2;
        font-weight: 400;
        font-family: Roboto;
    }
    .mail-footer .m-nav__link{
            color: #798eb2;
        font-weight: 400;
        font-family: Roboto;
        text-decoration: none;
    }
    .mail-footer ul li {
        padding: 6px;
    }
	.button-706ACA, .m_-3091949334939699630button-706ACA {
		font-family: Avenir,Helvetica,sans-serif;
		box-sizing: border-box;
		border-radius: 3px;
		color: #fff;
		display: inline-block;
		text-decoration: none;
		background-color: #706ACA;
		border-top: 10px solid #706ACA;
		border-right: 18px solid #706ACA;
		border-bottom: 10px solid #706ACA;
		border-left: 18px solid #706ACA;
	}	
     

    .inner-body {
        width: 100% !important;
    }

    .receipt tr { box-sizing: border-box; }
    .receipt tr td{ padding:5px 0;   box-sizing: border-box;}

    .receipt tbody { 
        padding: 10px 0;
        display: inline-block;
        width:100%;
    }
    .receipt tbody tr:first-child{
        border-top: 1px solid #ccc !important; 
        border-bottom: 1px solid #ccc !important; 
        padding: 10px 0;
        width: 100%;
        display: table;
    }
    .receipt tbody tr:first-child th:first-child {
        text-align: left !important;
    }

    .receipt tbody tr {
        display: table;
        width: 100%;
        padding: 10px 0;
    }

    .receipt tbody tr td:last-child{
        width:30%;
    }

    .receipt tbody tr:last-child{
        border-top: 1px solid #ccc !important;  
        padding: 10px 0;
    }

    .purchase {
        margin-top: 10px; 
        margin-bottom: 10px; 
        border-bottom: 2px solid #ccc !important;
        font-style: italic;
    }

   table.bg-blue {
       background: #180e3f;
       text-align: center;
       padding: 10px;
       color: #fff;
       width: 70%;
       margin: 0 auto;
   }

   table.bg-blue tr {}

   .bg-blue tr td:first-child {
       padding: 10px 0;
       font-size: 16px;
       border-bottom: #ccc solid 1px;
       display: inline-block;
       margin-bottom: 20px;
   }

   table.bg-blue tr td {
       display: block;
       padding: 10px 0;
   }

   @media(max-width:767px) {
       table.bg-blue {
           width: 80% !important;
       }
   }
</style>
