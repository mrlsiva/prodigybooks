<div class="mail-header cus-mail-header">
    <a class="m-wrapper" href="{{url('/')}}">
		<img class="barca_logo" src="{{ url('public/images/logo-white.png')}}"/>
		{{--<img class="barca_logo" src="{{ asset('themes/default/assets/demo/demo3/media/img/logo/logo.png')}}"/>--}}
		{{--<img class="barca_logo" src="{{ asset('themes/default/assets/img/email-header.png')}}"/>--}}
    </a>
</div>
<style type="text/css">
    .mail_container{
        max-width: 800px;
        margin: 0 auto;
        border: 1px solid #ccc;
    }
    .mail-header{
        width: 100%;
        text-align: left;
        /*background: linear-gradient(to right, rgba(28,26,50,1) 0%, rgba(28,26,50,1) 14%, rgba(28,26,50,1) 38%, rgba(28,26,50,1) 76%, rgba(103,34,55,1) 97%, rgba(103,34,55,1) 100%);*/
		background: linear-gradient(to right,rgb(73, 185, 118) 0%,#ad7 14%,#11dd7f 38%,rgb(123, 183, 103) 76%,rgb(80, 247, 116) 97%,rgb(137, 228, 160) 100%);
		background-image: linear-gradient(to right, rgb(73, 185, 118) 0%, rgb(170, 221, 119) 14%, rgb(17, 221, 127) 38%, rgb(123, 183, 103) 76%, rgb(80, 247, 116) 97%, rgb(137, 228, 160) 100%);
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
    ul li { font-size: 16px; }	
</style>
